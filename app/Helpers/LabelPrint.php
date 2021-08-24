<?php

namespace App\Helpers;

use App\PrintLog;
use Log;

class LabelPrint
{

    private $rx_number;
    private $patient_name;
    private $formula_commercial_name;
    private $client_name;
    private $doctor_name;
    private $lot_id;
    private $patient_dob;
    private $used_by;
    private $formula;
    private $formula_details;
    private $label_matrices;
    private $formula_short;
    private $client_zpl;

    /**
     * To set the {key} with value
     *
     * @param String $key   variable name
     * @param String $value variable values
     *
     * @return void
     */
    public function setter($key, $value)
    {
        $this->$key = $value;
    }

    /**
     * Return the variables value
     *
     * @param String $key variable name
     *
     * @return String
     */
    public function getter($key)
    {
        return $this->$key;
    }

    /**
     * Generate Label by ZPL code
     *
     * @return void
     */
    public function generateLabel()
    {
        try {
            $zpl = "CT~~CD,~CC^~CT~^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR6,
                            6~SD20^JUS^LRN^CI0^XZ^XA^MMT^PW860^LL2550^LS0";
            $zpl .= !empty($this->getter('client_zpl')) ? $this->getter('client_zpl') : '';
            $zpl .= "^FT724,2194^A0R,46,45^FB314,1,0,C^FH\^FD ALLERGENIC^FS
                ^FT666,2194^A0R,46,45^FB314,1,0,C^FH\^FD EXTRACT^FS
                ^FT608,2194^A0R,46,45^FB314,1,0,C^FH\^FD PRESCRIPTION^FS
                ^FT550,2194^A0R,46,45^FB314,1,0,C^FH\^FD TREATMENT^FS
                ^FT531,1544^A0R,42,40^FH\^FDRX# " . $this->getter('rx_number') . "^FS
                ^BY4,2,45
                ^FO480,1550^BCR^FD" . $this->getter('rx_number') . "^FS
                ^FT406,1544^A0R,42,50^FH\^FD" . $this->getter('patient_name') . "    " . $this->getter('formula_short') . "   DR. " . $this->getter('doctor_name') . "^FS
                ^FT338,1544^A0R,,30,30^FH\^FD Prepared in accordance with individual's requirements as prescribed.^FS
                ^FT289,1544^A0R,,30,30^FH\^FDCAUTION: Rx Only^FS
                ^FT289,1803^A0R,,30,30^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
                ^FT238,1544^A0R,,30,30^FH\^FDCompounded by:^FS
                ^FT235,1780^A0R,,30,30^FH\^FDRite Away Pharmacy^FS
                ^FT194,1780^A0R,,30,30^FH\^FD2235 Thousand Oaks Dr. #102^FS
                ^FT153,1780^A0R,,30,30^FH\^FDSan Antonio, TX 78232^FS
                ^FT112,1780^A0R,,30,30^FH\^FDTX License# 26990/AS^FS
                ^FT153,2160^A0R,,30,30^FH\^FDLOT# " . $this->getter('lot_id') . "^FS
                ^BY4,2,45
                ^FO100,2160^BCR^FD" . $this->getter('lot_id') . "^FS";

            $i = 0;
            $k = 0;
            if (!empty($this->getter('label_matrices'))) {
                foreach ($this->getter('label_matrices') as $key => $value) {
                    $zpl .= "^FT790," . (1448 - $k * $i) . "^A0I,,30,30^FH\^FD" . $value['vial'] . "    ALLERGENIC EXTRACT/SPECIAL MIXTURE^FS
                    ^FT790," . (1415 - $k * $i) . "^A0I,,30,30^FH\^FD " . $this->getter('client_name') . "   " . $value['class'] . "^FS
                    ^FT790," . (1382 - $k * $i) . "^A0I,,30,30^FH\^FD" . $value['color'] . " " . $this->getter('formula_short') . "   DR. " . $this->getter('doctor_name') . "^FS
                    ^FT790," . (1349 - $k * $i) . "^A0I,,30,30^FH\^FDPT.NAME/DOB: " . $this->getter('patient_name') . " / " . date('n/j/Y', strTotime($this->getter('patient_dob'))) . "^FS
                    ^FT790," . (1316 - $k * $i) . "^A0I,,30,30^FH\^FDRX# " . $this->getter('rx_number') . "/LOT# " . $this->getter('lot_id') . "  USEBY: " . date('n/j/Y', strTotime($this->getter('used_by'))) . "^FS
                    ^FT590," . (1283 - $k * $i) . "^A0I,29,28^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
                    ^FT670," . (1255 - $k * $i) . "^A0I,29,28^FH\^FDRx Only Rite Away Pharmacy^FS
                    ^FT710," . (1227 - $k * $i) . "^A0I,29,28^FH\^FD2235 Thousand Oaks Dr, #102 San Antonio, TX 78232^FS";
                    $k = 304;
                    $i++;
                }
            }
            $zpl .= "^PQ1,0,1,Y^XZ";
            $user = auth()->user();
            $file_path = public_path("printlabelPdf/" . $user->id . ".pdf");
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/4.5x14.5/");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $zpl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/pdf"));
            $result = curl_exec($curl);
            if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
                $file = fopen($file_path, "w");
                fwrite($file, $result);
                fclose($file);
            } else {
                print_r("Error: $result");
            }
            curl_close($curl);
            $user = auth()->user();
            $plog = new PrintLog();
            $plog->rx_number = $this->getter('rx_number');
            $plog->user_id = $user->id;
            $plog->type = 'Label';
            $plog->ip = $_SERVER['REMOTE_ADDR'];
            $plog->save();
            $redrect_path = asset('/') . 'public/printlabelPdf/' . $user->id . '.pdf';
            header("Location:$redrect_path");
            exit();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }
}
