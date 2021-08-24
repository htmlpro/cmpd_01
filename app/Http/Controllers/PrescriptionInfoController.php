<?php

namespace App\Http\Controllers;

use App\Attachment;
use PDO;
use App\Prescription;
use App\Helpers\Helpers;
use App\Formula;
use App\Dispatch;
use Session;
use Illuminate\Support\Facades\Crypt;
use DB;
use Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\OrderHistory;
use App\AllQueueSummary;
use App\RefillHistory;
use App\PmpDispenserLog;
use App\order;

class PrescriptionInfoController extends Controller {

    public $delete_stage = 5;

    /**
     * To render individual Rx details.
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function index($stage, $patient_id = '', $current_stage = '', $order_id, $rx_id = '') {
        if (!empty($order_id) && isset($stage)) {
            if ($rx_id != '') {
                $data['rx_details'] = Prescription::with('order')
                        ->with('order.noteDetails')
                        ->with('order.patient')
                        ->with('order.provider')
                        ->with('daw')
                        ->with('rxOrigin')
                        ->with('schedule')
                        ->with('state')
                        ->with('unit')
                        ->with('refillAllowed')
                        ->where('rx_id', '=', $rx_id)
                        ->where('order_id', '=', $order_id)
                        ->distinct()
                        ->withTrashed()
                        ->get()
                        ->toArray();
            } else {
                $data['rx_details'] = Order::with('patient')
                        ->with('provider')
                        ->with('noteDetails')
                        ->with('prescription')
                        ->where('order_id', $order_id)
                        ->get()
                        ->toArray();
            }
            if (!empty($data['rx_details'])) {
                if (!isset($data['rx_details'][0]['prescription'])) {
                    $data['formula_name'] = Formula::select('formula_name')
                            ->where('formula_id', $data['rx_details'][0]['formula'])
                            ->get()
                            ->toArray();
                    $dispatch_details = Dispatch::where([
                                'order_id' => $data['rx_details'][0]['order']['order_id'], 'rx_id' => $rx_id
                            ])
                            ->orderBy('id', 'desc')
                            ->get()
                            ->toArray();
                    if (!empty($dispatch_details)) {
                        foreach ($dispatch_details as $keys => $value) {
                            foreach ($value as $key => $val) {
                                if (($key == 'first_name' || $key == 'last_name' || $key == 'address1' || $key == 'address2' || $key == 'city' || $key == 'zip' || $key == 'phone' || $key == 'fax' || $key == 'email') && ($value['dispatch_to_type'] == 'Patient' || $value['dispatch_to_type']=='Other')) {
                                    $data['dispatch_details'][$key] = Crypt::decrypt($val);
                                } else {
                                    $data['dispatch_details'][$key] = $val;
                                }
                            }
                        }
                    } else {
                        $data['dispatch_details'] = null;
                    }
                    if (!empty($data['rx_details'][0]['log_id']) && !empty($data['rx_details'][0]['formula'])) {
                        $conn = Helpers::pkConnection();
                        $formula_id = $data['rx_details'][0]['formula'];
                        $get_therapeutic_class = $conn->prepare("SELECT NAME,THERAPEUTIC_CLASS,COMPOUNDED_IN_STORE FROM FORMULA WHERE FORMULA_ID = :FORMULA_ID");
                        $get_therapeutic_class->bindValue(':FORMULA_ID', $formula_id);
                        $get_therapeutic_class->execute();
                        $therapeutic_details = $get_therapeutic_class->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($therapeutic_details)) {
                            $therapeutic_class = !empty($therapeutic_details[0]['THERAPEUTIC_CLASS']) ? $therapeutic_details[0]['THERAPEUTIC_CLASS'] : '';
                            $data['formula_name'] = !empty($therapeutic_details[0]['NAME']) ? $therapeutic_details[0]['NAME'] : '';
                            if ($therapeutic_details[0]['COMPOUNDED_IN_STORE'] == 'C') {
                                $logmain = $conn->prepare("SELECT LOT_NUMBER FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                                $log_id = $data['rx_details'][0]['log_id'];
                                $logmain->bindValue(':LOG_ID', $log_id);
                                $logmain->execute();
                                $log_details = $logmain->fetchAll(PDO::FETCH_ASSOC);
                                if (!empty($log_details)) {
                                    $data['lot_number'] = $log_details[0]['LOT_NUMBER'];
                                    $data['chemicals'] = Helpers::getIngredientCount($data['rx_details'][0]['log_id']);
                                } else {
                                    Session::flash('message', trans('messages.chemical_details_not_found'));
                                    Session::flash('alert-class', 'alert-danger');
                                }
                            }
                        }
                    } else {
                        Session::flash('message', trans('messages.no_print'));
                        Session::flash('alert-class', 'alert-danger');
                    }
                }
                if (!empty($data['rx_details'][0]['order']['provider'])) {
                    $data['provider_name'] = $data['rx_details'][0]['order']['provider']['first_name']
                            . ' ' . $data['rx_details'][0]['order']['provider']['last_name'];
                } else if (!empty($data['rx_details'][0]['provider'])) {
                    $data['provider_name'] = $data['rx_details'][0]['provider']['first_name']
                            . ' ' . $data['rx_details'][0]['provider']['last_name'];
                }
                if (!empty($data['rx_details'][0]['order']['patient'])) {
                    $data['patient_name'] = Crypt::decrypt($data['rx_details'][0]['order']['patient']['first_name'])
                            . ' ' . Crypt::decrypt($data['rx_details'][0]['order']['patient']['last_name']);
                    $data['patient_dob'] = Crypt::decrypt($data['rx_details'][0]['order']['patient']['dob']);
                } else if (!empty($data['rx_details'][0]['patient'])) {
                    $data['provider_name'] = Crypt::decrypt($data['rx_details'][0]['patient']['first_name'])
                            . ' ' . Crypt::decrypt($data['rx_details'][0]['patient']['last_name']);
                }
                if (!empty($data['rx_details'][0]['order'])) {
                    $attachment_details = Attachment::find($data['rx_details'][0]['order']['attachment_id']);
                    $data['total_pages'] = $data['rx_details'][0]['order']['page_count'];
                } else {
                    $attachment_details = Attachment::find($data['rx_details'][0]['attachment_id']);
                    $data['total_pages'] = $data['rx_details'][0]['page_count'];
                }
                $data['therapeutic_class'] = !empty($therapeutic_class) ? $therapeutic_class : '';
                $data['order_id'] = $data['rx_details'][0]['order_id'];
                $data['file_name'] = $attachment_details['file_name'];
                $data['formula_data'] = Helpers::getAllPKFormula('assoc');
                $data['state_data'] = Helpers::getAllStates();
                $data['method_data'] = Helpers::getAllDispatchMethods();
                $data['stage'] = Helpers::getAllStatus();
                $data['user'] = Helpers::getUsers();
                $data['history'] = $this->rxHistory($rx_id, $order_id);
                if ($stage == '7') {
                    $stage_name = trans('messages.dispatch_stage');
                    $redirect = "/dispatch";
                    $decline_status = [6, 4, 3, 2, 1, $this->delete_stage, 9];
                    $stage = $stage;
                } else if ($stage == '8') {
                    $stage_name = trans('messages.invoice_stage');
                    $redirect = "/invoice";
                    $decline_status = [7, 6, 4, 3, 2, 1, $this->delete_stage, 9];
                    $stage = $stage;
                } else if ($stage == '9') {
                    $stage_name = trans('messages.problem_on_hold');
                    $redirect = "/onhold";
                    $decline_status = [];
                    $stage = $stage;
                } else if ($stage == '10') {
                    $stage_name = trans('messages.complete_stage');
                    $redirect = "/complete";
                    $decline_status = [8, 7, 6, 4, 3, 2, 1, $this->delete_stage, 9];
                    $stage = $stage;
                } else if ($stage == '11') {
                    $stage_name = trans('messages.all_queue_stage');
                    $redirect = "/all";
                    $decline_status = [];
                    $stage = $current_stage;
                } else if ($stage == '12') {
                    $stage_name = trans('messages.patient');
                    $redirect = "/patient/view/" . $patient_id;
                    $decline_status = [];
                    $stage = $current_stage;
                }
                if (is_array($decline_status)) {
                    if ($stage == 5 || $stage == 9) {
                        $last_stage = $this->getLastStage($order_id, $rx_id, $stage);
                        $k = $last_stage;
                    } else {
                        $k = $stage;
                    }
                    while ($k) {
                        if ($k != $stage && $k != 5 && $k != 9) {
                            $decline_status[] = $k;
                        }
                        $k = $k - 1;
                    }
                    if ($stage == 5) {
                        array_push($decline_status, 9);
                    } else if ($stage == 9) {
                        array_push($decline_status, 5);
                    } else {
                        array_push($decline_status, 5, 9);
                    }
                }

                $data['status'] = Helpers::getStatus($decline_status);
                $data['stage_name'] = $stage_name;
                $data['redirect'] = $redirect;
                $data['stage_id'] = $stage;
                return $data;
            } else {
                $message = trans('messages.rx_details_not_found');
                $alert_class = 'alert-danger';
            }
        } else {
            $message = trans('messages.no_rx');
            $alert_class = 'alert-danger';
        }
        Session::flash('message', $message);
        Session::flash('alert-class', $alert_class);
        return redirect()->back();
    }

    /**
     * To render RX history on all grids after verification.
     *
     * @param integer $stage
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function otherGrid($stage, $order_id, $rx_id = '') {
        $data = $this->index($stage, '', '', $order_id, $rx_id);
        return view('orders.manage.stage_prescription_info')->with('pdf_detail', $data);
    }

    /**
     * To render RX history on all grid.
     *
     * @param integer $stage
     * @param integer $current_stage
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function allGrid($stage, $current_stage, $order_id, $rx_id = '') {
        $data = $this->index($stage, '', $current_stage, $order_id, $rx_id);
        return view('orders.manage.stage_prescription_info')->with('pdf_detail', $data);
    }

    /**
     * To render RX history on patient grid.
     *
     * @param integer $stage
     * @param integer $current_stage
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function patientGrid($stage, $current_stage, $patient_id, $order_id, $rx_id = '') {
        $data = $this->index($stage, $patient_id, $current_stage, $order_id, $rx_id);
        return view('orders.manage.stage_prescription_info')->with('pdf_detail', $data);
    }

    /**
     * To get RX history..
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$rx_history
     */
    private function rxHistory($rx_id = '', $order_id) {
        if (!empty($rx_id)) {
            $con = "(`rx_id` = $rx_id and `order_id` = $order_id) OR (`rx_id` IS NULL and `order_id` = $order_id)";
        } else {
            $con = "(`order_id` = $order_id)";
        }
        $rx_history = DB::select(DB::raw("SELECT *  FROM `order_histories` WHERE $con"));
        if (!empty($rx_history)) {
            foreach($rx_history as $key => $value){
                if (isset($value->updated_at)) {
                    $rx_history[$key]->updated_at = Helpers::convertToCST($value->updated_at);
                }
            }
            return $rx_history;
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
            $user = auth()->user();
            $order_id = $request['order_id'];
            $rx_id = $request['rx_id'];
            $change_stage = $request['change_state'];
            $redirect = $request['redirect'];
            $stage_id = $request['stage_id'];
            if (!empty($order_id) && !empty($rx_id)) {
                DB::beginTransaction();
                if (($user->role == 1 && $stage_id == '10') || $stage_id) {
                    $data = ['order_id' => $order_id, 'stage' => $change_stage, 'rx' => $rx_id, 'stage_id' => $stage_id];
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
                        $dispense_record = PmpDispenserLog::select('id')
                                ->where(['rx_number' => $rx_id, 'order_id' => $order_id])
                                ->get()
                                ->toArray();
                        if (empty($dispense_record)) {
                            $reporting_status = ['pmp_dispenser' => 'D', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                        } else {
                            $reporting_status = ['pmp_dispenser' => 'N', 'reporting_status' => '02', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                        }
                        Prescription::where(['order_id' => $order_id, 'rx_id' => $rx_id])
                                ->update($reporting_status);
                        $message = trans('messages.delete_rx');
                    } else {
                        $message = trans('messages.state_changed');
                    }
                    $alert_class = 'alert-success';
                } else {
                    $message = trans('messages.no_permission');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.no_orderid');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            if (isset($redirect)) {
                return redirect($redirect);
            } else {
                return redirect()->back();
            }
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
        $rx_id = $data['rx'];
        $change_stage = $data['stage'];
        $stage_id = $data['stage_id'];
        $timestamp = Carbon::now();
        $change_by = auth()->user()->id;
        if (isset($rx_id)) {
            $rx_id = $data['rx'];
            $con = "where order_id=$order_id and rx_id=$rx_id";
        }
        $order_history = DB::select(DB::raw(
                                "select * from `order_histories` $con and `stage` = $stage_id and "
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
                'last_stage' => $stage_id,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
    
    /**
     * To get last stage of script.
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @param integer $stage
     * @return array!$rx_history
     */
    private function getLastStage($order_id, $rx_id = '', $stage) {
        if (!empty($rx_id)) {
            $con = "(`rx_id` = $rx_id and `order_id` = $order_id and `stage` = $stage and `time` IS NULL)";
        } else {
            $con = "(`order_id` = $order_id and `stage` = $stage and `time` IS NULL)";
        }
        $rx_history = DB::select(DB::raw("SELECT *  FROM `order_histories` WHERE $con"));
        if (!empty($rx_history)) {
            return $rx_history[0]->last_stage;
        }
    }

}
