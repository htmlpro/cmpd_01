<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CompoundLabel;
use App\Prescription;
use App\Helpers\Helpers;
use Log;
use PDO;
use Session;
use App\PrintLog;
use App\Vial;
use App\RefillHistory;
use App\Provider;
use App\PDFMerger;
use Illuminate\Support\Facades\Crypt;

class MultipleCompoundLabelPrint extends Controller {

    /**
     * To print label.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
    */
    public function index(Request $request) {
        try {
            if(!empty($request->rx_num)){
                $conn = Helpers::pkConnection();
                $therapeutic_class='';
                $arr=[];
                $array=[];
                $flag=0;
                $flag2=0;
                foreach($request->rx_num as $key => $value){
                    $rx_order_array = explode('-', $value);
                    
                    $data['rxdetails'] = Prescription::with('order')
                            ->with('formula')
                            ->with('formula.vial')
                            ->with('order.patient')
                            ->with('order.provider')
                            ->with('user')
                            ->where('rx_id', '=', $rx_order_array[0])
                            ->where('order_id', $rx_order_array[1])
                            ->get()
                            ->toArray(); 
                    if (!empty($data['rxdetails']) && !empty($rx_order_array[2])){
                        $data['rxdetails']['refill_history'] = RefillHistory::where('order_id', $data['rxdetails'][0]['order_id'])
                        ->where('rx_id', $data['rxdetails'][0]['rx_id'])
                        ->get()
                        ->toArray();
                        $formula = $conn->prepare("SELECT FORMULA_ID,NAME,GENERIC_NAME,MANUFACTURER,
                                SHAPE,BRANDNAME_CROSS_REF,THERAPEUTIC_CLASS,GRID_COLOR,DESCRIPTIOND FROM FORMULA WHERE FORMULA_ID = :FORMULA_ID");
                        $formula->bindValue(':FORMULA_ID', $rx_order_array[2]);
                        $formula->execute();
                        $formula_details = $formula->fetchAll(PDO::FETCH_ASSOC);
                        $therapeutic_class = !empty($formula_details[0]['THERAPEUTIC_CLASS']) ? $formula_details[0]['THERAPEUTIC_CLASS'] : '';
                        $rx_number = $rx_order_array[0];
                    }else {
                        return response()->json(['status' => false,'message'=>trans('messages.rx_details_not_found')]);
                    }
                    if($therapeutic_class!='' && $therapeutic_class=='ALLERGY TREATMENT'){
                        $flag=1;
                        $patient_name = Crypt::decrypt($data['rxdetails'][0]['order']['patient']['first_name'])
                        . ' ' . Crypt::decrypt($data['rxdetails'][0]['order']['patient']['last_name']);
                        $doctor_name = $data['rxdetails'][0]['order']['provider']['last_name']
                        . ' ' . substr($provider_name = $data['rxdetails'][0]['order']['provider']['first_name'], 0, 1);
                        $usedby = date('Y-m-d', strtotime($data['rxdetails'][0]['date_entered']
                        . ' + ' . $data['rxdetails'][0]['supply'] . 'day'));
                        $formula_short = $data['rxdetails'][0]['formula']['formula_short'];
                        $logmain_details = Helpers::pkLogDetails($data['rxdetails'][0]['log_id']);
                        $lot_number = isset($logmain_details[0]['LOT_NUMBER']) ? $logmain_details[0]['LOT_NUMBER'] : 'NA';
                        if (!empty($data['rxdetails'][0]['order']['client_id'])) {
                            $client_id = $data['rxdetails'][0]['order']['client_id'];
                        } else {
                            $client_id = $data['rxdetails'][0]['order']['provider_id'];
                        }
                        $label_matrices = Vial::where(['client_id' => $client_id, 'formula_id' => $data['rxdetails'][0]['formula']['formula_id']])
                                ->get()
                                ->toArray();
                        if ($data['rxdetails'][0]['order']['provider']['provider_status'] == 3 ||
                                empty($data['rxdetails'][0]['order']['provider']['client'])) {
                            $client['client_name'] = $data['rxdetails'][0]['order']['provider']['first_name'] . ' ' . $data['rxdetails'][0]['order']['provider']['last_name'];
                            $client['logo'] = $data['rxdetails'][0]['order']['provider']['logo'];
                        } elseif ($data['rxdetails'][0]['order']['provider']['client']) {
                            $provider_details = Provider::where('id', $data['rxdetails'][0]['order']['provider']['client'])
                                    ->get()
                                    ->toArray();
                            if (!empty($provider_details)) {
                                $client['client_name'] = $provider_details[0]['first_name'] . ' ' . $provider_details[0]['last_name'];
                                $client['logo'] = $provider_details[0]['logo'];
                            }
                        }
                        $item['rx_number'] = $rx_order_array[0];
                        $item['patient_name'] = isset($patient_name) ? $patient_name : '';
                        $item['doctor_name'] = isset($doctor_name) ? $doctor_name : '';
                        $item['patient_dob'] = isset($data['rxdetails'][0]['order']['patient']['dob']) ?
                        Crypt::decrypt($data['rxdetails'][0]['order']['patient']['dob']) : '';
                        $item['used_by']= isset($usedby) ? $usedby : '';
                        $item['formula_short']=isset($formula_short) ? $formula_short : '';
                        $item['client_name']= isset($client['client_name']) ? $client['client_name'] : $doctor_name;
                        $item['client_zpl']=(isset($client['logo']) && !empty($client['logo'])) ? $client['logo'] : '';
                        $item['lot_id'] = isset($lot_number) ? $lot_number : '';
                        $item['label_matrices']= isset($label_matrices)?$label_matrices:'';
                        $arr[]=$item;
                    }else{
                        $flag2=1;
                        $patient_name = Crypt::decrypt($data['rxdetails'][0]['order']['patient']['last_name'])
                        . ' ' . Crypt::decrypt($data['rxdetails'][0]['order']['patient']['first_name']);
                        $doctor_name = $data['rxdetails'][0]['order']['provider']['last_name']
                        . ' ' . $data['rxdetails'][0]['order']['provider']['first_name'];
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
                        $list['rx_number'] = $rx_order_array[0];
                        $list['patient_name'] = isset($patient_name) ? $patient_name : '';
                        $list['doctor_name'] = isset($doctor_name) ? $doctor_name : '';
                        $list['dea'] = $dea;
                        $list['patient_address1'] = $patient_address['first_string'];
                        $list['patient_address2'] = $patient_address['second_string'];
                        $list['patient_city_state_zip'] = $patient_city_state_zip;
                        $list['patient_zip'] = $patient_zip;
                        $list['patient_dob'] = isset($data['rxdetails'][0]['order']['patient']['dob']) ?
                        Crypt::decrypt($data['rxdetails'][0]['order']['patient']['dob']) : '';
                        $list['sig1'] = !empty($sig['first_string']) ? $sig['first_string'] : '';
                        $list['sig2'] = !empty($sig['second_string']) ? $sig['second_string'] : '';
                        $list['sig3'] = !empty($sig['third_string']) ? $sig['third_string'] : '';
                        $list['refill_left'] = !empty($refill_left) ? $refill_left : '0';
                        $list['refill_date'] = $rx_fill_date;
                        $list['rx_exp_date'] = $rx_exp_date;
                        $list['orig_exp_date'] = $orig_exp_date;
                        $list['rph'] = $rph;
                        $list['quantity_dispensed'] = $quantity_dispensed;
                        $list['formula_name1'] = !empty($formula_name['first_string']) ? $formula_name['first_string'] : '';
                        $list['formula_name2'] = !empty($formula_name['second_string']) ? $formula_name['second_string'] : '';
                        $list['formula_name3'] = !empty($formula_name['third_string']) ? $formula_name['third_string'] : '';
                        $list['formula_generic_name'] = $formula_generic_name;
                        $list['manufacturer'] = $formula_manufacturer;
                        $list['shape'] = $formula_shape;
                        $list['color'] = $formula_color;
                        $list['brand'] = $formula_brand;
                        $list['formula_description'] = $formula_description;
                        $array[]=$list;

                    }
                }
                $user = auth()->user();
                $result='';
                $label_file_path = public_path("printlabelPdf/" . $user->id . ".pdf");
                $file_path = public_path("cmpdlabelPrint/" . $user->id . ".pdf");
                $pdf = new PDFMerger;
                if($flag==1){
                    $result = $this->generateLabel($arr);
                    $label_file = fopen($label_file_path, "w");
                    fwrite($label_file, $result);
                    fclose($label_file);
                    $pdf->addPDF($label_file_path);
                }
                if($flag2==1){
                    $result = $this->generateCMPDLabel($array);
                    $file = fopen($file_path, "w"); // change file name for PNG images
                    fwrite($file, $result);
                    fclose($file);
                    $pdf->addPDF($file_path);
                }
                if($result!=''){
                    $pdf->merge('file', public_path().'/printlabelPdf/'.$user->id.'.pdf');
                    $redirect_path = asset('/') . 'public/printlabelPdf/' . $user->id . '.pdf';
                    return response()->json(['status' => true,'redirect_path' => $redirect_path]);
                }else{
                    return response()->json(['status' => false,'message'=>'Please Try Again']);

                }
                
            }else{
                return response()->json(['status' => false,'message'=>trans('messages.no_rx')]);
            }
           
           
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Generate PDF for CMPD Label
     * @param $rxdetails|array
     * @return void Return PDF file
    */
    public function generateCMPDLabel($rxdetails=array())
    {  
      if(!empty($rxdetails)){
          $zpl = "";
          $url = "http://api.labelary.com/v1/printers/8dpmm/labels/4x2/";
          foreach($rxdetails as $value){
                $zpl .= "CT~~CD,~CC^~CT~
                ^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR6,6~SD20^JUS^LRN^CI0^XZ
                ^XA
                //label5  307   ^FH\^==>  
                ^FT760,340^A0I,26,26^FH\^FDRite-Away Pharmacy^FS
                ^FT760,309^A0I,22,22^FH\^FD2235 Thousand Oaks Dr.#102^FS
                ^FT760,283^A0I,22,22^FH\^FDSan Antonio,TX 78232 - (877)254-8507^FS
                ^FT760,255^A0I,26,26^FH\^FD" . $value['patient_name'] . "^FS
                ^FT760,228^A0I,26,26^FH\^FD" . $value['formula_name1'] . "^FS
                ^FT760,205^A0I,26,26^FH\^FD" . $value['formula_name2'] . "^FS
                ^FT760,182^A0I,26,26^FH\^FD" . $value['formula_name3'] . "^FS
                ^FT760,152^A0I,26,26^FH\^FDGeneric for : " . $value['formula_generic_name'] . "^FS
                ^FT760,125^A0I,26,26,^FH\^FDMfr:" . $value['manufacturer'] . "^FS
                ^FT760,100^A0I,22,22,^FH\^FD" . $value['sig1'] . "^FS
                ^FT760,80^A0I,22,22,^FH\^FD" . $value['sig2'] . "^FS
                ^FT760,60^A0I,22,22,^FH\^FD" . $value['sig3'] . "^FS
                ^FT760,40^A0I,26,26,^FH\^FD^FS
                ^FT760,30^A0I,26,26,^FH\^FD" . $value['shape'] . " " .$value['formula_description']. " ^FS
            
                ^FT360,340^A0I,22,22^FH\^FDPrescriber:" . $value['doctor_name'] . "^FS
                ^FT360,315^A0I,22,22^FH\^FDRefills left:" . $value['refill_left'] . " Qty : " . $value['quantity_dispensed'] . "^FS
                ^FT360,310^A0I,22,22^FH\^FD^FS
                ^FT360,285^A0I,26,26^FH\^FDRX:" . $value['rx_number'] . "^FS
                ^FT360,260^A0I,22,22^FH\^FDRX Exp:" . $value['rx_exp_date'] . "^FS
                ^FT360,235^A0I,22,22^FH\^FDDate Filled: " . $value['refill_date'] . "^FS
                ^FT360,210^A0I,22,22^FH\^FDOrig. Rx Date: " . $value['orig_exp_date'] . "^FS
                ^FT360,185^A0I,22,22^FH\^FDRPH:" . $value['rph'] . "^FS
                ^FT360,160^A0I,22,22,^FH\^FDStore DEA#" . $value['dea'] . "^FS
                ^FT360,135^A0I,22,22^FH\^FD" . $value['patient_name'] . "^FS
                ^FT360,114^A0I,22,22,^FH\^FD" . $value['patient_address1'] . "^FS
                ^FT360,93^A0I,22,22,^FH\^FD" . $value['patient_address2'] . "^FS
                ^FT360,73^A0I,22,22,^FH\^FD" . $value['patient_city_state_zip'] . "^FS
                ^FT360,53^A0I,20,19,^FH\^FDCaution:Federal Law prohibits the transfer^FS
                ^FT360,33^A0I,20,19,^FH\^FDof this drug to any person other than the^FS
                ^FT360,13^A0I,20,19,^FH\^FDpatient for whom it was prescribed^FS
                ^PQ1,0,1,Y^XZ";
                $user = auth()->user();
                $plog = new PrintLog();
                $plog->rx_number = $value['rx_number'];
                $plog->user_id = $user->id;
                $plog->type = 'CMPDLabel';
                $plog->ip = $_SERVER['REMOTE_ADDR'];
                $plog->save();
            }
            $curl = curl_init();

            // adjust print density (8dpmm), label width (4 inches), label height (6 inches), and label index (0) as necessary
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $zpl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/pdf")); // omit this line to get PNG images back
            $result = curl_exec($curl);
            if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
                curl_close($curl);
                return $result;
            } else {
                return false;
            }
        }else{
            return false;
        }  
    }
    /**
     * Generate PDF for Label
     * @param $rxdetails|array
     * @return void Return PDF file
    */
    public function generateLabel($rxdetails=array()){
        if(!empty($rxdetails)){
            $zpl2 = "";
            $url2 = "http://api.labelary.com/v1/printers/8dpmm/labels/4.5x14.5/";
            foreach($rxdetails as $value){
                      $zpl2 .= "CT~~CD,~CC^~CT~^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR6,
                      6~SD20^JUS^LRN^CI0^XZ^XA^MMT^PW860^LL2550^LS0";
                      $zpl2 .= !empty($value['client_zpl']) ? $value['client_zpl'] : '';
                      $zpl2 .= "^FT724,2194^A0R,46,45^FB314,1,0,C^FH\^FD ALLERGENIC^FS
                          ^FT666,2194^A0R,46,45^FB314,1,0,C^FH\^FD EXTRACT^FS
                          ^FT608,2194^A0R,46,45^FB314,1,0,C^FH\^FD PRESCRIPTION^FS
                          ^FT550,2194^A0R,46,45^FB314,1,0,C^FH\^FD TREATMENT^FS
                          ^FT531,1544^A0R,42,40^FH\^FDRX# " . $value['rx_number'] . "^FS
                          ^BY4,2,45
                          ^FO480,1550^BCR^FD" . $value['rx_number'] . "^FS
                          ^FT406,1544^A0R,42,50^FH\^FD" . $value['patient_name'] . "    " . $value['formula_short'] . "   DR. " . $value['doctor_name'] . "^FS
                          ^FT338,1544^A0R,,30,30^FH\^FD Prepared in accordance with individual's requirements as prescribed.^FS
                          ^FT289,1544^A0R,,30,30^FH\^FDCAUTION: Rx Only^FS
                          ^FT289,1803^A0R,,30,30^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
                          ^FT238,1544^A0R,,30,30^FH\^FDCompounded by:^FS
                          ^FT235,1780^A0R,,30,30^FH\^FDRite Away Pharmacy^FS
                          ^FT194,1780^A0R,,30,30^FH\^FD2235 Thousand Oaks Dr. #102^FS
                          ^FT153,1780^A0R,,30,30^FH\^FDSan Antonio, TX 78232^FS
                          ^FT112,1780^A0R,,30,30^FH\^FDTX License# 26990/AS^FS
                          ^FT153,2160^A0R,,30,30^FH\^FDLOT# " . $value['lot_id'] . "^FS
                          ^BY4,2,45
                          ^FO100,2160^BCR^FD" . $value['lot_id'] . "^FS";
  
                      $i = 0;
                      $k = 0;
                      if (!empty($value['label_matrices'])) {
                          foreach ($value['label_matrices'] as $key => $eachvalue) {
                              $zpl2 .= "^FT790," . (1448 - $k * $i) . "^A0I,,30,30^FH\^FD" . $eachvalue['vial'] . "    ALLERGENIC EXTRACT/SPECIAL MIXTURE^FS
                              ^FT790," . (1415 - $k * $i) . "^A0I,,30,30^FH\^FD " . $value['client_name'] . "   " . $eachvalue['class'] . "^FS
                              ^FT790," . (1382 - $k * $i) . "^A0I,,30,30^FH\^FD" . $eachvalue['color'] . " " . $value['formula_short'] . "   DR. " . $value['doctor_name'] . "^FS
                              ^FT790," . (1349 - $k * $i) . "^A0I,,30,30^FH\^FDPT.NAME/DOB: " . $value['patient_name'] . " / " . date('n/j/Y', strTotime($value['patient_dob'])) . "^FS
                              ^FT790," . (1316 - $k * $i) . "^A0I,,30,30^FH\^FDRX# " . $value['rx_number'] . "/LOT# " . $value['lot_id'] . "  USEBY: " . date('n/j/Y', strTotime($value['used_by'])) . "^FS
                              ^FT590," . (1283 - $k * $i) . "^A0I,29,28^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
                              ^FT670," . (1255 - $k * $i) . "^A0I,29,28^FH\^FDRx Only Rite Away Pharmacy^FS
                              ^FT710," . (1227 - $k * $i) . "^A0I,29,28^FH\^FD2235 Thousand Oaks Dr, #102 San Antonio, TX 78232^FS";
                              $k = 304;
                              $i++;
                          }
                      }
                      $zpl2 .= "^PQ1,0,1,Y^XZ";
                  $user = auth()->user();
                  $plog = new PrintLog();
                  $plog->rx_number = $value['rx_number'];
                  $plog->user_id = $user->id;
                  $plog->type = 'Label';
                  $plog->ip = $_SERVER['REMOTE_ADDR'];
                  $plog->save();
              }
              $curl2 = curl_init();
              // adjust print density (8dpmm), label width (4 inches), label height (6 inches), and label index (0) as necessary
              curl_setopt($curl2, CURLOPT_URL, $url2);
              curl_setopt($curl2, CURLOPT_POST, true);
              curl_setopt($curl2, CURLOPT_POSTFIELDS, $zpl2);
              curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($curl2, CURLOPT_HTTPHEADER, array("Accept: application/pdf")); // omit this line to get PNG images back
              $result2 = curl_exec($curl2);
              if (curl_getinfo($curl2, CURLINFO_HTTP_CODE) == 200) {
                curl_close($curl2);
                return $result2;
              }else{
                return false;    
              }
          }else{
              return false;
          } 
    }

}
