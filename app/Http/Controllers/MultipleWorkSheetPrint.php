<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CompoundLabel;
use App\Prescription;
use App\Helpers\Helpers;
use Log;
use PDO;
use Session;
use Mumpo\FpdfBarcode\FpdfBarcode;
use App\PrintLog;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;

class MultipleWorkSheetPrint extends Controller {

    /**
     * To print work sheet.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
    */
    public function index(Request $request) {
        try {
            
            if(!empty($request->rx_num)){
                $rx_num = explode(',',$request->rx_num);
                
                $conn = Helpers::pkConnection();
                $formula_data = Helpers::getAllPKFormula('assoc');
                $chemial_units = Helpers::getChemicalUnits();
                $arr=[];
                foreach($rx_num as $key => $value){
                    $rx_order_array = explode('-', $value);
                    $rxdetails = Prescription::with('order')
                        ->with('order.patient')
                        ->with('order.provider')
                        ->with('order.client')
                        ->where('order_id', '=', $rx_order_array[1])
                        ->where('rx_id', '=', $rx_order_array[0])
                        ->get()
                        ->toArray();
                    if (!empty($rxdetails)){    
                    $log_id = $rxdetails[0]['log_id'];
                    if (!empty($log_id)) {
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
                        $item['location'] = "Rite Away Pharmacy(Allergy)"; 
                        $item['order_number'] = isset($rxdetails[0]['order_id']) ? $rxdetails[0]['order_id'] : '';
                        $item['rx_number'] = isset($rxdetails[0]['rx_id']) ? $rxdetails[0]['rx_id'] : '';
                        $item['fill_id'] = !empty($rxfill_details) ? $rxfill_details[0]['RXFILL_ID'] : 'NA';
                        $item['patient_name'] = isset($patient_name) ? $patient_name : '';
                        $item['dob'] = isset($patient_dob) ? $patient_dob : '';
                        $item['patient_phone'] = isset($patient_phone) ? $patient_phone : '';
                        $item['drug_information'] = empty($rxdetails[0]['formula']) ? '' : (!empty($formula_data) ? strtoupper($formula_data[$rxdetails[0]['formula']]) : '');
                        $item['date_filled'] = $date_filled;
                        $item['refills'] = isset($rxdetails[0]['refills']) ? $rxdetails[0]['refills'] : '';
                        $item['formula_id'] = isset($rxdetails[0]['formula'])?$rxdetails[0]['formula'] : '';
                        $item['lot_id'] = isset($lot_number) ? $lot_number : '';
                        $item['days_supply'] = isset($rxdetails[0]['supply']) ? $rxdetails[0]['supply'] : '';
                        $item['ingredients'] = !empty($ingredients) ? $ingredients : [];
                        $item['log_id'] = !empty($rxdetails) ? $rxdetails[0]['log_id'] : 'NA';
                        $item['provider_name'] = isset($provider_name) ? $provider_name : '';
                        $item['chem_unit'] = isset($chemial_units) ? $chemial_units : '';
                        $arr[]=$item;
                        $user = auth()->user();
                      

                    } else {
                        $message = trans('messages.no_logid');
                        $alert_class = 'alert-danger';
                        Session::flash('message', $message);
                        Session::flash('alert-class', $alert_class);
                        return redirect()->back();
                    }
                } else {
                    $message = trans('messages.rx_details_not_found');
                    $alert_class = 'alert-danger';
                    Session::flash('message', $message);
                    Session::flash('alert-class', $alert_class);
                    return redirect()->back();
                }
            }
                $pdf = new FpdfBarcode();
                $result = $this->generateWorkSheet($arr,$pdf);
                $pdf->Output();
                exit;
            }

        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Generate PDF by FPDF library
     *
     * @return void Return PDF file
     */
    public function generateWorkSheet($rxdetails=array(),$pdf)
    {  
      if(!empty($rxdetails)){
        $user = auth()->user();
        foreach($rxdetails as $value){
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(30, 5, 'Location:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(160, 5, $value['location'], 0, 0);
            //For Order Info
            $pdf->Ln(4);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, 'Order#:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(58, 5, $value['order_number'], 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(40, 5, 'Fill ID:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(48, 5, $value['fill_id'], 0, 1);
            //Next Line
            $pdf->Ln(4);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, 'RX#:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->code128(55, 22, $value['rx_number'], 30, 5, false);
            $pdf->Cell(58, 2, '', 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, 'LOT#:', 0, 1);
            $pdf->SetFont('Arial', '', 10);
            !empty($value['lot_id']) ? $pdf->code128(155, 22, $value['lot_id'], 30, 5, false) : '';
            //Next Line
            $pdf->Ln(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, '', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 0, $value['rx_number'], 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, '', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 0, $value['log_id'], 0, 0);
            //Next Line
            $pdf->Ln(4);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, 'Patient Name:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(58, 5, $value['patient_name'], 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(40, 5, 'DOB:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(52, 5, date('n/j/Y', strTotime($value['dob'])), 0, 0);
            $pdf->Ln(4);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(50, 5, 'Provider Name:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(58, 5, $value['provider_name'], 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(40, 5, 'Log ID:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(52, 5, 'LG' . $value['log_id'], 0, 0);
            $pdf->Line(10, 44, 200, 44);
            // Next Section
            $pdf->Ln(7);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 5, 'Drug Information#:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 5, '', 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(48, 5, 'Ingredient Count:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(52, 5, count($value['ingredients']), 0, 0);
            //Next Line
            $pdf->Ln(4);
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell(120, 5, $value['drug_information'], 0, 'L');
            $pdf->Ln(0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 5, 'Date filled:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 5, date('n/j/Y', strTotime($value['date_filled'])), 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(48, 5, 'Refills:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(52, 5, $value['refills'], 0, 0);
            $pdf->Ln(4);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 5, 'Formula ID:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 5, $value['formula_id'], 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(48, 5, 'Days supply:', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(52, 5, $value['days_supply'], 0, 0);
            $pdf->Line(10, 70, 200, 70);
            // Third Section
            $pdf->Ln(7);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 5, 'Lot ingredient information:', 0, 0);
            $pdf->Ln(7);
            $i = 1;
            if (!empty($value['ingredients'])) {
                foreach ($value['ingredients'] as $key => $val) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->Cell(7, 5, $i, 0, 0);
                    $pdf->Cell(62, 5, strlen($val['NAME']) > 35 ? substr($val['NAME'], 0, 35)
                                    . "..." : $val['NAME'], 0, 0);
                    $pdf->Cell(38, 5, $val['STRENGTH'] . ' ' . $val['FORM'], 0, 0);
                    $pdf->Cell(28, 5, $val['QUANTITY_USED'] . " ".(!empty($value['chem_unit'] && isset($val['UNIT_ID'])) ? $value['chem_unit'][$val['UNIT_ID']] : ''), 0, 0);
                    $pdf->Cell(69, 5, date('m/d/Y', strTotime($val['EXP_DATE'])) . ' Current Lot: '
                            . $val['LOT_NUMBER'], 0, 0);
                    $pdf->Ln(3.5);
                    $i++;
                }
            }
            $plog = new PrintLog();
            $plog->rx_number = $value['rx_number'];
            $plog->user_id = $user->id;
            $plog->type = 'WorkSheet';
            $plog->ip = $_SERVER['REMOTE_ADDR'];
            $plog->save();
        }
           // return true;
        }
    }

}
