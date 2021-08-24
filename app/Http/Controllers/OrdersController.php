<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Attachment;
use App\DataTableGrid;
use App\OrderStageRelation;
use DB;
use Log;
use App\Prescription;
use Validator;
use Session;
use App\Helpers\Helpers;
use App\Provider;
use App\User;
use App\OrderHistory;
use App\RefillHistory;
use App\ScriptCounter;
use App\PmpDispenserLog;
use App\AllQueueSummary;
use Crypt;


class OrdersController extends Controller
{

    public $reception_stage = 1;
    public $entry_stage = 2;
    public $delete_stage = 5;

    /**
     * To render all orders at Order Reception Queue.
     *
     * @return array|$data
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['order_details'] = Order::with('patient')
                        ->with('provider')
                        ->with('prescription.formula')
                        ->with('orderStageRealtion')
                        ->whereHas('orderStageRealtion', function (Builder $query) {
                            $query->where('stage', '=', $this->reception_stage);
                        })
                        ->get()
                        ->toArray();
                if (!empty($data['order_details'])) {
                    foreach ($data['order_details'] as $key => $value) {
                        $data['order_details'][$key]['stage_time'] = $this->stageTimeInterval($value['order_id']);
                    }
                }
                $data['provider_with_address'] = Helpers::getAllProvidersWithAddress();
                $data['patient_data'] = Helpers::getAllPatients('assoc');
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['formulas'] = Helpers::getAllFormulas('assoc');
                $data['stage_name'] = trans('messages.reception_stage');
                return view('orders.reception', $data);
            } else {
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To add the manual order details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addManualOrder(Request $request)
    {
        try {
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $rules = [
                    'file_path' => 'required|mimes:pdf|max:2048'
                ];
                $requestt_data = $request->all();
                $validator = Validator::make($requestt_data, $rules);
                if ($validator->passes()) {
                    $file_name = time() . '-' . $request->file('file_path')->getClientOriginalName();
                    $file_path = base_path() . '/public/attachments/' . $file_name;
                    request()->file_path->move(public_path('attachments'), $file_name);

                    $pdftext = file_get_contents($file_path);
                    $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                    DB::beginTransaction();
                    $attachment = Attachment::create([
                                'message_id' => 0,
                                'file_name' => $file_name,
                                'file_path' => $file_path,
                                'created_at' => Carbon::now()
                    ]);
                    if (!empty($attachment)) {
                        if (isset($request->provider)) {
                            $client_id = Provider::select('client')
                                    ->where('id', $request->provider)
                                    ->get()
                                    ->toArray();
                            if(!empty($client_id)){
                                $client_dtl = Helpers::getProvierDetail($client_id[0]['client']);
                            }
                        }
                        $orders = Order::create([
                                    'order_id' => null,
                                    'provider_id' => $request->provider,
                                    'client_id' => isset($client_id) ? $client_id[0]['client'] : null,
                                    'patient_id' => $request->patient,
                                    'source' => trans('messages.manual'),
                                    'page_count' => $num,
                                    'attachment_id' => $attachment->id,
                                    'created_at' => Carbon::now(),
                                    'created_by' => auth()->user()->id,
                        ]);
                        if (!empty($orders)) {
                            $start_counter = ScriptCounter::where('type', 'Order')
                                    ->get()
                                    ->toArray();
                            if (!empty($start_counter)) {
                                $order_id = $start_counter[0]['start_counter'] + $orders['id'];
                            } else {
                                $order_id = $orders['id'];
                            }
                            Order::where('id', $orders['id'])
                                    ->update(['order_id' => $order_id]);
                            OrderStageRelation::create([
                                'order_id' => $order_id,
                                'stage' => $this->reception_stage,
                                'created_at' => Carbon::now()
                            ]);
                            OrderHistory::create([
                                'order_id' => $order_id,
                                'stage' => $this->reception_stage,
                                'created_by' => auth()->user()->id,
                                'created_at' => Carbon::now()
                            ]);
                            $get_status = Helpers::getStatus([$this->reception_stage]);
                            $provider_dtl = Helpers::getProvierDetail($request->provider);
                            $patient_dtl = Helpers::getPatientDetail($request->patient);   
                            AllQueueSummary::create([
                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                'stage_id' => $this->reception_stage,
                                'stage_change_at' => Carbon::now(),
                                'provider_id' => $request->provider,
                                'date_received' => Carbon::now(),
                                'order_id' => $order_id,
                                'provider' => $provider_dtl ? $provider_dtl[0]['first_name'] ." ". $provider_dtl[0]['last_name'] : '',
                                'doctor_address1' => $provider_dtl ? $provider_dtl[0]['reg_address1'] : '',
                                'doctor_address2' => $provider_dtl ? $provider_dtl[0]['reg_address2'] : '',
                                'doctor_city' => $provider_dtl ? $provider_dtl[0]['reg_city'] : '',
                                'doctor_state' => $provider_dtl ? $provider_dtl[0]['reg_state'] : '',
                                'doctor_zip' => $provider_dtl ? $provider_dtl[0]['reg_zip'] : '',
                                'doctor_dea' => $provider_dtl ? $provider_dtl[0]['dea'] : '',
                                'doctor_phone' => $provider_dtl ? $provider_dtl[0]['phone1'] : '',
                                'doctor_email' => $provider_dtl ? $provider_dtl[0]['email'] : '',
                                'patient' => $patient_dtl ? $patient_dtl[0]['first_name'] : '',
                                'patient_lastname' => $patient_dtl ? $patient_dtl[0]['last_name'] : '',
                                'dob' => $patient_dtl ? $patient_dtl[0]['dob'] : '',
                                'patient_id' => $patient_dtl ? $patient_dtl[0]['id'] : '',
                                'patient_address1' => $patient_dtl ? $patient_dtl[0]['address1'] : '',
                                'patient_address2' => $patient_dtl ? $patient_dtl[0]['address2'] : '',
                                'patient_city' => $patient_dtl ? $patient_dtl[0]['city'] : '',
                                'patient_state' => $patient_dtl ? $patient_dtl[0]['state'] : '',
                                'patient_zip' => $patient_dtl ? $patient_dtl[0]['zip'] : '',
                                'patient_gender' => $patient_dtl ? $patient_dtl[0]['gender'] : '',
                                'patient_phone' => $patient_dtl ? $patient_dtl[0]['phone'] : '',
                                'client' => $client_dtl ? $client_dtl[0]['first_name'] ." ". $client_dtl[0]['last_name'] : '',
                                'tech' => auth()->user()->name
                            ]);
                            DB::commit();
                        }                        
                    }
                    $message = trans('messages.order_success', ["orderid" => $order_id]);
                    $alert_class = 'alert-success';
                } else {
                    $message = trans('messages.pdf_validation_failed');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.pdf_file_required');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect('/orders');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To save the grid columns sequence in db.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function columnReorder(Request $request)
    {
        try {
            $record_id = DataTableGrid::select('id')
                    ->where('user_id', $request->input('userid'))
                    ->where('stage', $request->input('stage'))
                    ->get();
            if (empty($record_id->first()->id)) {
                DataTableGrid::create([
                    'user_id' => $request->input('userid'),
                    'stage' => $request->input('stage'),
                    'column_order' => $request->input('column_order'),
                    'created_at' => Carbon::now()
                ]);
            } else {
                DataTableGrid::where('id', $record_id->first()->id)
                        ->update(
                            array(
                                    'column_order' => json_encode($request->input('column_order'))
                                )
                        );
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get all the grid columns sequence from db.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|column_order
     */
    public function getColumOrder(Request $request)
    {

        try {
            $record_id = DataTableGrid::select('column_order')
                    ->where('user_id', $request->input('userid'))
                    ->where('stage', $request->input('stage'))
                    ->get();
            return $record_id->first()->column_order;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To render individual oder details on the grid.
     *
     * @param integer $order_id
     * @return array|$data
     */
    public function manageOrderReception($order_id)
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($order_id)) {
                    $data['order_details'] = Order::where('order_id', $order_id)
                            ->with('noteDetails')
                            ->get()
                            ->toArray();
                    $order_history = DB::select(DB::raw("select rx_id from `order_histories` where order_id=$order_id "
                                            . "and `stage` = $this->reception_stage and time IS NUll order by `id` desc"));
                    if (!empty($order_history)) {
                        foreach ($order_history as $val) {
                            $rx_ids[] = $val->rx_id;
                        }
                        if (!empty($rx_ids)) {
                            $data['prescription'] = Prescription::with('rxOrigin')
                                    ->with('schedule')
                                    ->with('state')
                                    ->with('unit')
                                    ->with('daw')
                                    ->where('order_id', $order_id)
                                    ->whereIn('rx_id', $rx_ids)
                                    ->get()
                                    ->toArray();
                        }
                    }
                    if (!empty($data['order_details'])) {
                        $attachment_details = Attachment::find($data['order_details'][0]['attachment_id']);
                        $data['order_id'] = $data['order_details'][0]['order_id'];
                        $data['file_name'] = $attachment_details['file_name'];
                        $data['total_pages'] = $data['order_details'][0]['page_count'];
                        $data['formula_data'] = Helpers::getAllPKFormula();
                        $data['patients'] = Helpers::getAllPatients('assoc');
                        $data['states'] = Helpers::getAllStates();
                        $data['species'] = Helpers::getAllSpecies();
                        $data['allergies'] = Helpers::getAllAllergies();
                        $data['health'] = Helpers::getAllHealthConditions();
                        $data['admin_users'] = $this->getUserByRole('1');
                        $data['pharm_users'] = $this->getUserByRole('2');
                        $data['tech_users'] = $this->getUserByRole('3');
                        $data['documents'] = Helpers::getAllDocuments();
                        $data['provider_with_address'] = Helpers::getAllProvidersWithAddress();
                        $data['corporates'] = Helpers::getProviders([2]);
                        $data['clients'] = Helpers::getProviders([3]);
                        $data['provider_types'] = Helpers::getAllProviderTypes();
                        $data['location_code'] = Helpers::getPatientLocationCode();
                        $data['status'] = Helpers::getStatus([$this->delete_stage, 9]);
                        $data['provider_status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                        $data['stage_name'] = trans('messages.reception_stage');
                        return view('orders.manage.stage_reception')->with('pdf_detail', $data);
                    }
                }
                return redirect()->back();
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
     * To change order state.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function changeOrderState(Request $request)
    {
        try {
            $order_id = $request['order_id'];
            $change_stage = $request['change_state'];
            if (!empty($order_id)) {
                if (!empty($request['change_state'])) {
                    $change_stage = $request['change_state'];
                } else {
                    $change_stage = $this->entry_stage;
                }
                DB::beginTransaction();
                $order_deatils = Order::where('order_id', $order_id)
                        ->get()
                        ->toArray();
                if ((isset($order_deatils[0]['patient_id']) &&
                        isset($order_deatils[0]['provider_id'])) ||
                        ($change_stage == $this->delete_stage || $change_stage == 9)) {
                    $prescription = Prescription::where('order_id', '=', $order_id)
                            ->get()
                            ->toArray();
                    $rx_ids = OrderStageRelation::where(['order_id' => $order_id, 'stage' => $this->reception_stage])
                            ->get(['rx_id'])
                            ->toArray();
                    if (empty($prescription) && ($change_stage > $this->entry_stage &&
                            $change_stage != $this->delete_stage && $change_stage != 9)) {
                        $message = trans('messages.no_rx_add');
                        $alert_class = 'alert-danger';
                    } else {
                            $get_status = Helpers::getStatus([$change_stage]);
                        if (empty($prescription)) {
                            $data = ['order_id' => $order_id, 'stage' => $change_stage];
                            $this->manageOrderHistory($data);
                            AllQueueSummary::where(['order_id' => $order_id])
                                    ->update([
                                        'stage' => $get_status ? $get_status[0]['name'] : '',
                                        'stage_id' => $change_stage,
                                        'stage_change_at' => Carbon::now(),
                            ]);
                            if ($change_stage == $this->delete_stage) {
                                Order::where('order_id', $order_id)
                                        ->update(['deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id]);
                            }
                        } else {
                            foreach ($rx_ids as $key => $val) {
                                if (!empty($val['rx_id'])) {
                                    $data = ['order_id' => $order_id, 'stage' => $change_stage, 'rx' => $val['rx_id']];
                                    $this->manageOrderHistory($data);
                                    AllQueueSummary::where(['order_id' => $order_id, 'rx_id' => $val['rx_id']])
                                            ->update([
                                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                                'stage_id' => $change_stage,
                                                'stage_change_at' => Carbon::now(),
                                    ]);
                                    if ($change_stage == $this->delete_stage) {
                                        $refill_history = RefillHistory::where('order_id', $order_id)
                                                ->where('rx_id', $val['rx_id'])
                                                ->get()
                                                ->toArray();
                                        if (!empty($refill_history)) {
                                            Prescription::where(['order_id' => $refill_history[0]['refilled_from_order_id'], 'rx_id' => $val['rx_id']])
                                                    ->update(['refill_status' => 'N']);
                                        }
                                        $dispense_record = PmpDispenserLog::select('id')
                                                ->where(['rx_number' => $val['rx_id'], 'order_id' => $order_id])
                                                ->get()
                                                ->toArray();
                                        if (empty($dispense_record)) {
                                            $reporting_status = ['pmp_dispenser' => 'D', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                                        } else {
                                            $reporting_status = ['pmp_dispenser' => 'N', 'reporting_status' => '02', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                                        }
                                        Prescription::where(['order_id' => $order_id, 'rx_id' => $val['rx_id']])
                                                ->update($reporting_status);
                                    }
                                }
                            }
                        }
                        if ($change_stage == $this->delete_stage) {
                            $message = trans('messages.order_deleted');
                        } else {
                            $message = trans('messages.state_changed');
                        }
                        $alert_class = 'alert-success';
                    }
                } else {
                    $message = trans('messages.no_patient_provider_added');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.no_orderid');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/orders');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To save the manage order details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function saveManageOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $client_id = Provider::where('id', $request->provider)
                    ->get(['client'])
                    ->toArray();
            Order::where('order_id', $request->order_id)
                    ->update([
                        'patient_id' => $request->patient, 'provider_id' => $request->provider,
                        'client_id' => !empty($client_id) ? $client_id[0]['client'] : ''
            ]);
            $order_history = DB::select(DB::raw("select rx_id from `order_histories` where order_id=$request->order_id "
                                    . "and `stage` = $this->reception_stage and time IS NUll order by `id` desc"));
            foreach ($order_history as $key => $val) {
                if (!empty($val)) {
                    $dispense_record = PmpDispenserLog::select('id')
                            ->where(['rx_number' => $val->rx_id, 'order_id' => $request->order_id])
                            ->get()
                            ->toArray();
                    if (!empty($dispense_record)) {
                        Prescription::where(['order_id' => $request->order_id, 'rx_id' => $val->rx_id])
                                ->update(['reporting_status' => '01', 'pmp_dispenser' => 'N']);
                    }
                }
            }
            $provider_dtl = Helpers::getProvierDetail($request->provider);
            $patient_dtl = Helpers::getPatientDetail($request->patient);
            if (!empty($client_id)) {
                $client_dtl = Helpers::getProvierDetail($client_id[0]['client']);
            }
            AllQueueSummary::where(['order_id' => $request->order_id, 'rx_id' => $val->rx_id])
                    ->update([
                        'provider' => $provider_dtl ? $provider_dtl[0]['first_name'] . " " . $provider_dtl[0]['last_name'] : '',
                        'provider_id' => $request->provider, 
                        'doctor_address1' => $provider_dtl ? $provider_dtl[0]['reg_address1'] : '',
                        'doctor_address2' => $provider_dtl ? $provider_dtl[0]['reg_address2'] : '',
                        'doctor_city' => $provider_dtl ? $provider_dtl[0]['reg_city'] : '',
                        'doctor_state' => $provider_dtl ? $provider_dtl[0]['reg_state'] : '',
                        'doctor_zip' => $provider_dtl ? $provider_dtl[0]['reg_zip'] : '',
                        'doctor_dea' => $provider_dtl ? $provider_dtl[0]['dea'] : '',
                        'doctor_phone' => $provider_dtl ? $provider_dtl[0]['phone1'] : '',
                        'doctor_email' => $provider_dtl ? $provider_dtl[0]['email'] : '',
                        'patient' => $patient_dtl ? $patient_dtl[0]['first_name'] : '',
                        'patient_lastname' => $patient_dtl ? $patient_dtl[0]['last_name'] : '',
                        'dob' => $patient_dtl ? $patient_dtl[0]['dob'] : '',
                        'patient_id' => $patient_dtl ? $patient_dtl[0]['id'] : '',
                        'patient_address1' => $patient_dtl ? $patient_dtl[0]['address1'] : '',
                        'patient_address2' => $patient_dtl ? $patient_dtl[0]['address2'] : '',
                        'patient_city' => $patient_dtl ? $patient_dtl[0]['city'] : '',
                        'patient_state' => $patient_dtl ? $patient_dtl[0]['state'] : '',
                        'patient_zip' => $patient_dtl ? $patient_dtl[0]['zip'] : '',
                        'patient_gender' => $patient_dtl ? $patient_dtl[0]['gender'] : '',
                        'patient_phone' => $patient_dtl ? $patient_dtl[0]['phone'] : '',
                        'client' => $client_dtl ? $client_dtl[0]['first_name'] . " " . $client_dtl[0]['last_name'] : '',
            ]);
            DB::commit();
            return redirect('/order/manage/reception/' . $request->order_id);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get order stage interval time in hrs.
     *
     * @param integer $order_id
     * @return integer|$stage_time
     */
    public function stageTimeInterval($order_id)
    {
        try {
            $order_history = OrderHistory::where('order_id', '=', $order_id)
                            ->where('stage', '=', $this->reception_stage)
                            ->orderBy('id', 'DESC')
                            ->first()->toArray();
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
     * Get all user as per the role.
     *
     * @param integer $role_id
     * @return array $user_details
     */
    public function getUserByRole($role_id)
    {
        try {
            if (isset($role_id)) {
                $user_details = User::where('role', '=', $role_id)->get()->toArray();
                return $user_details;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Manage order history.
     *
     * @param array $data
     * @return void
     */
    private function manageOrderHistory($data = [])
    {

        $order_id = $data['order_id'];
        $change_stage = $data['stage'];
        $timestamp = Carbon::now();
        $change_by = auth()->user()->id;

        if (isset($data['rx'])) {
            $rx_id = $data['rx'];
            $con = "where order_id=$order_id and rx_id=$rx_id";
        } else {
            $rx_id = null;
            $con = "where order_id=$order_id";
        }
        $order_history = DB::select(DB::raw("select * from `order_histories` $con and"
                                . " `stage` = $this->reception_stage and time IS NUll order by `id` desc"));
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
                'last_stage' => $this->reception_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
}
