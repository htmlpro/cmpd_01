<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Crypt;
use App\Provider;
use App\AllQueueSummary;

class ReportController extends Controller {

    /**
     *
     * To render report UI.
     *
     * @return void
     */
    public function index() {
        return view('reports.prescription');
    }

    /**
     * To export prescription details into CSV format
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function presCSVReports(Request $request) {
        try {

            $file_name = "Prescription Report_from" . "_to" . ".xls";
            header("Content-Description: Prescription Report");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/vnd.ms-excel;");

            echo "Order ID" . "\t";
            echo "Order Received" . "\t";
            echo "Rx number" . "\t";
            echo "Fill#" . "\t";
            echo "Date supply" . "\t";
            echo "Fill date" . "\t";
            echo "Day written" . "\t";
            echo "DAW" . "\t";
            echo "Qty units" . "\t";
            echo "Drug#" . "\t";
            echo "Schedule" . "\t";
            echo "Patient Last Name" . "\t";
            echo "Patient Frist Name" . "\t";
            echo "Patient address 1" . "\t";
            echo "Patient address 2" . "\t";
            echo "Patient city" . "\t";
            echo "Patient state" . "\t";
            echo "Patient zip" . "\t";
            echo "Birth date" . "\t";
            echo "Age" . "\t";
            echo "Gender" . "\t";
            echo "Patient phone" . "\t";
            echo "Insurance" . "\t";
            echo "Doctor Last Name" . "\t";
            echo "Doctor First Name" . "\t";
            echo "Doctor address 1" . "\t";
            echo "Doctor address 2" . "\t";
            echo "Doctor city" . "\t";
            echo "Doctor state" . "\t";
            echo "Doctor zip" . "\t";
            echo "Doctor DEA" . "\t";
            echo "Doctor phone" . "\t";
            echo "Doctor Email" . "\t";
            echo "SIG" . "\t";
            echo "PatientID" . "\t";
            echo "Client" . "\t";
            echo "FormulaID" . "\t";
            echo "Therapeutic class" . "\t";
            echo "DrugSpeedCode" . "\t";
            echo "DrugStrength" . "\t";
            echo "DrugForm" . "\t";
            echo "Ship Date" . "\t";
            echo "Ship method" . "\t";
            echo "Total Price" . "\t";
            echo "Shipping Price" . "\t";
            echo "Refills" . "\t";
            echo "Refills Rem." . "\t";
            echo "Log#" . "\t";
            echo "Tech (initials)" . "\t";
            echo "Location Name" . "\t";
            echo "Order Stage" . "\t";
            echo "Rx Stage" . "\t";
            echo "Rx Status Date" . "\t";
            echo "Delivery Service" . "\t";
            echo "Delivery Date" . "\t";
            echo "Tracking Number" . "\t";
            echo "Formula Ingredient Count" . "\t";
            echo "\n";

            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $report_details = AllQueueSummary::all()->toArray();
            } else {
                $provider_arr = $this->getUserRole();
                $report_details = AllQueueSummary::whereIn('provider_id', $provider_arr)->get()->toArray();
            }

            if (!empty($report_details)) {
                foreach ($report_details as $key => $value) {
                    $provider_name = explode(' ', $value['provider']);
                    echo $value['order_id'] ? $value['order_id'] . "\t" : '' . "\t";
                    echo $value['date_received'] ? date('d-m-Y', strtotime($value['date_received'])) . "\t" : '' . "\t";
                    echo $value['rx_id'] ? $value['rx_id'] . "\t" : '' . "\t";
                    echo $value['fill_number'] ? $value['fill_number'] . "\t" : '' . "\t";
                    echo $value['supply'] ? $value['supply'] . "\t" : '' . "\t";
                    echo $value['fill_date'] ? date('d-m-Y',strtotime(date($value['fill_date']))) . "\t" : '' . "\t";
                    echo $value['day_written'] ? date('d-m-Y',strtotime($value['day_written'])) . "\t" : '' . "\t";
                    echo $value['daw'] ? $value['daw'] . "\t" : '' . "\t";
                    echo $value['qty'] ? $value['qty'] . "\t" : '' . "\t";
                    echo $value['medication'] ? preg_replace('/\s+/', ' ',$value['medication']) . "\t" : '' . "\t";
                    echo $value['schedule'] ? $value['schedule'] . "\t" : '' . "\t";
                    echo $value['patient'] ? Crypt::decrypt($value['patient_lastname']) . "\t" : '' . "\t";
                    echo $value['patient'] ? Crypt::decrypt($value['patient']) . "\t" : '' . "\t";
                    echo $value['patient_address1'] ? Crypt::decrypt($value['patient_address1']) . "\t" : '' . "\t";
                    echo $value['patient_address2'] ? Crypt::decrypt($value['patient_address2']) . "\t" : '' . "\t";
                    echo $value['patient_city'] ? Crypt::decrypt($value['patient_city']) . "\t" : '' . "\t";
                    echo $value['patient_state'] ? $value['patient_state'] . "\t" : '' . "\t";
                    echo $value['patient_zip'] ? Crypt::decrypt($value['patient_zip']) . "\t" : '' . "\t";
                    echo $value['dob'] ? date('d-m-Y', strtotime(Crypt::decrypt($value['dob']))) . "\t" : '' . "\t";
                    echo $value['dob'] ? $diff = (date('Y') - date('Y', strtotime(Crypt::decrypt($value['dob'])))) . "\t" : '' . "\t";
                    echo $value['patient_gender'] ? Crypt::decrypt($value['patient_gender']) . "\t" : '' . "\t";
                    echo $value['patient_phone'] ? Crypt::decrypt($value['patient_phone']) . "\t" : '' . "\t";
                    echo $value['insurance'] ? $value['insurance'] . "\t" : '' . "\t";
                    echo isset($provider_name[1]) ? $provider_name[1] . "\t" : '' . "\t";
                    echo isset($provider_name[0]) ? $provider_name[0] . "\t" : '' . "\t";
                    echo $value['doctor_address1'] ? $value['doctor_address1'] . "\t" : '' . "\t";
                    echo $value['doctor_address2'] ? $value['doctor_address2'] . "\t" : '' . "\t";
                    echo $value['doctor_city'] ? $value['doctor_city'] . "\t" : '' . "\t";
                    echo $value['doctor_state'] ? $value['doctor_state'] . "\t" : '' . "\t";
                    echo $value['doctor_zip'] ? $value['doctor_zip'] . "\t" : '' . "\t";
                    echo $value['doctor_dea'] ? $value['doctor_dea'] . "\t" : '' . "\t";
                    echo $value['doctor_phone'] ? $value['doctor_phone'] . "\t" : '' . "\t";
                    echo $value['doctor_email'] ? $value['doctor_email'] . "\t" : '' . "\t";
                    echo $value['sig'] ? preg_replace('/\s+/', ' ',$value['sig']) . "\t" : '' . "\t";
                    echo $value['patient_id'] ? $value['patient_id'] . "\t" : '' . "\t";
                    echo $value['client'] ? strtoupper($value['client']) . "\t" : '' . "\t";
                    echo $value['formula_id'] ? $value['formula_id'] . "\t" : '' . "\t";
                    echo $value['therapeutic_class'] ? $value['therapeutic_class'] . "\t" : '' . "\t";
                    echo $value['drugspeed_code'] ? $value['drugspeed_code'] . "\t" : '' . "\t";
                    echo $value['drug_strength'] ? $value['drug_strength'] . "\t" : '' . "\t";
                    echo $value['drug_from'] ? $value['drug_from'] . "\t" : '' . "\t";
                    echo "" . "\t";
                    echo $value['dispatch_method'] ? $value['dispatch_method'] . "\t" : '' . "\t";
                    echo $value['total_price'] ? $value['total_price'] . "\t" : '' . "\t";
                    echo $value['shiping_price'] ? $value['shiping_price'] . "\t" : '' . "\t";
                    echo $value['refills'] ? $value['refills'] . "\t" : '' . "\t";
                    echo $value['refills_rem'] ? $value['refills_rem'] . "\t" : '' . "\t";
                    echo $value['log'] ? $value['log'] . "\t" : '' . "\t";
                    echo $value['tech'] ? $value['tech'] . "\t" : '' . "\t";
                    echo 'Riteawayallergy' . "\t";
                    echo $value['stage'] ? $value['stage'] . "\t" : '' . "\t";
                    echo $value['stage'] ? $value['stage'] . "\t" : '' . "\t";
                    echo $value['stage_change_at'] ? date('d-m-Y', strtotime($value['stage_change_at'])). "\t" : '' . "\t";
                    echo $value['delivery_service'] ? $value['delivery_service'] . "\t" : '' . "\t";
                    echo "" . "\t";
                    echo $value['tracking_num'] ? $value['tracking_num'] . "\t" : '' . "\t";
                    echo $value['ingredient_count'] ? $value['ingredient_count'] . "\t" : '' . "\t";
                    echo "\n";
                }
            }
            exit;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get logged in user role.
     *
     * @return array|$provider_arr
     */
    private function getUserRole() {
        $user_role = auth()->user()->role;
        if ($user_role == 4) {
            $provider_arr[] = auth()->user()->provider_id;
        } else if ($user_role == 5) {
            $provider_id = auth()->user()->provider_id;
            $corporate_providers = Provider::select('id')->where(['provider_corporation' => $provider_id])
                    ->get()
                    ->toArray();
            if (!empty($corporate_providers)) {
                foreach ($corporate_providers as $key => $value) {
                    $provider_arr[] = $value['id'];
                }
                array_push($provider_arr, $provider_id);
            } else {
                $provider_arr[] = $provider_id;
            }
        } else if ($user_role == 6) {
            $provider_id = auth()->user()->provider_id;
            $client_providers = Provider::select('id')->where(['client' => $provider_id])
                    ->get()
                    ->toArray();
            if (!empty($client_providers)) {
                foreach ($client_providers as $key => $value) {
                    $provider_arr[] = $value['id'];
                }
                array_push($provider_arr, $provider_id);
            } else {
                $provider_arr[] = $provider_id;
            }
        }
        return $provider_arr;
    }

}
