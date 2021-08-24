<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use DB;
use Log;
use App\Prescription;
use App\Helpers\Helpers;
use Carbon\Carbon;
use App\OrderHistory;
use App\OrderStageRelation;
use Session;
use App\PackageType;
use App\ServiceType;
use App\Dispatch;
use App\InvoicePrice;
use App\RefillHistory;
use App\PmpDispenserLog;
use App\AllQueueSummary;

class OrderInvoiceController extends Controller
{

    public $delete_stage = 5;
    public $invoice_stage = 8;

    /**
     * To render all Rx at invoice grid.
     *
     * @return array|$data
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->invoice_stage)
                        ->get()
                        ->toArray();
                if (!empty($order_stage_relation)) {
                    foreach ($order_stage_relation as $key => $value) {
                        $data['order_pres_details'][] = Prescription::with('order')
                                ->with('order.patient')
                                ->with('order.provider')
                                ->where('order_id', $value['order_id'])
                                ->where('rx_id', $value['rx_id'])
                                ->get()
                                ->toArray();
                        $data['order_pres_details'][$key][0]['dispatch'] = Dispatch::with('dispatchMethod')
                                ->with('invoice')
                                ->where('order_id', $value['order_id'])
                                ->where('rx_id', $value['rx_id'])
                                ->get()
                                ->toArray();
                    }
                    if (!empty($data['order_pres_details'])) {
                        foreach ($data['order_pres_details'] as $keys => $value) {
                            foreach ($value as $key => $val) {
                                $data['order_pres_details'][$keys][$key]['stage_time'] = $this->stageTimeInterval($val['rx_id'], $val['order_id']);
                            }
                        }
                    }
                }
                $data['formula_data'] = Helpers::getAllFormula();
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['method_data'] = Helpers::getAllDispatchMethods('assoc');       
                $data['stage_name'] = trans('messages.invoice_stage');
                return view('orders.invoice', $data);
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
     * To render selected Rx details at invoice manage grid.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|$data.
     */
    public function manageInvoice(Request $request)
    {
        try {
            $rx_array = $request->input('rx_num');
            if (!empty($rx_array)) {
                $i = 0;
                foreach ($rx_array as $key => $value) {
                    if ($value != 'on') {
                        $rx_order_array = explode('-', $value);
                        $data['order_pres_details'][] = Prescription::with('order')
                                ->with('order.patient')
                                ->with('order.provider')
                                ->where('rx_id', $rx_order_array[0])
                                ->where('order_id', $rx_order_array[1])
                                ->get()
                                ->toArray();
                        $data['order_pres_details'][$i][0]['dispatch'] = Dispatch::with('dispatchMethod')
                                ->with('invoice')
                                ->where('order_id', $rx_order_array[1])
                                ->where('rx_id', $rx_order_array[0])
                                ->get()
                                ->toArray();
                        $data['order_pres_details'][$i][0]['invoice_price'] = InvoicePrice::where('order_id', $rx_order_array[1])
                                ->where('rx_id', $rx_order_array[0])
                                ->where('formula_id', $data['order_pres_details'][$i][0]['formula'])
                                ->get()
                                ->toArray();
                        $i++;
                    }
                }
                if (!empty($data['order_pres_details'])) {
                    $total_price = 0;
                    $delivery_price = [];
                    foreach ($data['order_pres_details'] as $keys => $value) {
                        foreach ($value as $key => $val) {
                            if (!empty($val['invoice_price'])) {
                                $total_price = $total_price + $val['invoice_price'][0]['price'];
                            }
                            $delivery_price[$val['dispatch'][0]['invoice']['id']] = $val['dispatch'][0]['invoice']['delivery_price'];
                            $data['package_type'] = PackageType::select('id', 'package_type')
                                    ->where('dispatch_method_id', $val['dispatch'][0]['dispatch_method']['id'])
                                    ->get()
                                    ->toArray();
                            $data['service_type'] = ServiceType::select('id', 'service_type')
                                    ->where('dispatch_method_id', $val['dispatch'][0]['dispatch_method']['id'])
                                    ->get()
                                    ->toArray();
                        }
                    }
                    $data['total_price'] = $total_price;
                    $data['total_delivery_price'] = array_sum($delivery_price);
                    $data['grand_total'] = $total_price + array_sum($delivery_price);
                }
                $data['formula_data'] = Helpers::getAllFormula();
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['method_data'] = Helpers::getAllDispatchMethods('assoc');
                $data['state_data'] = Helpers::getAllStates('assoc');
                $data['weight_unit'] = Helpers::getAllWeightUnits('assoc');
                $data['status'] = Helpers::getStatus([1, 2, 3, 4, $this->delete_stage, 6, 7, 9]);
                $data['stage_name'] = trans('messages.invoice_stage');
                $request->session()->put('invoice_details', $data);
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To redirect to invoice manage grid.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|$data.
     */
    public function redirectToManage(Request $request)
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['invoice'] = $request->session()->get('invoice_details');
                return view('orders.manage.stage_invoice', $data);
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
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
            $order_history = OrderHistory::where('order_id', $order_id)
                    ->where('rx_id', $rx_id)
                    ->where('stage', $this->invoice_stage)
                    ->orderBy('id', 'DESC')
                    ->first()
                    ->toArray();
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
     * To change order state.
     *
     * @param integer $order_id
     * @return void
     */
    public function changeOrderState(Request $request)
    {
        try {
            $rx_ids = $request->input('rx_array');
            if (!empty($rx_ids)) {
                $change_stage = $request->input('change_state');
                DB::beginTransaction();
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
                } else {
                    $message = trans('messages.state_changed');
                }
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
            }
            $alert_class = 'alert-success';
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
                                . "and `stage` = $this->invoice_stage and time IS NUll order by `id` desc"));
        if (!empty($order_history)) {
            DB::update(DB::raw("update `dispatches` set `status` = 'Complete',"
                            . "updated_at='" . $timestamp . "' $con AND status = 'Invoice'"));
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
                'last_stage' => $this->invoice_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
}
