<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\Attachment;
use PDO;
use DB;
use Log;
use App\Prescription;
use App\Helpers\Helpers;
use Carbon\Carbon;
use App\OrderHistory;
use App\Dispatch;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;
use App\Provider;
use App\PmpDispenserLog;
use App\AllQueueSummary;
use App\OrderStageRelation;
class OrderEntryController extends Controller {

    public $entry_stage = 2;
    public $prescription_stage = 3;
    public $delete_stage = 5;

    /**
     * To render all orders with Rx at Order Entry Queue.
     *
     * @return array|$data
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['order_details'] = Order::with('patient')
                        ->with('provider')
                        ->with('prescription')
                        ->with('orderStageRealtion')
                        ->whereHas('orderStageRealtion', function (Builder $query) {
                            $query->where('stage', '=', $this->entry_stage);
                        })
                        ->get()
                        ->toArray();
                if (!empty($data['order_details'])) {
                    foreach ($data['order_details'] as $key => $value) {
                        $data['order_details'][$key]['stage_time'] = $this->stageTimeInterval($value['order_id']);
                    }
                }
                $data['patient_data'] = Helpers::getAllPatients('assoc');
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['formula_data'] = Helpers::getAllPKFormula('assoc');
                $data['stage_name'] = trans('messages.entry_stage');
                return view('orders.entry', $data);
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
     *
     * To render individual oder details on the manage grid.
     *
     * @param integer $order_id
     * @return array|$data
     */
    public function manageOrderEntry($order_id) {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($order_id)) {
                    $data['order_details'] = Order::with('patient')
                            ->with('provider')
                            ->with('noteDetails')
                            ->with('prescription')
                            ->with('prescription.daw')
                            ->with('prescription.rxOrigin')
                            ->with('prescription.schedule')
                            ->with('prescription.state')
                            ->with('prescription.unit')
                            ->where('order_id', $order_id)
                            ->get()
                            ->toArray();
                    $order_history = DB::select(DB::raw("select rx_id from `order_histories` where order_id=$order_id "
                                            . "and `stage` = $this->entry_stage and time IS NUll order by `id` desc"));
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
                                    ->with('refillAllowed')
                                    ->where('order_id', $order_id)
                                    ->whereIn('rx_id', $rx_ids)
                                    ->get()
                                    ->toArray();
                        }
                    }
                    if (!empty($data['order_details'])) {
                        $dispatch_details = Dispatch::with('state')
                                ->where('order_id', '=', $data['order_details'][0]['order_id'])
                                ->orderBy('id', 'desc')
                                ->get()
                                ->toArray();
                        if (!empty($dispatch_details)) {
                            foreach ($dispatch_details as $keys => $value) {
                                foreach ($value as $key => $val) {
                                    if (($key == 'first_name' || $key == 'last_name' || $key == 'address1' || $key == 'address2' || $key == 'city' || $key == 'zip' || $key == 'phone' || $key == 'fax' || $key == 'email') && $value['dispatch_to_type'] == 'Patient') {
                                        $data['dispatch_details'][$key] = Crypt::decrypt($val);
                                    } else {
                                        $data['dispatch_details'][$key] = $val;
                                    }
                                }
                            }
                        } else {
                            $data['dispatch_details'] = null;
                        }
                        if ($data['order_details'][0]['provider']) {
                            $data['provider_name'] = $data['order_details'][0]['provider']['first_name']
                                    . ' ' . $data['order_details'][0]['provider']['last_name'];
                        }
                        if ($data['order_details'][0]['patient']) {
                            $data['patient_name'] = Crypt::decrypt($data['order_details'][0]['patient']['first_name'])
                                    . ' ' . Crypt::decrypt($data['order_details'][0]['patient']['last_name']);
                        }
                        $provider_id = $data['order_details'][0]['provider_id'];
                        $client_id = $data['order_details'][0]['client_id'];
                        $data['order_id'] = $data['order_details'][0]['order_id'];
                        $data['total_pages'] = $data['order_details'][0]['page_count'];
                        $attachment_id = $data['order_details'][0]['attachment_id'];
                        $attachment_details = Attachment::find($attachment_id);
                        $data['file_name'] = $attachment_details['file_name'];
                        if (!empty($provider_id)) {
                            $data['providers'] = DB::table('providers')
                                    ->select('id', 'first_name', 'last_name')
                                    ->where('id', '=', $provider_id)
                                    ->get()
                                    ->toArray();
                        }
                        if(empty($client_id)){
                            $provider_status = Provider::select('id','provider_status')
                                    ->where(['id' => $provider_id])
                                    ->get()
                                    ->toArray();
                            if(!empty($provider_status)){
                                if($provider_status[0]['provider_status'] == 3){
                                    $client_id = $provider_id;
                                }
                            }
                        }
                        if (!empty($client_id)) {
                            $clients = DB::table('providers')
                                    ->select('*')
                                    ->where('id', '=', $client_id)
                                    ->groupBy('id')
                                    ->distinct()
                                    ->get()
                                    ->toArray();
                            $selected_formulas = DB::table('formulas')
                                    ->where('client_id', '=', $client_id)
                                    ->groupBy('formula_id')
                                    ->get()
                                    ->toArray();
                            if (!empty($selected_formulas)) {
                                foreach ($selected_formulas as $key => $val) {
                                    $selected_formulas_data[$val->formula_id] = !empty($val->formula_name) ? $val->formula_name . '-' . $val->speed_code . '-' . $val->formula_id : '';
                                }
                                if (!empty($clients)) {
                                    foreach ($clients as $key => $val) {
                                        $client_data[$val->id] = $val->first_name;
                                    }
                                    $data['clients'] = $client_data;
                                }
                                $data['selected_formulas'] = $selected_formulas_data;
                            }
                        }
                    }
                    $data['daw'] = Helpers::getAllDaws();
                    $data['schedule'] = Helpers::getAllSchedules();
                    $data['unit'] = Helpers::getAllUnits();
                    $data['state'] = Helpers::getAllStates();
                    $data['rx_origin'] = Helpers::getAllRxOrigins();
                    $data['method_data'] = Helpers::getAllDispatchMethods();
                    $data['states'] = Helpers::getAllStates();
                    $data['formulas'] = Helpers::getAllFormulas('assoc');
                    $data['formula_data'] = Helpers::getAllPKFormula();
                    $data['last_rx_id'] = DB::table('prescriptions')->max('rx_id');
                    $data['status'] = Helpers::getStatus([1, $this->delete_stage, 9]);
                    $data['stage_name'] = trans('messages.entry_stage');
                    return view('orders.manage.stage_entry')->with('pdf_detail', $data);
                } else {
                    $message = trans('messages.no_orderid');
                    $alert_class = 'alert-danger';
                }
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
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
     * To get LOG#
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getLogId(Request $request) {
        try {
            $conn = Helpers::pkConnection();
            $formula_id = $request->input('formula');
            $provider_id = $request->input('provider_id');
            $response = '';
            if (!empty($formula_id) && !empty($provider_id)) {
                $formula_price = $this->getFormulaPrice($formula_id, $provider_id);
                $log_data = $conn->prepare("SELECT fr.FORMULA_ID,fr.DEFAULT_DAYS_SUPPLY,fr.SCHEDULE,fr.MANUFACTURER,"
                        . "fr.EXP_DATE,fr.DAYS_TO_EXP_DATE,fr.COMPOUNDED_IN_STORE,fr.DESCRIPTIOND,fr.NDC1,"
                        . "fr.THERAPEUTIC_CLASS,CAST(fc.PRICE as NUMERIC(15,2)) AS PRICE, fc.FORMCOST_ID,lg.LOGMAIN_ID,lg.LOT_NUMBER,lg.EXPIRATION_DATE,lg.DATE_ENTERED FROM FORMULA fr "
                        . "FULL JOIN LOGMAIN lg ON fr.FORMULA_ID = lg.FORMULA_ID  "
                        . "FULL JOIN FORMCOST fc ON fc.FORMULA_ID = fr.FORMULA_ID WHERE "
                        . "fr.FORMULA_ID = :FORMULA_ID AND lg.QTY_MADE_REMAINING > 0 ORDER BY lg.LOGMAIN_ID DESC rows 5");
                $log_data->bindValue(':FORMULA_ID', $formula_id);
                $log_data->execute();
                $log_details = $log_data->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($log_details) && !empty($formula_price)) {
                    array_push($log_details, $formula_price);
                    $response = $log_details;
                } else {
                    $formula_price = $this->getFormulaPrice($formula_id, $provider_id);
                    $log_data = $conn->prepare("SELECT fr.FORMULA_ID,fr.DEFAULT_DAYS_SUPPLY,fr.SCHEDULE,fr.MANUFACTURER,"
                            . "fr.EXP_DATE,fr.DAYS_TO_EXP_DATE,fr.COMPOUNDED_IN_STORE,fr.DESCRIPTIOND,fr.NDC1,"
                            . "fr.THERAPEUTIC_CLASS,CAST(fc.PRICE as NUMERIC(15,2)) AS PRICE, fc.FORMCOST_ID FROM FORMULA fr "
                            . "FULL JOIN FORMCOST fc ON fc.FORMULA_ID = fr.FORMULA_ID WHERE "
                            . "fr.FORMULA_ID = :FORMULA_ID");
                    $log_data->bindValue(':FORMULA_ID', $formula_id);
                    $log_data->execute();
                    $log_details = $log_data->fetchAll(PDO::FETCH_ASSOC);
                    array_push($log_details, $formula_price);
                    $response = $log_details;
                }
                return json_encode($response);
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To change order state.
     *
     * @param \Illuminate\Http\Request $request
     * @return void.
     */
    public function changeOrderState(Request $request) {

        try {
            $order_id = $request['order_id'];
            if (!empty($order_id)) {
                $change_stage = $request['change_state'];
                if (!empty($request['change_state'])) {
                    $change_stage = $request['change_state'];
                } else {
                    $change_stage = $this->prescription_stage;
                }
                DB::beginTransaction();
                $prescription = Prescription::where('order_id', '=', $order_id)
                        ->get()
                        ->toArray();
                $rx_ids = OrderStageRelation::where(['order_id' => $order_id, 'stage' => $this->entry_stage])
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
                $message = trans('messages.no_orderid');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/entry');
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get order stage interval time in hrs.
     *
     * @param integer $order_id
     * @return integer $stage_time
     */
    public function stageTimeInterval($order_id) {

        try {
            $order_history = OrderHistory::where('order_id', '=', $order_id)
                            ->where('stage', '=', $this->entry_stage)
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
     * To manage order history.
     *
     * @param array $data
     * @return void
     */
    private function manageOrderHistory($data = []) {

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
                                . " `stage` = $this->entry_stage and time IS NUll order by `id` desc"));
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
                'last_stage' => $this->entry_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }

    /**
     * To get Formula Price.
     *
     * @param integer|$formula_id
     * @param integer|$provider_id
     * return array|$price_details
     */
    public function getFormulaPrice($formula_id, $provider_id) {
        try {
            $provider_price = Helpers::getManipualtionPrice($provider_id, $formula_id);
            if (!empty($provider_price)) {
                $formula_price = $provider_price[0]['price'];
            } else {
                $provider_details = Helpers::getProvierDetail($provider_id);
                if (!empty($provider_details)) {
                    $corporate_price = Helpers::getManipualtionPrice($provider_details[0]['provider_corporation'], $formula_id);
                    if (!empty($corporate_price)) {
                        $formula_price = $corporate_price[0]['price'];
                    }
                }
                if (!empty($provider_details) && empty($formula_price)) {
                    $client_price = Helpers::getManipualtionPrice($provider_details[0]['client'], $formula_id);
                    if (!empty($client_price)) {
                        $formula_price = $client_price[0]['price'];
                    }
                }
                if (empty($formula_price)) {
                    $global_price = Helpers::getPkFormulaPrice($formula_id);
                    if (!empty($global_price)) {
                        $formula_price = $global_price[0]['PRICE'];
                    } else {
                        $formula_price = 0;
                    }
                }
            }
            $price_array['formula_price'] = $formula_price;
            return $price_array;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

}
