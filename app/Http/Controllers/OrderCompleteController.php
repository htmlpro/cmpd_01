<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;
use App\Prescription;
use App\Helpers\Helpers;
use Carbon\Carbon;
use App\OrderHistory;
use Session;
use App\RefillHistory;
use App\PmpDispenserLog;
use App\AllQueueSummary;
use App\Status;

class OrderCompleteController extends Controller
{

    public $delete_stage = 5;
    public $complete_stage = 10;

    /**
     * To get all completed Orders/Rx at Complete Queue.
     *
     * @return array|$data
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['order_stage_relation'] = AllQueueSummary::where('stage_id', $this->complete_stage)
                        ->get([
                            'stage', 'stage_change_at', 'date_received', 'order_id', 'provider', 'date_entered', 'rx_id',
                            'patient', 'dob', 'medication', 'client', 'ship_to', 'dispatch_method', 'tracking_num', 'patient_lastname'
                        ])
                        ->toArray();
                $data['stage_name'] = trans('messages.complete_stage');
                $data['status'] = Status::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9])->get()->toArray();
                $data['current_date'] = Carbon::now()->timestamp;
                return view('orders.complete', $data);
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log:info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
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
            $user = auth()->user();
            $rx_ids = $request->input('rx_array');
            if (!empty($rx_ids)) {
                $change_stage = $request->input('change_state');
                DB::beginTransaction();
                if ($user->role == 1) {
                    foreach ($rx_ids as $key => $val) {
                        $rx_order_array = explode('-', $val);
                        $data = ['order_id' => $rx_order_array[1], 'stage' => $change_stage, 'rx' => $rx_order_array[0]];
                        $this->manageOrderHistory($data);
                        $get_status = Helpers::getStatus([$change_stage]);
                        AllQueueSummary::where(['order_id' => $rx_order_array[1], 'rx_id' => $rx_order_array[0]])
                                ->update([
                                    'stage' => $get_status ? $get_status[0]['name'] : '',
                                    'stage_id' => $change_stage,
                                    'stage_change_at' => Carbon::now(),
                        ]);
                        if ($change_stage == $this->delete_stage) {
                            $refill_history = RefillHistory::where('order_id', $rx_order_array[1])
                                    ->where('rx_id', $rx_order_array[0])
                                    ->get()
                                    ->toArray();
                            if (!empty($refill_history)) {
                                Prescription::where(['order_id' => $refill_history[0]['refilled_from_order_id'], 'rx_id' => $rx_order_array[0]])
                                        ->update(['refill_status' => 'N']);
                            }
                            $dispense_record = PmpDispenserLog::select('id')
                                    ->where(['rx_number' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])
                                    ->get()
                                    ->toArray();
                            if (empty($dispense_record)) {
                                $reporting_status = ['pmp_dispenser' => 'D', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                            } else {
                                $reporting_status = ['pmp_dispenser' => 'N', 'reporting_status' => '02', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                            }
                            Prescription::where(['order_id' => $rx_order_array[1], 'rx_id' => $rx_order_array[0]])
                                    ->update($reporting_status);
                        }
                    }
                    if ($change_stage == $this->delete_stage) {
                        $message = trans('messages.delete_rx');
                        $alert_class = 'alert-success';
                    } else {
                        $message = trans('messages.state_changed');
                        $alert_class = 'alert-success';
                    }
                } else {
                    $message = trans('messages.no_permission');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
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
        $order_history = DB::select(DB::raw("select * from `order_histories` $con "
                                . "and `stage` = $this->complete_stage and time IS NUll order by `id` desc"));
        if (!empty($order_history)) {
            DB::update(DB::raw("update `order_stage_relations` set `stage` = $change_stage,"
                            . "changed_by=$change_by,updated_at='" . $timestamp . "' $con"));
            $time_diff = (Carbon::now()->timestamp - strtotime($order_history[0]->created_at));
            $time_in_hr = round($time_diff / 3600);
            OrderHistory::where('id', $order_history[0]->id)
                    ->update(['time' => $time_in_hr, 'updated_by' => $change_by]);
            OrderHistory::create([
                'order_id' => $order_id,
                'rx_id' => $rx_id,
                'stage' => $change_stage,
                'last_stage' => $this->complete_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
}
