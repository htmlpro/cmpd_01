<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;
use DB;
use PDO;
use Log;
use App\Prescription;
use App\Helpers\Helpers;
use App\Formula;
use Carbon\Carbon;
use App\OrderHistory;
use App\Dispatch;
use App\OrderStageRelation;
use Session;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;
use App\PmpDispenserLog;
use App\AllQueueSummary;

class VerificationController extends Controller
{

    public $delete_stage = 5;
    public $verification_stage = 6;
    public $dispatch_stage = 7;

    /**
     * To render an Rx detail at verification queue.
     *
     * @return array|$data
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->verification_stage)
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
                    }
                    if (!empty($data['order_pres_details'])) {
                        foreach ($data['order_pres_details'] as $keys => $value) {
                            foreach ($value as $key => $val) {
                                $data['order_pres_details'][$keys][$key]['stage_time'] = $this->stageTimeInterval($val['rx_id'], $val['order_id']);
                            }
                        }
                    }
                }
                $data['patient_data'] = Helpers::getAllPatients('assoc');
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['formula_data'] = Helpers::getAllPKFormula('assoc');
                $data['stage_name'] = trans('messages.verification_stage');
                return view('orders.verification', $data);
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
     * To render individual Rx details on the manage grid.
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function manageOrderVerification($order_id, $rx_id)
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($rx_id) && !empty($order_id)) {
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
                                    ->get()->toArray();

                    if (!empty($data['rx_details'])) {
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
                        if (!empty($data['rx_details'][0]['order']['provider'])) {
                            $data['provider_name'] = $data['rx_details'][0]['order']['provider']['first_name']
                                    . ' ' . $data['rx_details'][0]['order']['provider']['last_name'];
                        }
                        if (!empty($data['rx_details'][0]['order']['patient'])) {
                            $data['patient_name'] = Crypt::decrypt($data['rx_details'][0]['order']['patient']['first_name'])
                                    . ' ' . Crypt::decrypt($data['rx_details'][0]['order']['patient']['last_name']);
                            $data['patient_dob'] = Crypt::decrypt($data['rx_details'][0]['order']['patient']['dob']);
                        }
                        $data['therapeutic_class'] = !empty($therapeutic_class) ? $therapeutic_class : '';
                        $attachment_details = Attachment::find($data['rx_details'][0]['order']['attachment_id']);
                        $data['order_id'] = $data['rx_details'][0]['order_id'];
                        $data['file_name'] = $attachment_details['file_name'];
                        $data['formula_data'] = Helpers::getAllPKFormula('assoc');
                        $data['state_data'] = Helpers::getAllStates();
                        $data['method_data'] = Helpers::getAllDispatchMethods();
                        $data['total_pages'] = $data['rx_details'][0]['order']['page_count'];
                        $data['status'] = Helpers::getStatus([4, 3, 2, 1, $this->delete_stage, 9]);
                        $data['stage_name'] = trans('messages.verification_stage');
                        return view('orders.manage.stage_verification')->with('pdf_detail', $data);
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
            $rx_id = $request['rx_id'];
            $change_stage = $request['change_state'];
            if (isset($change_stage)) {
                $change_stage = $change_stage;
            } else {
                $change_stage = $this->dispatch_stage;
            }
            if (($change_stage > $this->verification_stage && in_array(auth()->user()->role, [1, 2])) || 
                    ($change_stage < $this->verification_stage)) {
                if (!empty($order_id) && !empty($rx_id)) {
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
                    $message = trans('messages.no_orderid');
                    $alert_class = 'alert-danger';
                }
            } else {
                $message = trans('messages.no_approve_permission');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/verification');
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get order stage interval time in hrs.
     *
     * @param intger $rx_id
     * @param integer $order_id
     * @return integer|$stage_time
     */
    public function stageTimeInterval($rx_id, $order_id)
    {

        try {
            $order_history = OrderHistory::where('order_id', '=', $order_id)
                    ->where('rx_id', '=', $rx_id)
                    ->where('stage', '=', $this->verification_stage)
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
        $order_history = DB::select(DB::raw(
            "select * from `order_histories` $con and `stage` = $this->verification_stage and "
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
                'last_stage' => $this->verification_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }
}
