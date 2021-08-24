<?php

namespace App\Http\Controllers;

use App\Helpers\CompoundLabel;
use App\Prescription;
use App\Helpers\Helpers;
use Log;
use PDO;
use Session;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;

class CompoundLabelPrint extends Controller {

    public function index($order_id, $rx_id, $formula_id) {
        try {
            if (!empty($rx_id) && !empty($formula_id)) {
                $data['rxdetails'] = Prescription::with('order')
                        ->with('formula')
                        ->with('formula.vial')
                        ->with('order.patient')
                        ->with('order.provider')
                        ->with('user')
                        ->where('rx_id', '=', $rx_id)
                        ->where('order_id', $order_id)
                        ->get()
                        ->toArray();
                if (!empty($data['rxdetails']) && !empty($formula_id)) {
                    $data['rxdetails']['refill_history'] = RefillHistory::where('order_id', $data['rxdetails'][0]['order_id'])
                            ->where('rx_id', $data['rxdetails'][0]['rx_id'])
                            ->get()
                            ->toArray();
                    $conn = Helpers::pkConnection();
                    $formula = $conn->prepare("SELECT FORMULA_ID,NAME,GENERIC_NAME,MANUFACTURER,
                            SHAPE,BRANDNAME_CROSS_REF,THERAPEUTIC_CLASS,GRID_COLOR,DESCRIPTIOND FROM FORMULA WHERE FORMULA_ID = :FORMULA_ID");
                    $formula->bindValue(':FORMULA_ID', $formula_id);
                    $formula->execute();
                    $formula_details = $formula->fetchAll(PDO::FETCH_ASSOC);
                    $rx_number = $rx_id;
                    $rx_exp_date = isset($data['rxdetails'][0]['used_by_date']) ? date('n/j/Y', strtotime($data['rxdetails'][0]['used_by_date'])) : '';
                    $rx_fill_date = isset($data['rxdetails'][0]['refill_date']) ? date('n/j/Y', strtotime($data['rxdetails'][0]['refill_date'])) : '';
                    $orig_exp_date = isset($data['rxdetails'][0]['date_written']) ? date('n/j/Y', strtotime($data['rxdetails'][0]['date_written'])) : '';
                    $store = '';
                    $rph = isset($data['rxdetails'][0]['user']) ? Helpers::firstLetter($data['rxdetails'][0]['user']['name']) : '';
                    $sig = Helpers::wrapWord($data['rxdetails'][0]['sig'], 'SIG'); 
                    $quantity_dispensed = $data['rxdetails'][0]['quantity_dispensed'];
                    $patient_address1 = isset($data['rxdetails'][0]['order']['patient']) ? (!empty($data['rxdetails'][0]['order']['patient']['address1']) ? Crypt::decrypt($data['rxdetails'][0]['order']['patient']['address1']) : '') : '';
                    $patient_state = isset($data['rxdetails'][0]['order']['patient']) ? (isset($data['rxdetails'][0]['order']['patient']['state']) ? $data['rxdetails'][0]['order']['patient'] ['state'] : '') : '';
                    $patient_city = isset($data['rxdetails'][0]['order']['patient']) ? (isset($data['rxdetails'][0]['order']['patient']['city']) ? Crypt::decrypt($data['rxdetails'][0]['order']['patient'] ['city']) : '') : '';
                    $patient_zip = isset($data['rxdetails'][0]['order']['patient']) ? (isset($data['rxdetails'][0]['order']['patient']['zip']) ? Crypt::decrypt($data['rxdetails'][0]['order']['patient'] ['zip']) : '') : '';

                    $patient_name = Crypt::decrypt($data['rxdetails'][0]['order']['patient']['last_name'])
                            . ' ' . Crypt::decrypt($data['rxdetails'][0]['order']['patient']['first_name']);
                    $doctor_name = $data['rxdetails'][0]['order']['provider']['last_name']
                            . ' ' . $data['rxdetails'][0]['order']['provider']['first_name'];
                    $dea = 'FR2077344';
                    $patient_address = Helpers::wrapWord((!empty($patient_address1) ? $patient_address1 : ''),'PATADDRESS');
                    $patient_city_state_zip = !empty($patient_city) ? $patient_city.', '.(!empty($patient_state) ? $patient_state.' '.(!empty($patient_zip) ? $patient_zip : '') : '') : '';
                    $refill_left = !empty($data['rxdetails']['refill_history']) ? (isset($data['rxdetails']['refill_history']) ? $data['rxdetails']['refill_history'][0]['remaining_qty'] : '') : '';
                    if (!empty($formula_details)) {
                        $formula_name = isset($formula_details[0]['NAME']) ? Helpers::wrapWord($formula_details[0]['NAME'], 'FORMULA') : '';
                        $formula_generic_name = isset($formula_details[0]['BRANDNAME_CROSS_REF']) ? $formula_details[0]['BRANDNAME_CROSS_REF'] : '';
                        $formula_manufacturer = isset($formula_details[0]['MANUFACTURER']) ? $formula_details[0]['MANUFACTURER'] : '';
                        $formula_shape = isset($formula_details[0]['SHAPE']) ? $formula_details[0]['SHAPE'] : '';
                        $formula_color = isset($formula_details[0]['GRID_COLOR']) ? $formula_details[0]['GRID_COLOR'] : '';
                        $formula_brand = isset($formula_details[0]['BRANDNAME_CROSS_REF']) ? $formula_details[0]['BRANDNAME_CROSS_REF'] : '';
                        $formula_description = isset($formula_details[0]['DESCRIPTIOND']) ? $formula_details[0]['DESCRIPTIOND'] : '';
                    }
                    $cmpdzpl = new CompoundLabel();
                    $cmpdzpl->setter('rx_number', $rx_id);
                    $cmpdzpl->setter('patient_name', isset($patient_name) ? $patient_name : '');
                    $cmpdzpl->setter('doctor_name', isset($doctor_name) ? $doctor_name : '');
                    $cmpdzpl->setter('dea', $dea);
                    $cmpdzpl->setter('patient_address1', $patient_address['first_string']);
                    $cmpdzpl->setter('patient_address2', $patient_address['second_string']);
                    $cmpdzpl->setter('patient_city_state_zip', $patient_city_state_zip);
                    $cmpdzpl->setter('patient_zip', $patient_zip);
                    $cmpdzpl->setter('sig1', !empty($sig['first_string']) ? $sig['first_string'] : '');
                    $cmpdzpl->setter('sig2', !empty($sig['second_string']) ? $sig['second_string'] : '');
                    $cmpdzpl->setter('sig3', !empty($sig['third_string']) ? $sig['third_string'] : '');
                    $cmpdzpl->setter('refill_left', !empty($refill_left) ? $refill_left : '0');
                    $cmpdzpl->setter('refill_date', $rx_fill_date);
                    $cmpdzpl->setter('rx_exp_date', $rx_exp_date);
                    $cmpdzpl->setter('orig_exp_date', $orig_exp_date);
                    $cmpdzpl->setter('rph', $rph);
                    $cmpdzpl->setter('quantity_dispensed', $quantity_dispensed);
                    $cmpdzpl->setter('formula_name1', !empty($formula_name['first_string']) ? $formula_name['first_string'] : '');
                    $cmpdzpl->setter('formula_name2', !empty($formula_name['second_string']) ? $formula_name['second_string'] : '' );
                    $cmpdzpl->setter('formula_name3', !empty($formula_name['third_string']) ? $formula_name['third_string'] : '' );
                    $cmpdzpl->setter('formula_generic_name', $formula_generic_name);
                    $cmpdzpl->setter('manufacturer', $formula_manufacturer);
                    $cmpdzpl->setter('shape', $formula_shape);
                    $cmpdzpl->setter('color', $formula_color);
                    $cmpdzpl->setter('brand', $formula_brand);
                    $cmpdzpl->setter('formula_description', $formula_description);
                    $cmpdzpl->generateCMPDLabel();
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

}
