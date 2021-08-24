<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Log;
use App\Helpers\Helpers;
use Carbon\Carbon;
use App\OrderHistory;
use App\OrderStageRelation;
use App\Status;
use App\Dispatch;
use App\RefillHistory;
use App\AllQueueSummary;

class ProblemOnHoldController extends Controller
{

    public $on_hold_stage = 9;
    public $delete_stage = 5;

    /**
     * To render all Orders/Rxs at Problem on Hold grid.
     *
     * @return array $data
     * @return void
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->on_hold_stage)
                        ->get()
                        ->toArray();
                if (!empty($order_stage_relation)) {
                    foreach ($order_stage_relation as $key => $value) {
                        $data['order_pres_details'][] = OrderHistory::with('order')
                                ->with('order.patient')
                                ->with('order.provider')
                                ->with('orderHistoryPrescription')
                                ->with('status')
                                ->where('order_id', $value['order_id'])
                                ->where('rx_id', $value['rx_id'])
                                ->whereNull('time')
                                ->get()
                                ->toArray();
                        $data['order_pres_details'][$key][0]['dispatch'] = Dispatch::with('dispatchMethod')
                                ->where('order_id', $value['order_id'])
                                ->where('rx_id', $value['rx_id'])
                                ->get()
                                ->toArray();
                    }
                    if (!empty($data['order_pres_details'])) {
                        foreach ($data['order_pres_details'] as $keys => $value) {
                            foreach ($value as $key => $val) {
                                $data['order_pres_details'][$keys][$key]['stage_time'] = $this->stageTimeInterval($val['order_history_prescription']['rx_id'], $val['order_id']);
                            }
                        }
                    }
                }
                $data['formula_data'] = Helpers::getAllFormula();
                $data['statuses_data'] = Helpers::getAllStatus();
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['statuses'] = Status::all()->toArray(); 
                $data['status'] = Status::whereIn('id', [1, 2, 3, 4, 5])->get()->toArray();
                $data['stage_name'] = trans('messages.problem_on_hold');
                return View('orders.on_hold', $data);
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To change order state.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function changeOrderState(Request $request)
    {
        try {
            $order_id = $request->input('order_id');
            $rx_id = $request->input('rx_id');
            if (!empty($order_id) && !empty($rx_id)) {
                $change_stage = $request->input('change_state');
                if (isset($change_stage)) {
                    $change_stage = $change_stage;
                }
                DB::beginTransaction();
                $data = ['order_id' => $order_id, 'stage' => $change_stage, 'rx' => $rx_id];
                $this->manageOrderHistory($data);
                $get_status = Helpers::getStatus([$change_stage]);
                AllQueueSummary::where(['order_id' => $order_id, 'rx_id' => $rx_id])
                        ->update([
                            'stage' => $get_status ? $get_status[0]['name'] : '',
                            'stage_id' => $change_stage,
                            'stage_change_at' => Carbon::now(),
                ]);
                if ($change_stage == $this->delete_stage) {
                    $refill_history = RefillHistory::where('order_id', $order_id)
                            ->where('rx_id', $rx_id)
                            ->get()
                            ->toArray();
                    if (!empty($refill_history)) {
                        Prescription::where(['order_id' => $refill_history[0]['refilled_from_order_id'], 'rx_id' => $rx_id])
                                ->update(['refill_status' => 'N']);
                    }
                    Prescription::where(['order_id' => $order_id, 'rx_id' => $rx_id])
                            ->update(['deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id]);
                    $message = trans('messages.delete_rx');
                } else {
                    $message = trans('messages.state_changed');
                }
            } else {
                $message = trans('messages.no_orderid');
                $alert_class = 'alert-danger';
            }
            $alert_class = 'alert-success';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/onhold');
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get order stage interval time in hrs.
     *
     * @param integer $rx_id
     * @param integer $order_id
     * @return integer $stage_time
     */
    public function stageTimeInterval($rx_id, $order_id)
    {
        try {
            $order_history = OrderHistory::where('order_id', '=', $order_id)
                    ->where('rx_id', '=', $rx_id)
                    ->where('stage', '=', $this->on_hold_stage)
                    ->orderBy('id', 'DESC')
                    ->first();
            if (!empty($order_history)) {
                if (isset($order_history['time'])) {
                    $stage_time = $order_history['time'];
                } else {
                    $time_diff = (Carbon::now()->timestamp - strtotime($order_history['created_at']));
                    $stage_time = round($time_diff / 3600);
                }
            }
            return $stage_time;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To manage order history.
     *
     * @param array $data
     * @return void
     */
    private function manageOrderHistory($data = [])
    {
        $order_id = $data['order_id'];
        $rx_id = $data['rx'];
        $change_stage = $data['stage'];
        $timestamp = Carbon::now();
        $change_by = auth()->user()->id;
        if (isset($rx_id)) {
            $rx_id = $data['rx'];
            $con = "where order_id=$order_id and rx_id=$rx_id";
        }
        $con = "where order_id=$order_id";
        $order_history = DB::select(DB::raw(
            "select * from `order_histories` $con and `stage` = $this->on_hold_stage and "
                                . "time IS NUll order by `id` desc"
        ));
        if (!empty($order_history)) {
            DB::update(DB::raw(
                "update `order_stage_relations` set `stage` = $change_stage,changed_by=$change_by,"
                            . "updated_at='" . $timestamp . "' $con"
            ));
            $time_diff = (Carbon::now()->timestamp - strtotime($order_history[0]->created_at));
            $time_in_hr = round($time_diff / 3600);
            OrderHistory::where('id', $order_history[0]->id)
                    ->update(['time' => $time_in_hr, 'updated_by' => $change_by]);
            OrderHistory::create([
                'order_id' => $order_id,
                'rx_id' => $rx_id,
                'stage' => $change_stage,
                'last_stage' => $this->on_hold_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
}
