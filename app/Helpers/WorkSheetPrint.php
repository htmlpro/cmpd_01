<?php

namespace App\Helpers;

use Fpdf;
use Mumpo\FpdfBarcode\FpdfBarcode;
use App\PrintLog;

class WorkSheetPrint
{

    private $location;
    private $order_number;
    private $rx_number;
    private $fill_id;
    private $patient_name;
    private $dob;
    private $patient_phone;
    private $patient_address;
    private $drug_information;
    private $ingredient_count;
    private $date_filled;
    private $refills;
    private $formula_id;
    private $due_date;
    private $lot_id;
    private $days_supply;
    private $practice;
    private $provider_name;
    private $provider_phone;
    private $provider_address;
    private $ingredients = [];
    private $log_id;
    private $lot_barcode;
    private $chem_unit;

    /**
     * Set the {key} with value.
     *
     * @param string $key variable name.
     * @param string $value variable values.
     * @return void
     */
    public function setter($key, $value)
    {
        $this->$key = $value;
    }

    /**
     * Return the variables value
     *
     * @param string $key variable name
     * @return string
     */
    public function getter($key)
    {
        return $this->$key;
    }

    /**
     * To generate PDF by FPDF library.
     *
     * @return void Return PDF file.
     */
    public function generatePDF()
    {           
        $pdf = new FpdfBarcode();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 5, 'Location:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(160, 5, $this->getter('location'), 0, 0);
        //For Order Info
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, 'Order#:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 5, $this->getter('order_number'), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, 'Fill ID:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(48, 5, $this->getter('fill_id'), 0, 1);
        //Next Line
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, 'RX#:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->code128(55, 22, $this->getter('rx_number'), 30, 5, false);
        $pdf->Cell(58, 2, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, 'LOT#:', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        !empty($this->getter('lot_id')) ? $pdf->code128(155, 22, $this->getter('lot_id'), 30, 5, false) : '';
        //Next Line
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, '', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 0, $this->getter('rx_number'), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, '', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 0, $this->getter('log_id'), 0, 0);
        //Next Line
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, 'Patient Name:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 5, $this->getter('patient_name'), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, 'DOB:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 5, date('n/j/Y', strTotime($this->getter('dob'))), 0, 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 5, 'Provider Name:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 5, $this->getter('provider_name'), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, 'Log ID:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 5, 'LG' . $this->getter('log_id'), 0, 0);
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
        $pdf->Cell(52, 5, count($this->getter('ingredients')), 0, 0);
        //Next Line
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(120, 5, $this->getter('drug_information'), 0, 'L');
        $pdf->Ln(0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 5, 'Date filled:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, date('n/j/Y', strTotime($this->getter('date_filled'))), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(48, 5, 'Refills:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 5, $this->getter('refills'), 0, 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 5, 'Formula ID:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, $this->getter('formula_id'), 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(48, 5, 'Days supply:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 5, $this->getter('days_supply'), 0, 0);
        $pdf->Line(10, 70, 200, 70);
        // Third Section
        $pdf->Ln(7);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 5, 'Lot ingredient information:', 0, 0);
        $pdf->Ln(7);
        $i = 1;
        //dd($this->getter('chem_unit'));
        if (!empty($this->getter('ingredients'))) {
            foreach ($this->getter('ingredients') as $key => $value) {
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(7, 5, $i, 0, 0);
                $pdf->Cell(62, 5, strlen($value['NAME']) > 35 ? substr($value['NAME'], 0, 35)
                                . "..." : $value['NAME'], 0, 0);
                $pdf->Cell(38, 5, $value['STRENGTH'] . ' ' . $value['FORM'], 0, 0);
                $pdf->Cell(28, 5, $value['QUANTITY_USED'] . " ".(!empty($this->getter('chem_unit') && isset($value['UNIT_ID'])) ? $this->getter('chem_unit')[$value['UNIT_ID']] : ''), 0, 0);
                $pdf->Cell(69, 5, date('m/d/Y', strTotime($value['EXP_DATE'])) . ' Current Lot: '
                        . $value['LOT_NUMBER'], 0, 0);
                $pdf->Ln(3.5);
                $i++;
            }
        }
        $pdf->output();
        $user = auth()->user();
        $plog = new PrintLog();
        $plog->rx_number = $this->getter('rx_number');
        $plog->user_id = $user->id;
        $plog->type = 'WorkSheet';
        $plog->ip = $_SERVER['REMOTE_ADDR'];
        $plog->save();
        exit;
    }
}
