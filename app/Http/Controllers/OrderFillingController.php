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
use App\Provider;
use App\Helpers\LabelPrint;
use App\Helpers\WorkSheetPrint;
use Carbon\Carbon;
use App\OrderHistory;
use App\OrderStageRelation;
use App\Dispatch;
use Session;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;
use App\Vial;
use App\PmpDispenserLog;
use App\AllQueueSummary;

class OrderFillingController extends Controller {

    public $filling_stage = 4;
    public $delete_stage = 5;
    public $verification_stage = 6;

    /**
     * To render all Rx at Filling grid.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|$data
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->filling_stage)
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
                $data['clients'] = Helpers::getProviders([3]);  
                $data['stage_name'] = trans('messages.filling_stage');
                return view('orders.filling', $data);
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
     * To render an Rx details to manage stage.
     *
     * @param interger $order_id
     * @param integer $rx_id
     * @return array|$data
     */
    public function manageOrderFilling($order_id, $rx_id) {
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
                            ->get()
                            ->toArray();
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
                                        $data['chemicals'] = Helpers::getIngredientCount($log_id);
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
                        $data['therapeutic_class'] = !empty($therapeutic_class) ? $therapeutic_class : '';
                        $attachment_details = Attachment::find($data['rx_details'][0]['order']['attachment_id']);
                        $data['order_id'] = $data['rx_details'][0]['order_id'];
                        $data['file_name'] = $attachment_details['file_name'];
                        $data['provider_name'] = $data['rx_details'][0]['order']['provider']['first_name']
                                . ' ' . $data['rx_details'][0]['order']['provider']['last_name'];
                        $data['patient_name'] = Crypt::decrypt($data['rx_details'][0]['order']['patient']['first_name'])
                                . ' ' . Crypt::decrypt($data['rx_details'][0]['order']['patient']['last_name']);
                        $data['patient_dob'] = $data['rx_details'][0]['order']['patient']['dob'];
                        $data['total_pages'] = $data['rx_details'][0]['order']['page_count'];
                        $data['formula_data'] = Helpers::getAllPKFormula('assoc');
                        $data['state'] = Helpers::getAllStates();
                        $data['method_data'] = Helpers::getAllDispatchMethods();
                        $data['status'] = Helpers::getStatus([3, 2, 1, $this->delete_stage, 9]);
                        $data['stage_name'] = trans('messages.filling_stage');
                        return view('orders.manage.stage_filling')->with('pdf_detail', $data);
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
     * To print worksheet.
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @param integer $log_id
     * @return \Illuminate\Http\Response
     */
    public function printWorksheet($order_id, $rx_id, $log_id) {
        try {
            if (!empty($rx_id) && !empty($order_id)) {
                $rxdetails = Prescription::with('order')
                        ->with('order.patient')
                        ->with('order.provider')
                        ->with('order.client')
                        ->where('order_id', '=', $order_id)
                        ->where('rx_id', '=', $rx_id)
                        ->get()
                        ->toArray();
                if (!empty($rxdetails)) {
                    $log_id = $rxdetails[0]['log_id'];
                    if (!empty($log_id)) {
                        $conn = Helpers::pkConnection();
                        $formula_data = Helpers::getAllPKFormula('assoc');
                        $chemial_units = Helpers::getChemicalUnits();
                        $formula_dtl = Helpers::getActivePKFormulaById($rxdetails[0]['formula']);
                        if (!empty($formula_dtl)) {
                            if ($formula_dtl[0]['COMPOUNDED_IN_STORE'] == 'C') {
                                $logmain = $conn->prepare("SELECT * FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                                $logmain->bindValue(':LOG_ID', $log_id);
                                $logmain->execute();
                                $log_details = $logmain->fetchAll(PDO::FETCH_ASSOC);
                                if (!empty($log_details)) {
                                    $lot_number = $log_details[0]['LOT_NUMBER'];
                                    $ingredients = Helpers::getIngredientCount($log_id);
                                    if (!empty($ingredients)) {
                                        usort($ingredients, function ($a, $b) {
                                            return $a['NAME'] <=> $b['NAME'];
                                        });
                                    }
                                }
                                $rxfill = $conn->prepare('SELECT RXFILL_ID,LOG_ID FROM RXFILL WHERE LOG_ID=:LOG_ID');
                                $rxfill->bindValue(':LOG_ID', $log_id);
                                $rxfill->execute();
                                $rxfill_details = $rxfill->fetchAll(PDO::FETCH_ASSOC);
                            }
                        }
                        $patient_name = Crypt::decrypt($rxdetails[0]['order']['patient']['first_name'])
                                . ' ' . Crypt::decrypt($rxdetails[0]['order']['patient']['last_name']);
                        $patient_dob = Crypt::decrypt($rxdetails[0]['order']['patient']['dob']);
                        $patient_phone = Crypt::decrypt($rxdetails[0]['order']['patient']['phone']);
                        $provider_name = $rxdetails[0]['order']['provider']['first_name']
                                . ' ' . $rxdetails[0]['order']['provider']['last_name'];
                        $date_filled = isset($rxdetails[0]['date_written']) ?
                                        date('Y-m-d', strTotime($rxdetails[0]['date_written'])) : 'NA';
                        $wspdf = new WorkSheetPrint();
                        $wspdf->setter('location', 'Rite Away Pharmacy(Allergy)');
                        $wspdf->setter('order_number', isset($rxdetails[0]['order_id']) ? $rxdetails[0]['order_id'] : '');
                        $wspdf->setter('rx_number', isset($rxdetails[0]['rx_id']) ? $rxdetails[0]['rx_id'] : '');
                        $wspdf->setter('fill_id', !empty($rxfill_details) ? $rxfill_details[0]['RXFILL_ID'] : 'NA');
                        $wspdf->setter('patient_name', isset($patient_name) ? $patient_name : '');
                        $wspdf->setter('dob', isset($patient_dob) ? $patient_dob : '');
                        $wspdf->setter('patient_phone', isset($patient_phone) ? $patient_phone : '');
                        $wspdf->setter('drug_information', empty($rxdetails[0]['formula']) ? '' : (!empty($formula_data) ? strtoupper($formula_data[$rxdetails[0]['formula']]) : ''));
                        $wspdf->setter('date_filled', $date_filled);
                        $wspdf->setter('refills', isset($rxdetails[0]['refills']) ? $rxdetails[0]['refills'] : '');
                        $wspdf->setter('formula_id', isset($rxdetails[0]['formula']) ?
                                        $rxdetails[0]['formula'] : '');
                        $wspdf->setter('lot_id', isset($lot_number) ? $lot_number : '');
                        $wspdf->setter('days_supply', isset($rxdetails[0]['supply']) ? $rxdetails[0]['supply'] : '');
                        $wspdf->setter('ingredients', !empty($ingredients) ? $ingredients : []);
                        $wspdf->setter('log_id', !empty($rxdetails) ? $rxdetails[0]['log_id'] : 'NA');
                        $wspdf->setter('provider_name', isset($provider_name) ? $provider_name : '');
                        $wspdf->setter('chem_unit', isset($chemial_units) ? $chemial_units : '');
                        $wspdf->generatePDF();
                    } else {
                        $message = trans('messages.no_logid');
                        $alert_class = 'alert-danger';
                    }
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
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To print the label
     *
     * @param integer $order_id
     * @param integer $rx_id
     * @param integer $log_id
     * @return \Illuminate\Http\Response
     */
    public function printLabel($order_id, $rx_id, $log_id) {
        try {

            if (!empty($rx_id) && !empty($order_id)) {
                $rxdetails = Prescription::with('order')
                        ->with('formula')
                        ->with('order.patient')
                        ->with('order.provider')
                        ->where('order_id', '=', $order_id)
                        ->where('rx_id', '=', $rx_id)
                        ->get()
                        ->toArray();
                if (!empty($rxdetails)) {
                    if (!empty($rxdetails[0]['order']['client_id'])) {
                        $client_id = $rxdetails[0]['order']['client_id'];
                    } else {
                        $client_id = $rxdetails[0]['order']['provider_id'];
                    }
                    $label_matrices = Vial::where(['client_id' => $client_id, 'formula_id' => $rxdetails[0]['formula']['formula_id']])
                            ->get()
                            ->toArray();
                    if ($rxdetails[0]['order']['provider']['provider_status'] == 3 ||
                            empty($rxdetails[0]['order']['provider']['client'])) {
                        $client['client_name'] = $rxdetails[0]['order']['provider']['first_name'] . ' ' . $rxdetails[0]['order']['provider']['last_name'];
                        $client['logo'] = $rxdetails[0]['order']['provider']['logo'];
                    } elseif ($rxdetails[0]['order']['provider']['client']) {
                        $provider_details = Provider::where('id', $rxdetails[0]['order']['provider']['client'])
                                ->get()
                                ->toArray();
                        if (!empty($provider_details)) {
                            $client['client_name'] = $provider_details[0]['first_name'] . ' ' . $provider_details[0]['last_name'];
                            $client['logo'] = $provider_details[0]['logo'];
                        }
                    }
                    if (!empty($rxdetails[0]['log_id'])) {
                        $logmain_details = Helpers::pkLogDetails($rxdetails[0]['log_id']);
                        $lot_number = isset($logmain_details[0]['LOT_NUMBER']) ? $logmain_details[0]['LOT_NUMBER'] : 'NA';
                        $patient_name = Crypt::decrypt($rxdetails[0]['order']['patient']['first_name'])
                                . ' ' . Crypt::decrypt($rxdetails[0]['order']['patient']['last_name']);
                        $doctor_name = $rxdetails[0]['order']['provider']['last_name']
                                . ' ' . substr($provider_name = $rxdetails[0]['order']['provider']['first_name'], 0, 1);
                        $usedby = date('Y-m-d', strtotime($rxdetails[0]['date_entered']
                                        . ' + ' . $rxdetails[0]['supply'] . 'day'));
                        $formula_short = $rxdetails[0]['formula']['formula_short'];
                        $lzpl = new LabelPrint();
                        $lzpl->setter('rx_number', $rxdetails[0]['rx_id'] ? $rxdetails[0]['rx_id'] : '');
                        $lzpl->setter('tk_fill_id', !empty($rxfill_details[0]['RXFILL_ID']) ?
                                        $rxfill_details[0]['RXFILL_ID'] : 'NA');
                        $lzpl->setter('patient_name', isset($patient_name) ? $patient_name : '');
                        $lzpl->setter('doctor_name', isset($doctor_name) ? $doctor_name : '');
                        $lzpl->setter('lot_id', isset($lot_number) ? $lot_number : '');
                        $lzpl->setter('patient_dob', isset($rxdetails[0]['order']['patient']['dob']) ?
                                        Crypt::decrypt($rxdetails[0]['order']['patient']['dob']) : '');
                        $lzpl->setter('used_by', isset($usedby) ? $usedby : '');
                        $lzpl->setter('formula_short', isset($formula_short) ? $formula_short : '');
                        $lzpl->setter('client_name', isset($client['client_name']) ? $client['client_name'] : $doctor_name);
                        $lzpl->setter('client_zpl', !empty($client['logo']) ? $client['logo'] : '');
                        $lzpl->setter('label_matrices', $label_matrices);
                        $lzpl->generateLabel();
                    } else {
                        $message = trans('messages.no_logid');
                        $alert_class = 'alert-danger';
                    }
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
    public function changeOrderState(Request $request) {

        try {
            $order_id = $request['order_id'];
            $rx_id = $request['rx_id'];
            if (!empty($order_id) && !empty($rx_id)) {
                $change_stage = $request['change_state'];
                if (isset($change_stage)) {
                    $change_stage = $change_stage;
                } else {
                    $change_stage = $this->verification_stage;
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
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect('/filling');
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
            $order_history = OrderHistory::where('order_id', '=', $order_id)
                    ->where('rx_id', '=', $rx_id)
                    ->where('stage', '=', $this->filling_stage)
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
                                . "and `stage` = $this->filling_stage and time IS NUll order by `id` desc"));
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
                'last_stage' => $this->filling_stage,
                'created_by' => $change_by,
                'created_at' => $timestamp
            ]);
        }
    }

}
