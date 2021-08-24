<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\WorkSheetPDF;
use App\Helpers\LabelZPL;
use PDO;
use App\LabelMatrix;

class PrintController extends Controller
{

    /**
     * To render print UI.
     *
     * @return void
     */
    public function index()
    {
        return view('print.index');
    }

    /**
     * To print worksheet.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
     */
    public function invoicePrint(Request $req)
    {

        $servername = env('DB_HOST_F');
        $username = env('DB_USERNAME_F');
        $password = env('DB_PASSWORD_F');
        $db = env('DB_DATABASE_F');
        $charset = env('DB_CHARSET_F');
        $port = env('DB_PORT_F');

        try {
            $dsn = "firebird:host=$servername;dbname=$db;port=$port;charset=$charset;";
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rxnumber = $req->input('rx_num');
            $worksheet_details = [];
            $rxdetails = $conn->prepare("SELECT rxm.RX_NUMBER,rxm.PATIENT_ID,rxm.DOCTOR_ID,rxm.FORMULA_ID,rxm.REFILLS,
			rxm.RX_TYPE,rxm.DAW,
			rxf.FILL_DATE,rxf.PHARMACIST_ID,rxf.TECHNICIAN_ID,rxf.LOG_ID,rxf.DAYS_SUPPLY,RX_DUE_DATE,rxf.RXFILL_ID
						FROM RXMAIN AS rxm 
						INNER JOIN RXFILL AS rxf
						ON rxm.RX_NUMBER=rxf.RX_NUMBER and rxm.RX_NUMBER=$rxnumber");
            $rxdetails->execute();
            $worksheet_details = $rxdetails->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($worksheet_details)) {
                $patient = $conn->prepare("SELECT FIRSTNAME,LASTNAME,BIRTHDATE,PHONE1,PHONE2,REGADDRESS1,REGADDRESS2,REGSTATE,REGCITY FROM PATIENT where PATIENT_ID=:PATIENT_ID");
                $patient_id = $worksheet_details[0]['PATIENT_ID'];
                $patient->bindValue(':PATIENT_ID', $patient_id);
                $patient->execute();
                array_push($worksheet_details, $patient->fetchAll(PDO::FETCH_ASSOC));

                $doctor = $conn->prepare("SELECT FIRSTNAME,LASTNAME,BUSINESSNAME,PHONE1,REGADDRESS1,REGADDRESS2,REGCITY,REGCOUNTY FROM DOCTOR where DOCTOR_ID=:DOCTOR_ID");
                $DOCTOR_ID = $worksheet_details[0]['DOCTOR_ID'];
                $doctor->bindValue(':DOCTOR_ID', $DOCTOR_ID);
                $doctor->execute();
                array_push($worksheet_details, $doctor->fetchAll(PDO::FETCH_ASSOC));

                $formulas = $conn->prepare("SELECT NAME,CODE,FORM,STRENGTH,ORDER_NUMBER,LOT_NUMBER,STORAGE_INFORMATION,INSTRUCTIONS FROM FORMULA where FORMULA_ID=:FORMULA_ID");
                $formula_id = $worksheet_details[0]['FORMULA_ID'];
                $formulas->bindValue(':FORMULA_ID', $formula_id);
                $formulas->execute();
                array_push($worksheet_details, $formulas->fetchAll(PDO::FETCH_ASSOC));

                $logmain = $conn->prepare("SELECT * FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                $log_id = $worksheet_details[0]['LOG_ID'];
                $logmain->bindValue(':LOG_ID', $log_id);
                $logmain->execute();
                $logmain_res = $logmain->fetchAll(PDO::FETCH_ASSOC);
                array_push($worksheet_details, $logmain_res);

                $ingredients = $conn->prepare("SELECT logc.QUANTITY_USED,logc.EXP_DATE,logc.CHEMICAL_ID,logc.LOT_NUMBER, chem.NAME,chem.FORM,chem.STRENGTH FROM LOGCHEM AS logc 
						INNER JOIN CHEMICAL AS chem
						ON logc.CHEMICAL_ID=chem.CHEMICAL_ID WHERE LOGMAIN_ID=:LOGMAIN_ID AND QUANTITY_USED >0.0000");
                $logm_id = $worksheet_details[4][0]['LOGMAIN_ID'];
                $ingredients->bindValue(':LOGMAIN_ID', $logm_id);
                $ingredients->execute();
                $ingr = $ingredients->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return redirect('/print')->with('error', 'No Rx record found!');
            }
            usort($ingr, function ($a, $b) {
                return $a['NAME'] <=> $b['NAME'];
            });
            $wspdf = new WorkSheetPDF();
            $wspdf->setter('location', 'Rite Away Pharmacy(Allergy)');
            $wspdf->setter('order_number', $worksheet_details[0]['RX_NUMBER']);
            $wspdf->setter('rx_number', $worksheet_details[0]['RX_NUMBER']);
            if (!empty($worksheet_details[0]['RXFILL_ID'])) {
                $wspdf->setter('fill_id', "TK" . $worksheet_details[0]['RXFILL_ID']);
            }
            $wspdf->setter('patient_name', $worksheet_details[1][0]['LASTNAME'] . ' ' . $worksheet_details[1][0]['FIRSTNAME']);
            $wspdf->setter('dob', $worksheet_details[1][0]['BIRTHDATE']);
            $wspdf->setter('patient_phone', $worksheet_details[1][0]['PHONE1']);
            if (!empty($worksheet_details[1][0]['REGADDRESS1'])) {
                $wspdf->setter('patient_address', $worksheet_details[1][0]['REGADDRESS1'] . ',' . $worksheet_details[1][0]['REGCITY']);
            }
            $wspdf->setter('drug_information', $worksheet_details[3][0]['NAME']);
            $wspdf->setter('ingredient_count', '');
            $wspdf->setter('date_filled', date('Y-m-d', strTotime($worksheet_details[0]['FILL_DATE'])));
            $wspdf->setter('refills', $worksheet_details[0]['REFILLS']);
            $wspdf->setter('formula_id', $worksheet_details[0]['FORMULA_ID']);
            $wspdf->setter('due_date', $worksheet_details[0]['RX_DUE_DATE']);
            if (!empty($worksheet_details[4][0]['LOT_NUMBER'])) {
                $wspdf->setter('lot_id', $worksheet_details[4][0]['LOT_NUMBER']);
            }
            $wspdf->setter('days_supply', $worksheet_details[0]['DAYS_SUPPLY']);
            $wspdf->setter('ingredients', $ingr);
            $wspdf->setter('chem_unit', $logmain_res ? $logmain_res[0]['QUANTITY_UNITS']: '');
            $wspdf->setter('log_id', $worksheet_details[0]['LOG_ID']);
            $wspdf->setter('practice', $worksheet_details[2][0]['BUSINESSNAME']);
            $wspdf->setter('provider_name', $worksheet_details[2][0]['LASTNAME'] . ' ' . $worksheet_details[2][0]['FIRSTNAME']);
            $wspdf->setter('provider_phone', $worksheet_details[2][0]['PHONE1']);
            $wspdf->setter('provider_address', $worksheet_details[2][0]['REGADDRESS1'] . ', ' . $worksheet_details[2][0]['REGCITY'] . ', ' . $worksheet_details[2][0]['REGCOUNTY']);
            $wspdf->generatePDF();
        } catch (\Exception $e) {
            echo "Error Occured! " . $e->getMessage();
            die;
        }
    }

    /**
     * To print label.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
     */
    public function labelPrint(Request $req)
    {

        $servername = env('DB_HOST_F');
        $username = env('DB_USERNAME_F');
        $password = env('DB_PASSWORD_F');
        $db = env('DB_DATABASE_F');
        $charset = env('DB_CHARSET_F');
        $port = env('DB_PORT_F');

        try {
            $dsn = "firebird:host=$servername;dbname=$db;port=$port;charset=$charset;";
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rxnumber = $req->input('rx_num');
            $rxdetails = $conn->prepare("SELECT rxm.RX_NUMBER,rxm.PATIENT_ID,rxm.DOCTOR_ID,rxm.FORMULA_ID,rxm.REFILLS,
			rxm.RX_TYPE,rxm.DAW,
			rxf.FILL_DATE,rxf.PHARMACIST_ID,rxf.TECHNICIAN_ID,rxf.LOG_ID,rxf.DAYS_SUPPLY,RX_DUE_DATE,rxf.RXFILL_ID
						FROM RXMAIN AS rxm 
						INNER JOIN RXFILL AS rxf
						ON rxm.RX_NUMBER=rxf.RX_NUMBER and rxm.RX_NUMBER=$rxnumber");
            $rxdetails->execute();
            $worksheet_details = $rxdetails->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($worksheet_details)) {
                $patient = $conn->prepare("SELECT FIRSTNAME,LASTNAME,BIRTHDATE,PHONE1,PHONE2,REGADDRESS1,REGADDRESS2,REGSTATE,REGCITY FROM PATIENT where PATIENT_ID=:PATIENT_ID");
                $patient_id = $worksheet_details[0]['PATIENT_ID'];
                $patient->bindValue(':PATIENT_ID', $patient_id);
                $patient->execute();
                array_push($worksheet_details, $patient->fetchAll(PDO::FETCH_ASSOC));

                $doctor = $conn->prepare("SELECT FIRSTNAME,LASTNAME,BUSINESSNAME,PHONE1,REGADDRESS1,REGADDRESS2,REGCITY,REGCOUNTY,
							SPEEDCODE,MISCID,DEA,NUMBEROFSCRIPTS,NPI,GRID_COLOR,GRID_COLOR_TEXT FROM DOCTOR WHERE DOCTOR_ID=:DOCTOR_ID");
                $DOCTOR_ID = $worksheet_details[0]['DOCTOR_ID'];
                $doctor->bindValue(':DOCTOR_ID', $DOCTOR_ID);
                $doctor->execute();
                array_push($worksheet_details, $doctor->fetchAll(PDO::FETCH_ASSOC));

                $formulas = $conn->prepare("SELECT NAME,CODE,FORM,STRENGTH,ORDER_NUMBER,LOT_NUMBER,STORAGE_INFORMATION,INSTRUCTIONS,EXP_DATE,GENERIC_NAME,GENERIC
					,NUMBER_OF_CHEMICALS,CROSS_CHECK_CODE,COMMON_USES,FORMULA_REFERENCES,GRID_COLOR FROM FORMULA WHERE FORMULA_ID=:FORMULA_ID");
                $formula_id = $worksheet_details[0]['FORMULA_ID'];
                $formulas->bindValue(':FORMULA_ID', $formula_id);
                $formulas->execute();
                array_push($worksheet_details, $formulas->fetchAll(PDO::FETCH_ASSOC));

                $use_by = date('Y-m-d', strtotime($worksheet_details[0]['FILL_DATE'] . ' + ' . $worksheet_details[0]['DAYS_SUPPLY'] . ' day'));

                if (empty($worksheet_details[0]['LOG_ID'])) {
                    return redirect('/print')->with('error', 'Log ID is missing!');
                }
                $logmain = $conn->prepare("SELECT * FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                $log_id = $worksheet_details[0]['LOG_ID'];
                $logmain->bindValue(':LOG_ID', $log_id);
                $logmain->execute();
                array_push($worksheet_details, $logmain->fetchAll(PDO::FETCH_ASSOC));
                $client_name = explode(' ', $worksheet_details[4][0]['ORIG_NAME']);

                if (empty($worksheet_details[0]['FORMULA_ID'])) {
                    return redirect('/print')->with('error', 'Formula ID is missing!');
                }
                $label_matrices = LabelMatrix::where('formula_id', '=', $worksheet_details[0]['FORMULA_ID'])->distinct()->get()->toArray();
                if (empty($label_matrices)) {
                    return redirect('/print')->with('error', 'No label matrix found for this formula ID!');
                }
                if (empty($worksheet_details[4][0]['LOGMAIN_ID'])) {
                    return redirect('/print')->with('error', 'Logmain ID is missing!');
                }
                $logchem = $conn->prepare("SELECT * FROM LOGCHEM where LOGMAIN_ID=:LOGMAIN_ID");
                $logm_id = $worksheet_details[4][0]['LOGMAIN_ID'];
                $logchem->bindValue(':LOGMAIN_ID', $logm_id);
                $logchem->execute();
                $rows_logc = $logchem->fetchAll(PDO::FETCH_ASSOC);
                $ingredients = [];
                foreach ($rows_logc as $row_l) {
                    $chem = $conn->prepare("SELECT * FROM CHEMICAL WHERE CHEMICAL_ID=:CHEMICAL_ID");

                    $chem->bindValue(':CHEMICAL_ID', $row_l['CHEMICAL_ID']);
                    $chem->execute();
                    while ($test = $chem->fetchAll(PDO::FETCH_ASSOC)) {
                        $ingredients[] = $test[0];
                    }
                }
            } else {
                return redirect('/print')->with('error', 'No Rx record found!');
            }
            $lzpl = new LabelZPL();
            $lzpl->setter('rx_number', $rxnumber);
            $lzpl->setter('patient_name', $worksheet_details[1][0]['LASTNAME'] . ' ' . $worksheet_details[1][0]['FIRSTNAME']);
            $lzpl->setter('doctor_name', $worksheet_details[2][0]['LASTNAME'] . ' ' . substr($worksheet_details[2][0]['FIRSTNAME'], 0, 1));
            $lzpl->setter('lot_id', $worksheet_details[4][0]['LOT_NUMBER']);
            $lzpl->setter('patient_dob', $worksheet_details[1][0]['BIRTHDATE']);
            $lzpl->setter('used_by', $use_by);
            if (!empty($label_matrices[0]['client_name'])) {
                $lzpl->setter('client_name', $label_matrices[0]['client_name']);
            }
            $lzpl->setter('label_matrices', $label_matrices);
            $lzpl->generateLabel();
        } catch (\Exception $e) {
            echo "Error Occured! " . $e->getMessage();
            die;
        }
    }
}
