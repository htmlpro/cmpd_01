<?php

namespace App\Helpers;

use App\PrintLog;

class CompoundLabel
{

    private $rx_number;
    private $patient_name;
    private $doctor_name;
    private $dea;
    private $patient_address1;
    private $patient_address2;
    private $patient_zip;
    private $sig1;
    private $sig2;
    private $sig3;
    private $refill_left;
    private $refill_date;
    private $rx_exp_date;
    private $rph;
    private $quantity_dispensed;
    private $formula_name1;
    private $formula_name2;
    private $formula_name3;
    private $formula_generic_name;
    private $manufacturer;
    private $shape;
    private $color;
    private $orig_exp_date;
    private $formula_description;
    private $patient_city_state_zip;

    /**
     * Set the {key} with value
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
     * Generate PDF by FPDF library
     *
     * @return void Return PDF file
     */
    public function generateCMPDLabel()
    {  
        $zpl = "CT~~CD,~CC^~CT~
    ^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR6,6~SD20^JUS^LRN^CI0^XZ
    ^XA
    //label5  307   ^FH\^==>  
    ^FT760,340^A0I,26,26^FH\^FDRite-Away Pharmacy^FS
    ^FT760,309^A0I,22,22^FH\^FD2235 Thousand Oaks Dr.#102^FS
    ^FT760,283^A0I,22,22^FH\^FDSan Antonio,TX 78232 - (877)254-8507^FS
    ^FT760,255^A0I,26,26^FH\^FD" . $this->getter('patient_name') . "^FS
    ^FT760,228^A0I,26,26^FH\^FD" . $this->getter('formula_name1') . "^FS
    ^FT760,205^A0I,26,26^FH\^FD" . $this->getter('formula_name2') . "^FS
    ^FT760,182^A0I,26,26^FH\^FD" . $this->getter('formula_name3') . "^FS
    ^FT760,152^A0I,26,26^FH\^FDGeneric for : " . $this->getter('formula_generic_name') . "^FS
    ^FT760,125^A0I,26,26,^FH\^FDMfr:" . $this->getter('manufacturer') . "^FS
    ^FT760,100^A0I,22,22,^FH\^FD" . $this->getter('sig1') . "^FS
    ^FT760,80^A0I,22,22,^FH\^FD" . $this->getter('sig2') . "^FS
    ^FT760,60^A0I,22,22,^FH\^FD" . $this->getter('sig3') . "^FS
    ^FT760,40^A0I,26,26,^FH\^FD^FS
    ^FT760,30^A0I,26,26,^FH\^FD" . $this->getter('shape') . " " .$this->getter('formula_description'). " ^FS

    ^FT360,340^A0I,22,22^FH\^FDPrescriber:" . $this->getter('doctor_name') . "^FS
    ^FT360,315^A0I,22,22^FH\^FDRefills left:" . $this->getter('refill_left') . " Qty : " . $this->getter('quantity_dispensed') . "^FS
    ^FT360,310^A0I,22,22^FH\^FD^FS
    ^FT360,285^A0I,26,26^FH\^FDRX:" . $this->getter('rx_number') . "^FS
    ^FT360,260^A0I,22,22^FH\^FDRX Exp:" . $this->getter('rx_exp_date') . "^FS
    ^FT360,235^A0I,22,22^FH\^FDDate Filled: " . $this->getter('refill_date') . "^FS
    ^FT360,210^A0I,22,22^FH\^FDOrig. Rx Date: " . $this->getter('orig_exp_date') . "^FS
    ^FT360,185^A0I,22,22^FH\^FDRPH:" . $this->getter('rph') . "^FS
    ^FT360,160^A0I,22,22,^FH\^FDStore DEA#" . $this->getter('dea') . "^FS
    ^FT360,135^A0I,22,22^FH\^FD" . $this->getter('patient_name') . "^FS
    ^FT360,114^A0I,22,22,^FH\^FD" . $this->getter('patient_address1') . "^FS
    ^FT360,93^A0I,22,22,^FH\^FD" . $this->getter('patient_address2') . "^FS
    ^FT360,73^A0I,22,22,^FH\^FD" . $this->getter('patient_city_state_zip') . "^FS
    ^FT360,53^A0I,20,19,^FH\^FDCaution:Federal Law prohibits the transfer^FS
    ^FT360,33^A0I,20,19,^FH\^FDof this drug to any person other than the^FS
    ^FT360,13^A0I,20,19,^FH\^FDpatient for whom it was prescribed^FS
    ^PQ1,0,1,Y^XZ";

        $user = auth()->user();
        $file_path = public_path("cmpdlabelPrint/" . $user->id . ".pdf");

        $curl = curl_init();
        // adjust print density (8dpmm), label width (4 inches), label height (6 inches), and label index (0) as necessary
        curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/4x2/");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $zpl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/pdf")); // omit this line to get PNG images back
        $result = curl_exec($curl);

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
            $file = fopen($file_path, "w"); // change file name for PNG images
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
        $plog->type = 'CMPDLabel';
        $plog->ip = $_SERVER['REMOTE_ADDR'];
        $plog->save();
        $redirect_path = asset('/') . 'public/cmpdlabelPrint/' . $user->id . '.pdf';
        header("Location:$redirect_path");
        exit();
    }
}
