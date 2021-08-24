<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;
use App\Prescription;
use App\Helpers\Helpers;
use App\OrderStageRelation;
use Carbon\Carbon;
use App\OrderHistory;
use App\Dispatch;
use Session;
use App\PackageType;
use App\ServiceType;
use App\Invoice;
use App\InvoicePrice;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;
use App\PmpDispenserLog;
use App\AllQueueSummary;

class OrderDispatchController extends Controller {

    public $delete_stage = 5;
    public $dispatch_stage = 7;
    public $invoice_stage = 8;

    /**
     * To get all Rx at dispatch grid.
     *
     * @return array|$data
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->dispatch_stage)
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
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['formula_data'] = Helpers::getAllFormula();
                $data['method_data'] = Helpers::getAllDispatchMethods('assoc');
                $data['stage_name'] = trans('messages.dispatch_stage');
                return view('orders.dispatch', $data);
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
     * To get dispatchTo details.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|$dispatch_data
     */
    public function getDispatchTo(Request $request) {
        try {
            $order_id = $request->input('order_id');
            $dispatch_to = $request->input('dispatch_to');
            $dispatch_to_id = $request->input('dispatch_to_id');
            if ($dispatch_to == 'Provider') {
                $dispatch_to = 'providers';
            }elseif ($dispatch_to == 'Other') {
                $dispatch_to = 'Other';
            }else {
                $dispatch_to = 'patients';
            }
            if (!empty($order_id) && !empty($dispatch_to) && !empty($dispatch_to_id) && $dispatch_to != 'Other') {
                $order_details = DB::select("SELECT orders.*,$dispatch_to.* FROM `orders`,`$dispatch_to`"
                                . " WHERE orders.order_id= $order_id and $dispatch_to.id = $dispatch_to_id");
                if (!empty($order_details)) {
                    if ($dispatch_to == 'providers') {
                        foreach ($order_details[0] as $key => $val) {
                            $dispatch_data[] = array('key' => $key, 'val' => $val);
                        }
                    }elseif ($dispatch_to == 'Other') {
                        $dispatch_data[] = array();

                    } else {
                        foreach ($order_details[0] as $key => $val) {
                            if ($key == 'first_name' || $key == 'last_name' || $key == 'address1' || $key == 'address2' || $key == 'city' || $key == 'zip' || $key == 'phone' || $key == 'fax' || $key == 'email') {
                                $field = Crypt::decrypt($val);
                            } else {
                                $field = $val;
                            }
                            $dispatch_data[] = array('key' => $key, 'val' => $field);
                        }
                    }
                }
                return $dispatch_data;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To save dispatch details.
     *
     * @param \Illuminate\Http\Request $request
     * @return void.
     */
    public function saveDispatchToDetails(Request $request) {
        try {
            $order_id = $request->input('dispatch_order_id');
            $rx_id = !empty($request->input('dispatch_rx_id')) ? $request->input('dispatch_rx_id') : 0;
            $patient_id = $request->input('dispatch_to_patient_id');
            $provider_id = $request->input('dispatch_to_provider_id');
            $dispatch_to = $request->input('dispatch_to');
            DB::beginTransaction();
            if ($order_id != '' && $provider_id != '' && $patient_id != '') {
                if ($dispatch_to != '' && $dispatch_to == 'Provider') {
                    $patient_id = null;
                }else {
                    $provider_id = null;
                }
                if (!empty($rx_id)) {
                    $rx_con = array('order_id' => $order_id, 'rx_id' => $rx_id);
                } else {
                    $rx_con = array('order_id' => $order_id);
                }
                $dispatch_method = Helpers::getDispatchDetailById($request->input('dispatch_method'));
                $prescription_details = Prescription::where($rx_con)
                        ->get()
                        ->toArray();
                if (!empty($prescription_details)) {
                    foreach ($prescription_details as $key => $value) {
                        $dispatch_details = Dispatch::where(['order_id' => $value['order_id'], 'rx_id' =>
                                    $value['rx_id']])
                                ->count();
                        if (!empty($dispatch_details)) {
                            $dispatch = Dispatch::where([
                                        "order_id" => $value['order_id'], 'rx_id' => $value['rx_id']
                                    ])
                                    ->update([
                                'patient_id' => $patient_id,
                                'provider_id' => $provider_id,
                                'dispatch_to_type' => $dispatch_to,
                                'first_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_first_name') : Crypt::encrypt($request->input('dispatch_first_name')),
                                'last_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_last_name') : Crypt::encrypt($request->input('dispatch_last_name')),
                                'address1' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_1') : Crypt::encrypt($request->input('dispatch_address_1')),
                                'address2' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_2') : Crypt::encrypt($request->input('dispatch_address_2')),
                                'city' => ($dispatch_to == 'Provider') ? $request->input('dispatch_city') : Crypt::encrypt($request->input('dispatch_city')),
                                'state' => $request->input('dispatch_state'),
                                'zip' => ($dispatch_to == 'Provider') ? $request->input('dispatch_zip') : Crypt::encrypt($request->input('dispatch_zip')),
                                'phone' => ($dispatch_to == 'Provider') ? $request->input('dispatch_phone') : Crypt::encrypt($request->input('dispatch_phone')),
                                'fax' => ($dispatch_to == 'Provider') ? $request->input('dispatch_fax') : Crypt::encrypt($request->input('dispatch_fax')),
                                'email' => ($dispatch_to == 'Provider') ? $request->input('dispatch_email') : Crypt::encrypt($request->input('dispatch_email')), 
                                'dispatch_method' => $request->input('dispatch_method'),
                                'updated_at' => Carbon::now()
                            ]);
                            $message = trans('messages.dispatch_updated');
                            $alert_class = 'alert-success';
                        } else {
                            $dispatch_create = Dispatch::Create([
                                        'order_id' => $value['order_id'],
                                        'rx_id' => $value['rx_id'],
                                        'patient_id' => $patient_id,
                                        'provider_id' => $provider_id,
                                        'dispatch_to_type' => $dispatch_to,
                                        'last_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_last_name') : Crypt::encrypt($request->input('dispatch_last_name')),
                                        'first_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_first_name') : Crypt::encrypt($request->input('dispatch_first_name')),
                                        'address1' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_1') : Crypt::encrypt($request->input('dispatch_address_1')),
                                        'address2' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_2') : Crypt::encrypt($request->input('dispatch_address_2')),
                                        'city' => ($dispatch_to == 'Provider') ? $request->input('dispatch_city') : Crypt::encrypt($request->input('dispatch_city')),
                                        'state' => $request->input('dispatch_state'),
                                        'zip' => ($dispatch_to == 'Provider') ? $request->input('dispatch_zip') : Crypt::encrypt($request->input('dispatch_zip')),
                                        'phone' => ($dispatch_to == 'Provider') ? $request->input('dispatch_phone') : Crypt::encrypt($request->input('dispatch_phone')),
                                        'fax' => ($dispatch_to == 'Provider') ? $request->input('dispatch_fax') : Crypt::encrypt($request->input('dispatch_fax')),
                                        'email' => ($dispatch_to == 'Provider') ? $request->input('dispatch_email') : Crypt::encrypt($request->input('dispatch_email')),
                                        'dispatch_method' => $request->input('dispatch_method'),
                                        'created_at' => Carbon::now()
                            ]);
                            $message = trans('messages.dispatch_success');
                            $alert_class = 'alert-success';
                        }
                        AllQueueSummary::where(['order_id' => $value['order_id'], 'rx_id' => $value['rx_id']])
                                ->update([
                                    'dispatch_method' => $dispatch_method ? $dispatch_method[0]['dispatch_method'] : '',
                                    'ship_to' => $dispatch_to
                        ]);
                    }
                } else {
                    $message = trans('messages.no_prescription_added');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.dispatch_failed');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            $redirect_to = ($request->input('redirect_to') == 'entry') ? 'entry' : $request->input('redirect_to');
            if ($redirect_to == 'entry') {
                return redirect('/order/manage/' . $redirect_to . '/' . $order_id);
            }
            return redirect('/order/manage/' . $redirect_to . '/' . $order_id . '/' . $rx_id);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To change order state.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function changeOrderState(Request $request) {
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
                $alert_class = 'alert-success';
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
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
    public function stageTimeInterval($rx_id, $order_id) {
        try {
            $order_history = OrderHistory::where('rx_id', $rx_id)
                            ->where('order_id', $order_id)
                            ->where('stage', $this->dispatch_stage)
                            ->orderBy('id', 'DESC')
                            ->first()->toArray();
            if (!empty($order_history)) {
                if (isset($order_history['time'])) {
                    $stage_time = $order_history['time'];
                } else {
                    $time_diff = (Carbon::now()->timestamp -
                            strtotime($order_history['created_at']));
                    $stage_time = round($time_diff / 3600);
                }
            }
            return $stage_time;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get selected Rx details for dispatch.
     *
     * @param \Illuminate\Http\Request $request
     * @return void.
     */
    public function manageDispatch(Request $request) {
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
                                ->where('order_id', $rx_order_array[1])
                                ->where('rx_id', $rx_order_array[0])
                                ->get()
                                ->toArray();
                        $dispatch_details = Dispatch::with('dispatchMethod')->with('invoice')
                                ->where('order_id', $rx_order_array[1])
                                ->where('rx_id', $rx_order_array[0])
                                ->get()
                                ->toArray();
                        if (!empty($dispatch_details)) {
                            foreach ($dispatch_details as $dispatchkeys => $value) {
                                foreach ($value as $dispatchkey => $val) {
                                    if (($dispatchkey == 'first_name' || $dispatchkey == 'last_name' || $dispatchkey == 'address1' || $dispatchkey == 'address2' ||
                                            $dispatchkey == 'city' || $dispatchkey == 'zip' || $dispatchkey == 'phone' || $dispatchkey == 'fax' || $dispatchkey == 'email') && ($value['dispatch_to_type'] == 'Patient'||$value['dispatch_to_type'] == 'Other')) {
                                        $dispatch_detail[0][$dispatchkey] = Crypt::decrypt($val);
                                    } else {
                                        $dispatch_detail[0][$dispatchkey] = $val;
                                    }
                                }
                            }
                            $data['order_pres_details'][$i][0]['dispatch'] = $dispatch_detail;
                        } else {
                            $data['order_pres_details'][$i][0]['dispatch'] = null;
                        }
                        $i++;
                    }
                }
                if (!empty($data['order_pres_details'])) {
                    foreach ($data['order_pres_details'] as $keys => $value) {
                        foreach ($value as $key => $val) {
                            if (!empty($val['dispatch'])) {
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
                    }
                }
                $data['formula_data'] = Helpers::getAllFormula();
                $data['weight_unit'] = Helpers::getAllWeightUnits();
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['method_data'] = Helpers::getAllDispatchMethods('assoc');
                $data['state_data'] = Helpers::getAllStates('assoc');
                $data['status'] = Helpers::getStatus([1, 2, 3, 4, 5, 6, 9]);
                $data['stage_name'] = trans('messages.dispatch_stage');
                $request->session()->put('dispatch_details', $data);
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
     * To redirect dispatch manage blade.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|$data.
     */
    public function redirectToManage(Request $request) {
        try {
             if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['dispatch'] = $request->session()->get('dispatch_details');
                $data['documents'] = Helpers::getAllDocuments();
                return view('orders.manage.stage_dispatch', $data);
            } else {
                $message = trans('messages.unauthorize');
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
     * To get the courier details.
     *
     * @param \Illuminate\Http\Request $request
     * @return json|$data
     */
    public function getCourierDetail(Request $request) {
        try {
            $dispatch_method = $request->input('dispatch_method');
            if (isset($dispatch_method)) {
                $data['package_type'] = PackageType::select('id', 'package_type')
                        ->where('dispatch_method_id', $dispatch_method)
                        ->get()
                        ->toArray();
                $data['service_type'] = ServiceType::select('id', 'service_type')
                        ->where('dispatch_method_id', $dispatch_method)
                        ->get()
                        ->toArray();
                return response()->json(array(
                            'success' => true,
                            'data' => $data
                ));
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To save the dispatch orders details.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function orderDispatch(Request $request) {
        try {
            if (!empty($request->rx)) {
                DB::beginTransaction();
                $rx_array = $request->rx;
                $patient_id = $request->input('dispatch_to_patient_id');
                $provider_id = $request->input('dispatch_to_provider_id');
                $dispatch_to = $request->input('dispatch_to');

                if ($dispatch_to != '' && $dispatch_to == 'Provider') {
                    $patient_id = null;
                } else if($dispatch_to != '' && $dispatch_to == 'Other'){
                    $patient_id = null;
                    $provider_id = null;
                }else {
                    $provider_id = null;
                }
                if ($request->input('dispatch_method') == 1) {
                    $tracking = $request->input('fedex_tracking');
                } else {
                    $tracking = $request->input('ups_tracking');
                }
                $dispatch_count = Invoice::all()->count();
                $dispatch_id = $dispatch_count + 1;
                foreach ($rx_array as $key => $value) {
                    if ($value != 'on') {
                        $rx_order_array = explode('-', $value);
                        $dispatch_details = Dispatch::where(['rx_id' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])->count();
                        $prescription_details = Prescription::where(['rx_id' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])
                                ->get()
                                ->toArray();
                        if (!empty($dispatch_details)) {
                            Dispatch::where(['rx_id' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])
                                    ->update([
                                        'patient_id' => $patient_id,
                                        'provider_id' => $provider_id,
                                        'dispatch_id' => $dispatch_id,
                                        'dispatch_to_type' => $dispatch_to,
                                        'first_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_first_name') : Crypt::encrypt($request->input('dispatch_first_name')),
                                        'last_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_last_name') : Crypt::encrypt($request->input('dispatch_last_name')),
                                        'address1' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_1') : Crypt::encrypt($request->input('dispatch_address_1')),
                                        'address2' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_2') : Crypt::encrypt($request->input('dispatch_address_2')),
                                        'city' => ($dispatch_to == 'Provider') ? $request->input('dispatch_city') : Crypt::encrypt($request->input('dispatch_city')),
                                        'state' => $request->input('dispatch_state'),
                                        'zip' => ($dispatch_to == 'Provider') ? $request->input('dispatch_zip') : Crypt::encrypt($request->input('dispatch_zip')),
                                        'phone' => ($dispatch_to == 'Provider') ? $request->input('dispatch_phone') : Crypt::encrypt($request->input('dispatch_phone')),
                                        'fax' => ($dispatch_to == 'Provider') ? $request->input('dispatch_fax') : Crypt::encrypt($request->input('dispatch_fax')),
                                        'email' => ($dispatch_to == 'Provider') ? $request->input('dispatch_email') : Crypt::encrypt($request->input('dispatch_email')),
                                        'dispatch_method' => $request->input('dispatch_method'),
                                        'person_drop_id_indentification' => ($dispatch_to == 'Other')?$request->input('person_drop_id_indentification'):null,
                                        'person_drop_id_indentification_number' => ($dispatch_to == 'Other')?$request->input('person_drop_id_indentification_number'):null,
                                        'relationship_person_dropping_id' => ($dispatch_to == 'Other')?$request->input('relationship_person_dropping_id'):null,
                                        'additional_person_drop_id_indentification' => ($dispatch_to == 'Other')?$request->input('additional_person_drop_id_indentification'):null,
                                        'status' => 'Invoice',
                                        'updated_at' => Carbon::now()]);
                        } else {
                            Dispatch::Create([
                                'order_id' => $prescription_details[0]['order_id'],
                                'rx_id' => $prescription_details[0]['rx_id'],
                                'patient_id' => $patient_id,
                                'provider_id' => $provider_id,
                                'dispatch_id' => $dispatch_id,
                                'dispatch_to_type' => $dispatch_to,
                                'first_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_first_name') : Crypt::encrypt($request->input('dispatch_first_name')),
                                'last_name' => ($dispatch_to == 'Provider') ? $request->input('dispatch_last_name') : Crypt::encrypt($request->input('dispatch_last_name')),
                                'address1' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_1') : Crypt::encrypt($request->input('dispatch_address_1')),
                                'address2' => ($dispatch_to == 'Provider') ? $request->input('dispatch_address_2') : Crypt::encrypt($request->input('dispatch_address_2')),
                                'city' => ($dispatch_to == 'Provider') ? $request->input('dispatch_city') : Crypt::encrypt($request->input('dispatch_city')),
                                'state' => $request->input('dispatch_state'),
                                'zip' => ($dispatch_to == 'Provider') ? $request->input('dispatch_zip') : Crypt::encrypt($request->input('dispatch_zip')),
                                'phone' => ($dispatch_to == 'Provider') ? $request->input('dispatch_phone') : Crypt::encrypt($request->input('dispatch_phone')),
                                'fax' => ($dispatch_to == 'Provider') ? $request->input('dispatch_fax') : Crypt::encrypt($request->input('dispatch_fax')),
                                'email' => ($dispatch_to == 'Provider') ? $request->input('dispatch_email') : Crypt::encrypt($request->input('dispatch_email')),
                                'dispatch_method' => $request->input('dispatch_method'),
                                'person_drop_id_indentification' => ($dispatch_to == 'Other')?$request->input('person_drop_id_indentification'):null,
                                'person_drop_id_indentification_number' => ($dispatch_to == 'Other')?$request->input('person_drop_id_indentification_number'):null,
                                'relationship_person_dropping_id' => ($dispatch_to == 'Other')?$request->input('relationship_person_dropping_id'):null,
                                'additional_person_drop_id_indentification' => ($dispatch_to == 'Other')?$request->input('additional_person_drop_id_indentification'):null,
                                'status' => 'Invoice',
                                'created_at' => Carbon::now()
                            ]);
                        }
                        $dispatch_method = Helpers::getDispatchDetailById($request->input('dispatch_method'));
                        $get_status = Helpers::getStatus([$this->invoice_stage]);
                        $service_type = ServiceType::where('id', $request->input('service_type'))->get(['service_type'])->toArray();
                        AllQueueSummary::where(['order_id' => $prescription_details[0]['order_id'], 'rx_id' => $prescription_details[0]['rx_id']])
                                ->update([
                                    'dispatch_method' => $dispatch_method ? $dispatch_method[0]['dispatch_method'] : '',
                                    'ship_to' => $dispatch_to,
                                    'tracking_num' => $tracking,
                                    'stage' => $get_status ? $get_status[0]['name'] : '',
                                    'stage_id' => $this->invoice_stage,
                                    'stage_change_at' => Carbon::now(),
                                    'delivery_service' => $service_type ? $service_type[0]['service_type'] : '',
                                    'shiping_price' => $request->input('delivery_price')
                        ]);
                        InvoicePrice::Create([
                            'order_id' => $prescription_details[0]['order_id'],
                            'rx_id' => $prescription_details[0]['rx_id'],
                            'formula_id' => $prescription_details[0]['formula'],
                            'price' => $prescription_details[0]['total_price'],
                        ]);
                        OrderStageRelation::where(['rx_id' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])
                                ->update([
                                    'stage' => $this->invoice_stage,
                                    'changed_by' => auth()->user()->id
                        ]);
                        $order_history = OrderHistory::where(['rx_id' => $rx_order_array[0], 'order_id' => $rx_order_array[1]])
                                ->where('stage', '=', $this->dispatch_stage)
                                ->whereNull('time')
                                ->get()
                                ->toArray();
                        if (!empty($order_history)) {
                            $time_diff = (Carbon::now()->timestamp - strtotime($order_history[0]['created_at']));
                            $time_in_hr = round($time_diff / 3600);
                            OrderHistory::where('id', $order_history[0]['id'])
                                    ->update(['time' => $time_in_hr, 'updated_by' => auth()->user()->id]);
                            OrderHistory::create([
                                'order_id' => $order_history[0]['order_id'],
                                'rx_id' => $order_history[0]['rx_id'],
                                'stage' => $this->invoice_stage,
                                'last_stage' => $this->dispatch_stage,
                                'created_by' => auth()->user()->id,
                                'created_at' => Carbon::now()
                            ]);
                        }
                    }
                }
                Invoice::Create([
                    'dispatch_id' => $dispatch_id,
                    'service_type' => $request->input('service_type'),
                    'weight' => $request->input('weight'),
                    'package_type' => $request->input('package_type'),
                    'dimension_l' => $request->input('dimension_l'),
                    'dimension_w' => $request->input('dimension_w'),
                    'dimension_h' => $request->input('dimension_h'),
                    'tracking' => $tracking,
                    'order_id' => $request->input('order_id'),
                    'unit' => $request->input('unit'),
                    'price' => $request->input('total_price'),
                    'delivery_price' => $request->input('delivery_price'),
                    'created_by' => auth()->user()->id
                ]);
                $message = trans('messages.dispatch_success');
                $alert_class = 'alert-success';
            } else {
                $message = trans('messages.no_prescription_selected');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/dispatch');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To Manage order history.
     *
     * @param array $data
     * @return void
     */
    private function manageOrderHistory($data = []) {
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
                                . "and `stage` = $this->dispatch_stage and time IS NUll order by `id` desc"));
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
                'last_stage' => $this->dispatch_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }

    /**
     * To get formula price for invoice.
     *
     * @param array $rx_array
     * @return array $price_array
     */
    private function invoicePrice($rx_array = []) {
        foreach ($rx_array as $key => $value) {
            if ($value != 'on') {
                $rx_order_array = explode('-', $value);
                $prescriptions = Prescription::with('order.provider')
                        ->where('rx_id', $rx_order_array[0])
                        ->where('order_id', $rx_order_array[1])
                        ->get()
                        ->toArray();
                $formula_price = 0;
                if (!empty($prescriptions)) {
                    $provider_price = Helpers::getManipualtionPrice($prescriptions[0]['order']['provider_id'], $prescriptions[0]['formula']);
                    if (!empty($provider_price)) {
                        $formula_price = $provider_price[0]['price'];
                    } else {
                        $provider_details = Helpers::getProvierDetail($prescriptions[0]['order']['provider_id']);
                        if (!empty($provider_details[0]['provider_corporation'])) {
                            $corporate_price = Helpers::getManipualtionPrice($provider_details[0]['provider_corporation'], $prescriptions[0]['formula']);
                            if (!empty($corporate_price)) {
                                $formula_price = $corporate_price[0]['price'];
                            }
                        }
                        if (!empty($provider_details[0]['client']) && empty($formula_price)) {
                            $client_price = Helpers::getManipualtionPrice($provider_details[0]['client'], $prescriptions[0]['formula']);
                            if (!empty($client_price)) {
                                $formula_price = $client_price[0]['price'];
                            }
                        }
                        if (empty($formula_price)) {
                            $global_price = Helpers::getPkFormulaPrice($prescriptions[0]['formula']);
                            if (!empty($global_price)) {
                                $formula_price = $global_price[0]['PRICE'];
                            } else {
                                $formula_price = 0;
                            }
                        }
                    }
                    $price_array[$prescriptions[0]['id'] . $prescriptions[0]['formula']] = $formula_price;
                }
            }
        }
        return $price_array;
    }

}
