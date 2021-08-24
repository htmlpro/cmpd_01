<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderStageRelation;
use App\Helpers\Helpers;
use App\Prescription;
use App\Dispatch;
use App\Invoice;
use Log;
use Illuminate\Support\Facades\Crypt;
use App\Provider;
use Illuminate\Database\Eloquent\Builder;
use PDO;
use App\Order;
use App\TestPresceriptionScript;

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
                $order_details = Order::with('prescription')
                    ->with('provider')
                    ->with('patient')
                    ->with('prescription.daw')
                    ->with('prescription.schedule')
                    ->with('prescription.refillHistory')
                    ->with('user')
                    ->withTrashed()
                    ->get()
                    ->toArray();
            $formula_data = Helpers::getAllPKFormula('assoc');
            $provider_data = Helpers::getAllProviders('assoc');
            foreach ($order_details as $keys => $value) {
                if (!empty($value['prescription'])) {
                    foreach ($value['prescription'] as $rxkeys => $prescription) {
                        $formula_details = Helpers::getPKFormulaById($prescription['formula']);
                        $ingr = $this->getIngredientCount($prescription['log_id']);
                        $dispatch = $this->getDispatchDetails($prescription['order_id'], $prescription['rx_id']);
                        if (!empty($dispatch)) {
                            $invoice = Invoice::with('invoiceServiceType')
                                    ->where('dispatch_id', $dispatch[0]['dispatch_id'])
                                    ->get()
                                    ->toArray();
                        }
                        
                        TestPresceriptionScript::insert([
                            'order_id' => $value['order_id'] ? $value['order_id'] : '',
                            'rd_id' => $prescription['rx_id'] ? $prescription['rx_id'] : '',
                            'rx_fill_number' => isset($prescription['rx_fill_number']) ? $prescription['rx_fill_number'] : '',
                            'supply' => $prescription['supply'] ? $prescription['supply'] : '',
                            'refill_date' => $prescription['refill_date'] ? date('n/j/Y', strtotime($prescription['refill_date'])) : '',
                            'date_written' => $prescription['date_written'] ? date('n/j/Y', strtotime($prescription['date_written'])) : '',
                            'daw' => !empty($prescription['daw']) ? $prescription['daw']['description'] : '',
                            'quantity_dispensed' => $prescription['quantity_dispensed'] ? $prescription['quantity_dispensed'] : '',
                            'schedule' => !empty($prescription['schedule']) ? $prescription['schedule']['code'] : '',
                            'p_id' => isset($value['patient_id']) ? $value['patient_id'] : '',
                            'p_add1' => isset($value['patient']['address1']) ? $value['patient']['address1'] : '',
                            'p_add2' => isset($value['patient']['address2']) ? $value['patient']['address2'] : '',
                            'p_city' => isset($value['patient']['city']) ? $value['patient']['city'] : '',
                            'p_state' => isset($value['patient']['state']) ? $value['patient']['state'] : '',
                            'p_zip' => isset($value['patient']['zip']) ? $value['patient']['zip'] : '',
                            'p_age' => isset($value['patient']['dob']) ? $diff = (date('Y') - date('Y', strtotime(Crypt::decrypt($value['patient']['dob'])))) : '',
                            'p_gender' => isset($value['patient']['gender']) ? $value['patient']['gender'] : '',
                            'p_phone' => isset($value['patient']['phone']) ? $value['patient']['phone'] : '',
                            'insur' => $prescription['third_party'] ? $prescription['third_party'] : '',
                            'd_add1' => isset($value['provider']['reg_address1']) ? $value['provider']['reg_address1'] : '',
                            'd_add2' => isset($value['provider']['reg_address2']) ? $value['provider']['reg_address2'] : '',
                            'd_city' => isset($value['provider']['reg_city']) ? $value['provider']['reg_city'] : '',
                            'd_state' => sset($value['provider']['reg_state']) ? $value['provider']['reg_state'] : '',
                            'd_zip' => isset($value['provider']['reg_zip']) ? $value['provider']['reg_zip'] : '',
                            'd_dea' => isset($value['provider']['dea']) ? $value['provider']['dea'] : '',
                            'd_phone' => isset($value['provider']['phone1']) ? $value['provider']['phone1'] : '',
                            'd_email' => isset($value['provider']['email']) ? $value['provider']['email'] : '',
                            'sig' => $prescription['sig'] ? $prescription['sig'] : '',
                            'client' => isset($value['client_id']) ? (!empty($provider_data) ? strtoupper($provider_data[$value['client_id']]) : '') : '',
                            'formula_id' => $prescription['formula'] ? $prescription['formula'] : '',
                            'therapeutic_class' => !empty($formula_details) ? $formula_details[0]['THERAPEUTIC_CLASS'] : '',
                            'speedcode' => !empty($formula_details) ? $formula_details[0]['SPEEDCODE'] : '',
                            'strength' => !empty($formula_details) ? $formula_details[0]['STRENGTH'] : '',
                            'drug_from' => !empty($formula_details) ? $formula_details[0]['FORM'] : '',
                            'total_price' => $prescription['total_price'] ? $prescription['total_price'] : '',
                            'delivery_price' => !empty($dispatch) ? (!empty($invoice) ? $invoice[0]['delivery_price'] : '') : '',
                            'refill_remain' => !empty($value[0]['refill_history']) ? $value[0]['refill_history'][0]['remaining_qty'] : '',
                            'log' => $prescription['log_id'] ? $prescription['log_id'] : '',
                            'tech' => $value['user']['name'] ? $value['user']['name'] : '',
                            'location' => 'Riteawayallergy',
                            'service_type' => !empty($dispatch) ? (!empty($invoice) ? $invoice[0]['invoice_service_type']['service_type'] : '') : '',
                            'count' => $prescription['formula'] ? count($ingr) : ''
                        ]);
                    }
                } else {                   
                    TestPresceriptionScript::insert([
                            'order_id' => $value['order_id'] ? $value['order_id'] : '',
                            'p_id' => isset($value['patient_id']) ? $value['patient_id'] : '',
                            'p_add1' => isset($value['patient']['address1']) ? $value['patient']['address1'] : '',
                            'p_add2' => isset($value['patient']['address2']) ? $value['patient']['address2'] : '',
                            'p_city' => isset($value['patient']['city']) ? $value['patient']['city'] : '',
                            'p_state' => isset($value['patient']['state']) ? $value['patient']['state'] : '',
                            'p_zip' => isset($value['patient']['zip']) ? $value['patient']['zip'] : '',
                            'p_age' => isset($value['patient']['dob']) ? $diff = (date('Y') - date('Y', strtotime(Crypt::decrypt($value['patient']['dob'])))) : '',
                            'p_gender' => isset($value['patient']['gender']) ? $value['patient']['gender'] : '',
                            'p_phone' => isset($value['patient']['phone']) ? $value['patient']['phone'] : '',
                            'd_add1' => isset($value['provider']['reg_address1']) ? $value['provider']['reg_address1'] : '',
                            'd_add2' => isset($value['provider']['reg_address2']) ? $value['provider']['reg_address2'] : '',
                            'd_city' => isset($value['provider']['reg_city']) ? $value['provider']['reg_city'] : '',
                            'd_state' => sset($value['provider']['reg_state']) ? $value['provider']['reg_state'] : '',
                            'd_zip' => isset($value['provider']['reg_zip']) ? $value['provider']['reg_zip'] : '',
                            'd_dea' => isset($value['provider']['dea']) ? $value['provider']['dea'] : '',
                            'd_phone' => isset($value['provider']['phone1']) ? $value['provider']['phone1'] : '',
                            'd_email' => isset($value['provider']['email']) ? $value['provider']['email'] : '',
                            'client' => isset($value['client_id']) ? (!empty($provider_data) ? strtoupper($provider_data[$value['client_id']]) : '') : '',
                            'refill_remain' => !empty($value[0]['refill_history']) ? $value[0]['refill_history'][0]['remaining_qty'] : '',
                            'tech' => $value['user']['name'] ? $value['user']['name'] : '',
                            'location' => 'Riteawayallergy',
                        ]);
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
     * To get rx dispatch details.
     *
     * @param integer $order_num
     * @param integer $rx_num
     * @return array|$dispatch
     */
    private function getDispatchDetails($order_num = '', $rx_num = '') {

        if (empty($rx_num)) {
            $con = ['order_id' => $order_num];
        } else {
            $con = ['order_id' => $order_num, 'rx_id' => $rx_num];
        }
        $dispatch = Dispatch::with('dispatchMethod')
                ->where($con)
                ->get()
                ->toArray();
        if (!empty($dispatch)) {
            return $dispatch;
        }
    }

    /**
     * To get rx ingredient count.
     *
     * @param integer $logm_id
     * @return array|$ingr
     */
    private function getIngredientCount($logm_id) {
        if (isset($logm_id)) {
            $conn = Helpers::pkConnection();
            $ingredients = $conn->prepare("SELECT logc.QUANTITY_USED,logc.EXP_DATE,logc.CHEMICAL_ID,
                        logc.LOT_NUMBER, chem.NAME,chem.FORM,chem.STRENGTH FROM LOGCHEM AS logc 
                        INNER JOIN CHEMICAL AS chem ON logc.CHEMICAL_ID=chem.CHEMICAL_ID 
                        WHERE LOGMAIN_ID=:LOGMAIN_ID AND logc.QUANTITY_USED > 0.0000");
            $logm_id = $logm_id;
            $ingredients->bindValue(':LOGMAIN_ID', $logm_id);
            $ingredients->execute();
            $ingr = $ingredients->fetchAll(PDO::FETCH_ASSOC);
            return $ingr;
        }
    }

}
