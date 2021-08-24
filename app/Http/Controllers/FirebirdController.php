<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDO;

class FirebirdController extends Controller
{

    public function index()
    {
        $servername = '3.23.89.104';
        $username = 'sysdba';
        $password = 'masterkey';
        $db = '3.23.89.104:C:\PKS5\Data\cmpdwin.pkf';
        $charset = 'utf-8';
        $port = '3050';
        try {
            $dsn = "firebird:host=$servername;dbname=$db;port=$port;charset=$charset;";
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rxnumber = 7117431;
            $worksheet_details = [];
            $rxdetails = $conn->prepare("SELECT rxm.RX_NUMBER,rxm.PATIENT_ID,rxm.DOCTOR_ID,rxm.FORMULA_ID,rxm.REFILLS,
			rxm.RX_TYPE,rxm.DAW,
			rxf.FILL_DATE,rxf.PHARMACIST_ID,rxf.TECHNICIAN_ID,rxf.LOG_ID,rxf.DAYS_SUPPLY,RX_DUE_DATE,rxf.RXFILL_ID
						FROM RXMAIN AS rxm 
						INNER JOIN RXFILL AS rxf
						ON rxm.RX_NUMBER=rxf.RX_NUMBER and rxm.RX_NUMBER=$rxnumber");

            $rxdetails->execute();
            $worksheet_details = $rxdetails->fetchAll(PDO::FETCH_ASSOC);
            $patient = $conn->prepare("SELECT FIRSTNAME,LASTNAME,BIRTHDATE,PHONE1,REGADDRESS1,REGADDRESS2,REGSTATE,REGCITY FROM PATIENT where PATIENT_ID=:PATIENT_ID");
            $patient_id = $worksheet_details[0]['PATIENT_ID'];
            $patient->bindValue(':PATIENT_ID', $patient_id);
            $patient->execute();
            array_push($worksheet_details, $patient->fetchAll(PDO::FETCH_ASSOC));

            $doctor = $conn->prepare("SELECT FIRSTNAME,LASTNAME FROM DOCTOR where DOCTOR_ID=:DOCTOR_ID");
            $DOCTOR_ID = $worksheet_details[0]['DOCTOR_ID'];
            $doctor->bindValue(':DOCTOR_ID', $DOCTOR_ID);
            $doctor->execute();
            array_push($worksheet_details, $doctor->fetchAll(PDO::FETCH_ASSOC));

            $formulas = $conn->prepare("SELECT NAME,CODE,FORM,STRENGTH,ORDER_NUMBER,STORAGE_INFORMATION,INSTRUCTIONS FROM formula where FORMULA_ID=:FORMULA_ID");
            $formula_id = $worksheet_details[0]['FORMULA_ID'];
            $formulas->bindValue(':FORMULA_ID', $formula_id);
            $formulas->execute();
            array_push($worksheet_details, $formulas->fetchAll(PDO::FETCH_ASSOC));

            $logmain = $conn->prepare("SELECT LOGCHEM_ID,LOGMAIN_ID,LOT_NUMBER,DISPLAY_ORDER_ID,CHEMICAL_ID,ACTIVE_INGREDIENT,INGREDIENT_NDC FROM LOGCHEM where LOGMAIN_ID=:LOG_ID");
            $log_id = $worksheet_details[0]['LOG_ID'];
            $logmain->bindValue(':LOG_ID', $log_id);
            $logmain->execute();
            $rows_log = $logmain->fetchAll(PDO::FETCH_ASSOC);
            array_push($worksheet_details, $logmain->fetchAll(PDO::FETCH_ASSOC));

            foreach ($rows_log as $row_l) {
                $chem = $conn->prepare("SELECT CODE,NAME,GENERIC_NAME,PURITY,STRENGTH,SCHEDULE,NDC,CURRENT_LOTNUMBER FROM CHEMICAL WHERE CHEMICAL_ID=:CHEMICAL_ID");
                $chem->bindValue(':CHEMICAL_ID', $row_l['CHEMICAL_ID']);
                $chem->execute();
                $rows_chem[] = $chem->fetchAll(PDO::FETCH_ASSOC);
            }
            array_push($worksheet_details, $rows_chem);
        } catch (PDOException $e) {
            echo "Connection Failed!" . $e->getMeassage();
        }
    }
}
