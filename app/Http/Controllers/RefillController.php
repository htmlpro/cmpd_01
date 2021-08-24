<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Prescription;
use App\RefillHistory;
use App\OrderStageRelation;
use App\OrderHistory;
use DB;
use Session;
use Log;
use Carbon\Carbon;
use App\ScriptCounter;
use App\RefillAllowed;
use App\Helpers\Helpers;
use App\AllQueueSummary;

class RefillController extends Controller {

    private $entry_stage = 2;

    /**
     * To refill any prescriptions for a patient
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function refillPrescription(Request $request) {
        try {
            DB::beginTransaction();
            if (!empty($request->order_array)) {
                $order_array = array_unique($request->order_array);
                $rx_array = $request->rx_num;
                foreach ($order_array as $key => $value) {
                    $order_details = Order::where('order_id', $value)
                            ->get()
                            ->toArray();
                    if (!empty($order_details)) {
                        $orders = Order::create([
                                    'order_id' => null,
                                    'provider_id' => $order_details[0]['provider_id'],
                                    'client_id' => $order_details[0]['client_id'],
                                    'patient_id' => $order_details[0]['patient_id'],
                                    'page_count' => $order_details[0]['page_count'],
                                    'source' => $order_details[0]['source'],
                                    'attachment_id' => $order_details[0]['attachment_id'],
                                    'created_by' => auth()->user()->id,
                                    'created_at' => Carbon::now()
                        ]);
                        if (!empty($orders)) {
                            $start_counter = ScriptCounter::where('type', 'Order')
                                    ->get()
                                    ->toArray();
                            if (!empty($start_counter)) {
                                $new_order = $start_counter[0]['start_counter'] + $orders['id'];
                            } else {
                                $new_order = $orders['id'];
                            }
                            Order::where('id', $orders['id'])
                                    ->update(['order_id' => $new_order]);
                            $get_status = Helpers::getStatus([$this->entry_stage]);
                            $provider_dtl = Helpers::getProvierDetail($order_details[0]['provider_id']);
                            $patient_dtl = Helpers::getPatientDetail($order_details[0]['patient_id']);
                            $client_dtl = Helpers::getProvierDetail($order_details[0]['client_id']);
                            AllQueueSummary::create([
                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                'stage_id' => $this->entry_stage,
                                'stage_change_at' => Carbon::now(),
                                'provider_id' => $order_details[0]['provider_id'],
                                'date_received' => Carbon::now(),
                                'order_id' => $new_order,
                                'provider' => $provider_dtl ? $provider_dtl[0]['first_name'] . " " . $provider_dtl[0]['last_name'] : '',
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
                        }
                        $rx_list = "'" . implode("','", $rx_array) . "'";
                        $rx_details = DB::select(DB::raw("SELECT * FROM prescriptions WHERE order_id = $value AND rx_id IN($rx_list)"));
                        if (!empty($rx_details)) {
                            foreach ($rx_details as $key => $rxvalue) {
                                $refills = RefillAllowed::where(['rx_id' => $rxvalue->rx_id])
                                        ->get()
                                        ->toArray();
                                if (!empty($refills)) {
                                    $consume_qty = number_format(($rxvalue->quantity_dispensed / $rxvalue->quantity_prescribed), 2);
                                    if ($refills[0]['remaining_refill'] > $consume_qty) {
                                        $dispatch_qty = $rxvalue->quantity_dispensed;
                                        $total_price = $rxvalue->total_price;
                                    } else {
                                        $dispatch_qty = round($refills[0]['remaining_refill'] * $rxvalue->quantity_prescribed);
                                        $consume_qty = $refills[0]['remaining_refill'];
                                        $total_price = ($dispatch_qty * $rxvalue->price);
                                    }
                                    $tot_remaining = $refills[0]['remaining_refill'] - $consume_qty;
                                    RefillHistory::create([
                                        'order_id' => $new_order,
                                        'rx_id' => $rxvalue->rx_id,
                                        'consume_qty' => $consume_qty,
                                        'remaining_qty' => $tot_remaining,
                                        'refilled_from_order_id' => $value,
                                        'created_at' => Carbon::now()
                                    ]);
                                    RefillAllowed::where('id', $refills[0]['id'])
                                            ->update(['remaining_refill' => $tot_remaining]);
                                    $prescription = new Prescription;
                                    $prescription->order_id = $new_order;
                                    $prescription->rx_id = $rxvalue->rx_id;
                                    $prescription->rx_fill_number = $rxvalue->rx_fill_number + 1;
                                    $prescription->formula = $rxvalue->formula;
                                    $prescription->log_id = $rxvalue->log_id;
                                    $prescription->schedule = $rxvalue->schedule;
                                    $prescription->quantity_prescribed = $rxvalue->quantity_prescribed;
                                    $prescription->quantity_dispensed = $dispatch_qty;
                                    $prescription->units = $rxvalue->units;
                                    $prescription->daw = $rxvalue->daw;
                                    $prescription->rx_exp_date = $rxvalue->rx_exp_date;
                                    $prescription->used_by_date = $rxvalue->used_by_date;
                                    $prescription->rx_origin = $rxvalue->rx_origin;
                                    $prescription->rx_serial = $rxvalue->rx_serial;
                                    $prescription->refill_date = $rxvalue->refill_date;
                                    $prescription->date_written = $rxvalue->date_written;
                                    $prescription->date_entered = $rxvalue->date_entered;
                                    $prescription->supply = $rxvalue->supply;
                                    $prescription->sig = $rxvalue->sig;
                                    $prescription->price = $rxvalue->price;
                                    $prescription->total_price = $total_price;
                                    $prescription->rx_state = $rxvalue->rx_state;
                                    $prescription->refill_status = $rxvalue->refill_status;
                                    $prescription->third_party = $rxvalue->third_party;
                                    $prescription->manufacturer = $rxvalue->manufacturer;
                                    $prescription->rx_note = $rxvalue->rx_note;
                                    $prescription->reporting_status = '00';
                                    $prescription->pmp_dispenser = 'N';
                                    $prescription->created_at = Carbon::now();
                                    $prescription->created_by = auth()->user()->id;
                                    $prescription->save();
                                    OrderStageRelation::create([
                                        'order_id' => $new_order,
                                        'stage' => $this->entry_stage,
                                        'rx_id' => $rxvalue->rx_id,
                                        'created_at' => Carbon::now()
                                    ]);
                                    OrderHistory::create([
                                        'order_id' => $new_order,
                                        'stage' => $this->entry_stage,
                                        'rx_id' => $rxvalue->rx_id,
                                        'created_by' => auth()->user()->id,
                                        'created_at' => Carbon::now()
                                    ]);
                                    Prescription::where('rx_id', $rxvalue->rx_id)
                                            ->where('order_id', $rxvalue->order_id)
                                            ->update([
                                                'refill_status' => 'Y',
                                    ]);
                                    $formula_data = Helpers::getActivePKFormulaById($rxvalue->formula);
                                    Helpers::updatePrescription($prescription, $formula_data, $rxvalue->rx_id, $refills[0]['refill_allowed'], $tot_remaining);
                                    DB::commit();
                                }
                            }
                        } else {
                            $message = trans('messages.rx_not_found');
                            $alert_class = 'alert-danger';
                        }
                    } else {
                        $message = trans('messages.order_not_found');
                        $alert_class = 'alert-danger';
                    }
                }
            } else {
                $message = trans('messages.select_rx_torefill');
                $alert_class = 'alert-danger';
            }
            $message = trans('messages.refilled');
            $alert_class = 'alert-success';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

}
