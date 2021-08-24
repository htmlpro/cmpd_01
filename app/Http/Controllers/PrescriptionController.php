<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDO;
use Log;
use App\Helpers\Helpers;
use App\Patient;
use App\Prescription;
use App\OrderStageRelation;
use App\OrderHistory;
use Session;
use Carbon\Carbon;
use App\Status;
use App\User;
use App\RefillHistory;
use App\RefillAllowed;
use Validator;
use App\ScriptCounter;
use Illuminate\Support\Facades\Crypt;
use App\PmpDispenserLog;
use App\AllQueueSummary;
use App\Daw;
use App\Schedule;
use App\PKFomula;
class PrescriptionController extends Controller {

    public $entry_stage = 2;
    public $delete_stage = 5;

    /**
     * Save New Rx record
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function addRx(Request $request) {
        try {
            
            DB::beginTransaction();
            if (!empty($request->input('orderid'))) {
                $log_id = $request->input('log_id') ? $request->input('log_id') : $request->input('new_log_id');
                $order_id = $request->input('orderid');
                $prescription = new Prescription;
                $prescription->order_id = $order_id;
                $prescription->rx_id = null;
                $prescription->created_by = $request->input('userid');
                $prescription->rx_fill_number = $request->input('rx_fill_number');
                $prescription->formula = $request->input('formula');
                $prescription->log_id = $log_id;
                $prescription->sig = $request->input('sig_desc');
                $prescription->quantity_prescribed = $request->input('qty_p');
                $prescription->quantity_dispensed = $request->input('qty_d');
                $prescription->refills = $request->input('refills');
                $prescription->refills_allowed = $request->input('refills_allowed');
                $prescription->units = $request->input('units');
                $prescription->price = $request->input('price');
                $prescription->total_price = $request->input('total_price');
                $prescription->supply = $request->input('supply');
                $prescription->refill_date = date('Y-m-d', strtoTime($request->input('refill_date')));
                $prescription->schedule = $request->input('schedule');
                $prescription->daw = $request->input('daw');
                $prescription->date_written = date('Y-m-d', strtoTime($request->input('date_written')));
                $prescription->date_entered = date('Y-m-d', strtoTime($request->input('date_entered')));
                $prescription->rx_state = $request->input('rx_state');
                $prescription->refill_status = 'N';
                $prescription->rx_serial = $request->input('rx_serial');
                $prescription->rx_exp_date = date('Y-m-d', strtoTime($request->input('rx_exp_date')));
                $prescription->used_by_date = date('Y-m-d', strtoTime($request->input('rx_expire_date')));
                $prescription->rx_origin = $request->input('rx_origin');
                $prescription->third_party = $request->input('third_party');
                $prescription->manufacturer = $request->input('manufacturer');
                $prescription->rx_note = $request->input('rx_note');
                $prescription->reporting_status = '00';
                $prescription->pmp_dispenser = 'N';
                $prescription->save();
            }
            $prescription_arr = json_decode($prescription, true);
            if (!empty($prescription_arr)) {
                $start_counter = ScriptCounter::where('type', 'RX')
                        ->get()
                        ->toArray();
                if (!empty($start_counter)) {
                    $rx_id = $start_counter[0]['start_counter'] + $prescription_arr['id'];
                } else {
                    $rx_id = $prescription_arr['id'];
                }
                Prescription::where('id', $prescription_arr['id'])
                        ->update(['rx_id' => $rx_id]);
                $order_stage_rel = DB::select(DB::raw("select * from `order_stage_relations` where "
                                        . "order_id=$order_id and stage = $this->entry_stage order by `id` desc"));
                $order_history = DB::select(DB::raw("select * from `order_histories` where "
                                        . "order_id=$order_id and stage = $this->entry_stage order by `id` desc"));
                if ($request->input('qty_p') != $request->input('qty_d')) {
                    $consume_qty = number_format(($request->input('qty_d') / $request->input('qty_p')), 2);
                    $remaining_qty = (1 - $consume_qty);
                    $remaining_refill = $remaining_qty + $request->input('refill_allowed_count');
                } else {
                    $remaining_refill = $request->input('refill_allowed_count');
                    $consume_qty = number_format(($request->input('qty_d') / $request->input('qty_p')), 2);
                }
                $formula_data = Helpers::getActivePKFormulaById($request->input('formula'));
                if (isset($order_stage_rel[0]->rx_id)) {
                    OrderStageRelation:: insert([
                        'order_id' => $order_id,
                        'rx_id' => $rx_id,
                        'stage' => $this->entry_stage,
                        'created_at' => Carbon::now()
                    ]);
                    Helpers::savePrescription($prescription, $this->entry_stage, $formula_data, $rx_id, $request->input('refill_allowed_count'), $consume_qty);
                } else {
                    OrderStageRelation::where('order_id', $order_id)
                            ->update([
                                'rx_id' => $rx_id,
                                'changed_by' => auth()->user()->id
                    ]);
                    Helpers::updatePrescription($prescription, $formula_data, $rx_id, $request->input('refill_allowed_count'), $consume_qty);
                }
                if (isset($order_history[0]->rx_id)) {
                    OrderHistory::create([
                        'order_id' => $order_id,
                        'rx_id' => $rx_id,
                        'stage' => $this->entry_stage,
                        'created_by' => auth()->user()->id,
                        'created_at' => Carbon::now()
                    ]);
                } else {
                    OrderHistory::where('id', $order_history[0]->id)
                            ->update([
                                'rx_id' => $rx_id,
                                'updated_by' => auth()->user()->id
                    ]);
                }
                RefillAllowed::create([
                    'rx_id' => $rx_id,
                    'refill_allowed' => $request->input('refill_allowed_count'),
                    'remaining_refill' => $remaining_refill,
                    'created_at' => Carbon::now()
                ]);
                RefillHistory::create([
                    'order_id' => $order_id,
                    'rx_id' => $rx_id,
                    'consume_qty' => $consume_qty,
                    'remaining_qty' => $remaining_refill,
                    'created_at' => Carbon::now()
                ]);
                $formula_name = $formula_data ?  $formula_data[0]['NAME'] . '-' . $formula_data[0]['SPEEDCODE'] . '-' . $formula_data[0]['FORMULA_ID'] : '';
                PKFomula::updateOrCreate(['formula_id'=>$request->input('formula')],[
                    'formula_id'=>$request->input('formula'),'formula_name'=>$formula_name]);
                DB::commit();
            }
            $message = trans('messages.add_rx');
            $alert_class = 'alert-success';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect('order/manage/entry/' . $request->input('orderid'));
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }

    /**
     * Delete Rx record
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function deleteRx(Request $request) {
        try {
            if ($request->input('rx_id')) {
                $rx_id = $request->input('rx_id');
                $order_id = $request->input('order_id');
                $last_stage = $request->input('stage');
                $timestamp = Carbon::now();
                $change_by = auth()->user()->id;
                $con = "where order_id=$order_id and rx_id=$rx_id";
                DB::beginTransaction();
                $dispense_record = PmpDispenserLog::select('id')
                        ->where(['rx_number' => $request->input('rx_id'), 'order_id' => $request->input('order_id')])
                        ->get()
                        ->toArray();
                if (empty($dispense_record)) {
                    $reporting_status = ['pmp_dispenser' => 'D', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                } else {
                    $reporting_status = ['pmp_dispenser' => 'N', 'reporting_status' => '02', 'deleted_at' => Carbon::now(), 'deleted_by' => auth()->user()->id];
                }
                Prescription::where('rx_id', $rx_id)
                        ->where('order_id', $order_id)
                        ->update($reporting_status);
                $order_history = DB::select(DB::raw("select * from `order_histories` $con and "
                                        . "`stage` = $this->entry_stage and time IS NUll order by `id` desc"));
                if (!empty($order_history)) {
                    DB::update(DB::raw("update `order_stage_relations` set `stage` = '" .
                                    $this->delete_stage . "',changed_by=$change_by,updated_at='" .
                                    $timestamp . "' $con"));
                    $time_diff = (Carbon::now()->timestamp - strtotime($order_history[0]->created_at));
                    $time_in_hr = round($time_diff / 3600);
                    OrderHistory::where('id', $order_history[0]->id)
                            ->update(['time' => $time_in_hr, 'updated_by' => $change_by]);
                    OrderHistory::create([
                        'order_id' => $order_id,
                        'rx_id' => $rx_id,
                        'stage' => $this->delete_stage,
                        'last_stage' => $last_stage,
                        'created_by' => $change_by,
                        'created_at' => $timestamp
                    ]);
                    $get_status = Helpers::getStatus([$this->delete_stage]);
                    AllQueueSummary::where(['order_id' => $order_id, 'rx_id' => $rx_id])
                            ->update([
                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                'stage_id' => $this->delete_stage,
                                'stage_change_at' => Carbon::now(),
                    ]);
                }

                DB::commit();
                $message = trans('messages.delete_rx');
                $alert_class = 'alert-success';
            } else {
                $message = trans('messages.delete_rx_failed');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect('order/manage/entry/' . $order_id);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }

    /**
     * To edit an Rx
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function editRx(Request $request) {
        try {
            $rules = [
                'formula' => 'required',
                'qty_p' => 'required',
                'qty_d' => 'required',
                'units' => 'required',
                'price' => 'required',
                'supply' => 'required',
                'refill_date' => 'required',
                'schedule' => 'required',
                'daw' => 'required',
                'sig_desc' => 'required',
                'date_written' => 'required',
                'date_entered' => 'required',
                'rx_state' => 'required',
                'rx_exp_date' => 'required',
                'rx_origin' => 'required',
                'third_party' => 'required',
            ];
            $messages = [
                'qty_p.required' => 'Quantity Prescribed is required',
                'qty_d.required' => 'Quantity Dispensed is required',
                'sig_desc.required' => 'SIG is required',
                'date_written.required' => 'Date written is required',
                'date_entered.required' => 'Date entered is required',
                'rx_state.required' => 'Rx State is required',
                'rx_exp_date.required' => 'Rx Exp. date isrequired',
                'rx_origin.required' => 'Rx Origin is required',
                'third_party.required' => 'Third Party is required',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $message = 'There was an error! Please check the form and enter correct value.';
                $alert_class = 'alert-danger';
            } else {
                $order_id = $request->input('order_id');
                $rx_id = $request->input('rx_id');
                $prescript_data = Prescription::where('order_id', $order_id)
                        ->where('rx_id', $rx_id)
                        ->get()
                        ->toArray();
                if (!empty($prescript_data)) {
                    DB::beginTransaction();
                    $refills = RefillAllowed::where(['rx_id' => $request->input('rx_id')])
                            ->get()
                            ->toArray();
                    $refillhistorycount = RefillHistory::where(['rx_id' => $rx_id])
                            ->get()
                            ->toArray();
                    if (!empty($refills) && count($refillhistorycount) > 1) {
                        if ($prescript_data[0]['quantity_dispensed'] == $request->input('qty_d') && $prescript_data[0]['quantity_prescribed'] == $request->input('qty_p')) {
                            $dispatch_qty = $request->input('qty_d');
                            $tot_price = ($prescript_data[0]['quantity_dispensed'] * $prescript_data[0]['price']);
                        } else {
                            if ($prescript_data[0]['quantity_prescribed'] == $request->input('qty_p')) {
                                if ($prescript_data[0]['quantity_dispensed'] < $request->input('qty_d')) {
                                    $remaining_qty = - number_format((($request->input('qty_d') - $prescript_data[0]['quantity_dispensed']) / $request->input('qty_p')), 2);
                                } else if ($prescript_data[0]['quantity_dispensed'] > $request->input('qty_d')) {
                                    $remaining_qty = number_format((($prescript_data[0]['quantity_dispensed'] - $request->input('qty_d')) / $request->input('qty_p')), 2);
                                }
                            } else {
                                if($request->input('qty_d') == $request->input('qty_p')){
                                    $remaining_qty = 0;
                                } else {
                                    $remaining_qty = number_format(($request->input('qty_d') / $request->input('qty_p')), 2);
                                }
                            }
                            $tot_remaining = number_format(($refills[0]['remaining_refill'] + $remaining_qty), 2);
                            if ($tot_remaining >= 0) {
                                $dispatch_qty = $request->input('qty_d');
                                $tot_price = $request->input('total_price');
                                RefillAllowed::where('id', $refills[0]['id'])
                                        ->update(['remaining_refill' => $tot_remaining]);
                                $refill_history = RefillHistory::select('id', 'order_id', 'rx_id', 'consume_qty')
                                       ->where(['order_id' => $order_id, 'rx_id' => $rx_id])
                                       ->get()
                                       ->toArray();
                                if (!empty($refill_history)) {
                                    $consume_qty = number_format(($refill_history[0]['consume_qty'] - $remaining_qty), 2);
                                    RefillHistory::where(['id' => $refill_history[0]['id']])
                                            ->update(['consume_qty' => $consume_qty, 'remaining_qty' => $tot_remaining]);
                                }
                            } else {
                                $dispatch_qty = $prescript_data[0]['quantity_dispensed'];
                                $tot_price = $request->input('total_price');
                            }
                        }
                    } else {
                        if ($request->input('qty_p') != $request->input('qty_d')) {
                            $consume_qty = number_format(($request->input('qty_d') / $request->input('qty_p')), 2);
                            $remaining_qty = (1 - $consume_qty);
                            $remaining_refill = $remaining_qty + $refills[0]['refill_allowed'];
                        } else {
                            $remaining_refill = $refills[0]['refill_allowed'];
                            $consume_qty = number_format(($request->input('qty_d') / $request->input('qty_p')), 2);
                        }
                        RefillAllowed::where(['rx_id' => $rx_id])->update([
                            'refill_allowed' => $refills[0]['refill_allowed'],
                            'remaining_refill' => $remaining_refill,
                            'created_at' => Carbon::now()
                        ]);
                        RefillHistory::where(['order_id' => $order_id, 'rx_id' => $rx_id])->update([
                            'consume_qty' => $consume_qty,
                            'remaining_qty' => $remaining_refill,
                            'created_at' => Carbon::now()
                        ]);
                        $dispatch_qty = $request->input('qty_d');
                        $tot_price = $request->total_price;
                    }
                    $log_id = $request->input('log_id') ? $request->input('log_id') : $request->input('new_log_id');
                    $dispense_record = PmpDispenserLog::select('id')
                            ->where(['rx_number' => $request->input('rx_id'), 'order_id' => $request->input('order_id')])
                            ->get()
                            ->toArray();
                    if(empty($dispense_record)){
                        $reporting_status = '00';
                    } else {
                        $reporting_status = '01';
                    }
                    $updateDetails = [
                        'formula' => $request->input('formula'),
                        'log_id' => $log_id,
                        'quantity_prescribed' => $request->input('qty_p'),
                        'quantity_dispensed' => $dispatch_qty,
                        'units' => $request->input('units'),
                        'price' => $request->input('price'),
                        'total_price' => $tot_price,
                        'supply' => $request->input('supply'),
                        'refill_date' => date('Y-m-d', strtoTime($request->input('refill_date'))),
                        'schedule' => $request->input('schedule'),
                        'daw' => $request->input('daw'),
                        'sig' => $request->input('sig_desc'),
                        'date_written' => date('Y-m-d', strtoTime($request->input('date_written'))),
                        'date_entered' => date('Y-m-d', strtoTime($request->input('date_entered'))),
                        'rx_state' => $request->input('rx_state'),
                        'rx_serial' => $request->input('rx_serial'),
                        'rx_exp_date' => date('Y-m-d', strtoTime($request->input('rx_exp_date'))),
                        'used_by_date' => date('Y-m-d', strtoTime($request->input('rx_expire_date'))),
                        'rx_origin' => $request->input('rx_origin'),
                        'third_party' => $request->input('third_party'),
                        'manufacturer' => $request->input('manufacturer'),
                        'rx_note' => $request->input('rx_note'),
                        'reporting_status' => $reporting_status,
                        'pmp_dispenser' => 'N',
                        'updated_by' => auth()->user()->id,
                        'updated_at' => Carbon::now()
                    ];
                    $updated = DB::table('prescriptions')
                            ->where('rx_id', $request->input('rx_id'))
                            ->where('order_id', $request->input('order_id'))
                            ->update($updateDetails);
                    $formula_details = Helpers::getActivePKFormulaById($request->input('formula'));
                    $ingr = !empty($formula_details) ? (($formula_details[0]['COMPOUNDED_IN_STORE'] == 'C') ? Helpers::getIngredientCount($log_id) : '') : '';
                    $daw = Daw::where(['code' => $request->input('daw')])->get(['description'])->toArray();
                    $schedule = Schedule::where(['id' => $request->input('schedule')])->get(['code'])->toArray();
                    AllQueueSummary::where(['rx_id' => $request->input('rx_id'), 'order_id' => $request->input('order_id')])
                            ->update([
                                'medication' => isset($formula_data) ? $formula_data : '',
                                'supply' => $request->input('supply'),
                                'fill_date' => date('Y-m-d', strtoTime($request->input('refill_date'))),
                                'day_written' => date('Y-m-d', strtoTime($request->input('date_written'))),
                                'daw' => $daw ? $daw[0]['description'] : '',
                                'qty' => $dispatch_qty,
                                'medication' => $formula_details ? $formula_details[0]['NAME'] . '-' . $formula_details[0]['SPEEDCODE'] . '-' . $formula_details[0]['FORMULA_ID'] : '',
                                'schedule' => $schedule ? $schedule[0]['code'] : '',
                                'insurance' => $request->input('third_party'),
                                'sig' => $request->input('sig_desc'),
                                'formula_id' => $request->input('formula'),
                                'therapeutic_class' => $formula_details ? $formula_details[0]['THERAPEUTIC_CLASS'] : '',
                                'drugspeed_code' => $formula_details ? $formula_details[0]['SPEEDCODE'] : '',
                                'drug_strength' => $formula_details ? $formula_details[0]['STRENGTH'] : '',
                                'drug_from' => $formula_details ? $formula_details[0]['FORM'] : '',
                                'ingredient_count' => !empty($ingr) ? count($ingr) : '',
                                'log' => $log_id,
                                'total_price' => $tot_price,
                                'refills_rem' => isset($tot_remaining) ? $tot_remaining : ''
                    ]);
                    $formula_name = $formula_details ?  $formula_details[0]['NAME'] . '-' . $formula_details[0]['SPEEDCODE'] . '-' . $formula_details[0]['FORMULA_ID'] : '';
                    PKFomula::updateOrCreate(['formula_id'=>$request->input('formula')],[
                        'formula_id'=>$request->input('formula'),'formula_name'=>$formula_name]);
                    $message = trans('messages.updated_rx');
                    $alert_class = 'alert-success';
                    DB::commit();
                }
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect('order/manage/entry/' . $request->input('order_id'))->withErrors($validator)
                            ->withInput();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            \abort(500);
        }
    }

    /**
     * Get Scanned LOG# details
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function getScanLogDetails(Request $request) {
        $log_id = $request->input('log_id');
        $formula_id = $request->input('formula_id');
        try {
            if ($log_id != '' && is_numeric($log_id) && isset($formula_id)) {
                $conn = Helpers::pkConnection();
                $formula_dtl = Helpers::getActivePKFormulaById($formula_id);
                if (!empty($formula_dtl)) {
                    if ($formula_dtl[0]['COMPOUNDED_IN_STORE'] == 'C') {
                        $logmain = $conn->prepare("SELECT * FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                        $logmain->bindValue(':LOG_ID', $log_id);
                        $logmain->execute();
                        $log_details = $logmain->fetchAll(PDO::FETCH_ASSOC);
                        $data['lot_number'] = isset($log_details[0]['LOT_NUMBER']) ? $log_details[0]['LOT_NUMBER'] : '';
                        $data['ingredients'] = Helpers::getIngredientCount($log_id);
                        $rxfill = $conn->prepare('SELECT RXFILL_ID,LOG_ID FROM RXFILL WHERE LOG_ID=:LOG_ID');
                        $rxfill->bindValue(':LOG_ID', $log_id);
                        $rxfill->execute();
                        $data['rxfill_details'] = $rxfill->fetchAll(PDO::FETCH_ASSOC);
                        $message = trans('messages.scan_log_details_success');
                        $alert_class = 'alert-success';
                    } else {
                        $message = trans('messages.no_ingredients');
                        $alert_class = 'alert-danger';
                        $data['error'] = 'Error';
                    }
                }
            } else {
                $message = trans('messages.no_logid');
                $alert_class = 'alert-danger';
                $data['error'] = 'Error';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return($data);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Get Scanned Rx# details
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function getScanRxDetails(Request $request) {
        try {
            $rx_id = $request->input('rx_id');
            $rx_details = Prescription::with('order')
                            ->with('order.provider')
                            ->with('order.patient')
                            ->with('formula')
                            ->with('order.dispatchDetails')
                            ->where('rx_id', '=', $rx_id)
                            ->get()->toArray();
            //dd($rx_details);
            if (!empty($rx_details)) {
                $first_name = Crypt::decrypt($rx_details[0]['order']['patient']['first_name']);
                $last_name = Crypt::decrypt($rx_details[0]['order']['patient']['last_name']);
                $patient_name = $first_name . ' ' . $last_name;
                $dob = Crypt::decrypt($rx_details[0]['order']['patient']['dob']);
            }
            $rx_details[1] = $patient_name;
            $rx_details[2] = $dob;
            return($rx_details);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            \abort(500);
        }
    }

    /**
     *
     * Get Patient details based on schedule
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkPatientSchedule(Request $request) {
        $patient_id = $request->input('patient_id');
        $patient_details = Patient::where('id', $patient_id)
                ->get()
                ->toArray();
        if (!empty($patient_details)) {
            if ($patient_details[0]['address1'] == '' || $patient_details[0]['phone'] == '') {
                $status = 'Incorrect';
            } else {
                $status = 'Correct';
            }
        } else {
            $status = 'Not found';
        }
        return json_encode(['status' => $status]);
    }

    /**
     * To get Rx history details
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function rxHistory(Request $request) {
        $order_id = $request->input('order_id');
        $rx_id = $request->input('rx_id');
        if (!empty($rx_id)) {
            $con = "(`rx_id` = $rx_id and `order_id` = $order_id) OR (`rx_id` IS NULL and `order_id` = $order_id)";
        } else {
            $con = "(`order_id` = $order_id)";
        }
        try {
            $rx_history = DB::select(DB::raw("SELECT *  FROM `order_histories` WHERE $con"));
            $stage = Status::all()
                    ->toArray();
            if (!empty($stage)) {
                foreach ($stage as $key => $val) {
                    $stage_data[$val['id']] = $val['name'];
                }
            }
            $user = User::all()
                    ->toArray();
            if (!empty($user)) {
                foreach ($user as $key => $val) {
                    $user_data[$val['id']] = $val['name'];
                }
            }
            if (!empty($rx_history)) {
                $output = '';
                $output .= '<div class="row">
                        <div class="col">
                            <b>Created On</b> 
                        </div>
                        <div class="col">
                            <b>Created By</b>
                        </div>
                        <div class="col">
                            <b>Rx#</b> 
                        </div>
                        <div class="col">
                            <b>Stage</b>
                        </div>
                        <div class="col">
                            <b>Last Stage</b>
                        </div>
                        <div class="col">
                            <b>Changed On</b>
                        </div>
                        <div class="col">
                            <b>Changed By</b>
                        </div>
                        <div class="col">
                            <b>Note</b>
                        </div>
                    </div><hr/>';
                foreach ($rx_history as $key => $rxh) {
                    if ($rxh->created_by != '') {
                        $created_by = $user_data[$rxh->created_by];
                    } else {
                        $created_by = 'FAX';
                    }
                    if ($rxh->last_stage != '') {
                        $last_stage = $stage_data[$rxh->last_stage];
                    } else {
                        $last_stage = '';
                    }
                    if ($rxh->stage != '') {
                        $stage = $stage_data[$rxh->stage];
                    } else {
                        $stage = '';
                    }
                    if ($rxh->updated_by != '') {
                        $updated_by = $user_data[$rxh->updated_by];
                    } else {
                        $updated_by = '';
                    }

                    $output .= "<div class='row'>"
                            . "<div class='col'>" . date('n/j/Y', strTotime($rxh->created_at)) . ""
                            . "</div><div class='col'>" .
                            $created_by . ""
                            . "</div><div class='col'>" .
                            $rxh->rx_id
                            . "</div><div class='col'>" .
                            $stage .
                            "</div><div class='col'>" .
                            $last_stage .
                            "</div><div class='col'>" . date('n/j/Y', strTotime($rxh->updated_at)) .
                            "</div><div class='col'>" .
                            $updated_by .
                            "</div><div class='col'>
                                NA</div></div><hr/>";
                }
                return $output;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

}
