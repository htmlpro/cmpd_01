<?php

namespace App\Helpers;

use PDO;
use Log;
use App\Order;
use App\StageTimeInterval;
use App\OrderStageRelation;
use Carbon\Carbon;
use App\Provider;
use App\State;
use App\Allergy;
use App\Species;
use App\HealthCondition;
use App\User;
use App\Patient;
use App\Formula;
use App\Document;
use App\ProviderType;
use App\Status;
use DB;
use App\Daw;
use App\Schedule;
use App\RxOrigin;
use App\DispatchMethod;
use App\WeightUnit;
use App\PriceManipulation;
use App\Unit;
use Illuminate\Support\Facades\Crypt;
use App\AllQueueSummary;
use App\RefillHistory;
use App\PmpState;
use App\FieldsMaster;
use App\MatrixMaster;
use App\PatientLocationCode;
use App\PKFomula;

class Helpers {

    /**
     * To change order state.
     *
     * @param integer $order_id
     * @param integer $stage_name
     * @return void
     */
    public static function changeStage($order_id, $stage_name) {

        Order::where('id', $order_id)
                ->update(['stage_name' => $stage_name]);
        StageTimeInterval::create([
            'order_id' => $order_id,
            'stage' => trans('messages.order_entry'),
            'updated_by' => auth()->user()->id,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    /**
     * To get PK connection.
     *
     * @return boolean|$connect
     */
    public static function pkConnection() {
        $servername = config('constant.DB_HOST_F');
        $username = config('constant.DB_USERNAME_F');
        $password = config('constant.DB_PASSWORD_F');
        $db = config('constant.DB_DATABASE_F');
        $charset = config('constant.DB_CHARSET_F');
        $port = config('constant.DB_PORT_F');
        $dsn = "firebird:host=$servername;dbname=$db;port=$port;charset=$charset;";
        $connect = new PDO($dsn, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return($connect);
    }

    /**
     * To get no of count on each stages.
     *
     * @param interger $stage
     * @return integer|$rec_count
     */
    public static function getRecordCount($stage) {
        try {
            if ($stage == 'all') {
                $rec_count = OrderStageRelation::count();
            } elseif ($stage == 2 || $stage == 1) {
                $rec_count = OrderStageRelation::groupBy('order_id')
                        ->select('id')
                        ->where('stage', $stage)
                        ->get();
                $rec_count = count($rec_count);
            } else {
                $rec_count = OrderStageRelation::where('stage', $stage)
                        ->count();
            }
            return $rec_count;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get providers details by provider type.
     *
     * @param interger $provider_type
     * @return array|$providers
     */
    public static function getProviders($provider_type) {
        try {
            if (isset($provider_type)) {
                $providers = Provider::select('id', 'first_name', 'last_name')
                        ->whereIn('provider_status', $provider_type)
                        ->get()
                        ->toArray();
                return $providers;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get all formula's from PK.
     *
     * @return array|$formula_data
     */
    public static function getAllPKFormula() {
        $conn = Helpers::pkConnection();
        $formula = $conn->prepare(
                "SELECT FORMULA_ID,ACTIVATED,NAME,CODE,GENERIC_NAME,FORM,TOTAL_QTY_USED,"
                . "THERAPEUTIC_CLASS,DEFAULT_DAYS_SUPPLY,SCHEDULE,EXP_DATE,DAYS_TO_EXP_DATE,"
                . "LOT_NUMBER,PRICE_CODE_1,UNIT_COST,SPEEDCODE FROM FORMULA WHERE ACTIVATED='T'"
        );
        $formula->execute();
        $formula_details = $formula->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($formula_details)) {
            foreach ($formula_details as $key => $val) {
                $formula_data[$val['FORMULA_ID']] = !empty($val['NAME']) ? $val['NAME'] . '-' . $val['SPEEDCODE'] . '-' . $val['FORMULA_ID'] : '';
            }
            return $formula_data;
        }
    }

    /**
     * To get all states.
     * @param integer $type
     *
     * return array|$state_data
     */
    public static function getAllStates($type = '') {
        $states = State::whereStatus(1)->get()->toArray();
        $states_data=[];
        if (!empty($states)) {
            if ($type != '') {
                if (!empty($states)) {
                    foreach ($states as $key => $val) {
                        $states_data[$val['postal_code']] = $val['name'];
                    }
                }
            } else {
                $states_data = $states;
            }
            return $states_data;
        }
    }

    /**
     * To get all Allergies.
     *
     * @param string $type.
     * return array|$allergy_data
     */
    public static function getAllAllergies($type = '') {
        $allergies = Allergy::all()->toArray();
        $allergies_data=[];
        if ($type != '') {
            if (!empty($allergies)) {
                foreach ($allergies as $key => $val) {
                    $allergies_data[$val['id']] = $val['description'];
                }
            }
        } else {
            $allergies_data = $allergies;
        }
        return $allergies_data;
    }

    /**
     * To get all Species.
     *
     * @param string $type.
     * return array|$species_data
     */
    public static function getAllSpecies($type = '') {
        $species = Species::all()->toArray();
        $species_data=[];
        if ($type != '') {
            if (!empty($species)) {
                foreach ($species as $key => $val) {
                    $species_data[$val['id']] = $val['species'];
                }
            }
        } else {
            $species_data = $species;
        }
        return $species_data;
    }

    /**
     * To get all Health Conditions.
     *
     * @param string $type.
     * return array|$health_data
     */
    public static function getAllHealthConditions($type = '') {

        $health_conditions = HealthCondition::all()->toArray();
        $health_data=[];
        if ($type != '') {
            if (!empty($health_conditions)) {
                foreach ($health_conditions as $key => $val) {
                    $health_data[$val['id']] = $val['health'];
                }
            }
        } else {
            $health_data = $health_conditions;
        }
        return $health_data;
    }

    /**
     * To get all Users.
     *
     * return array|$user_data
     */
    public static function getUsers() {
        $users = User::all()->toArray();
        if (!empty($users)) {
            foreach ($users as $key => $val) {
                $user_data[$val['id']] = $val['name'];
            }
            return $user_data;
        }
    }

    /**
     * To get all Patients.
     *
     * @param string $type
     * return array|$patient_data
     */
    public static function getAllPatients($type = '') {
        $patients = Patient::all()->toArray();
        if (!empty($patients)) {
            if ($type != '') {
                if (!empty($patients)) {
                    foreach ($patients as $key => $val) {
                        $patient_data[$val['id']] = Crypt::decrypt($val['first_name']) .
                                " " . Crypt::decrypt($val['last_name']) . " (" . date('n/j/Y', strTotime(Crypt::decrypt($val['dob']))) . ")";
                    }
                }
            } else {
                $patient_data = $patients;
            }
            return $patient_data;
        }
    }

    /**
     * To get all Formulas.
     *
     * @param string $type.
     * return array|$formula_data
     */
    public static function getAllFormulas($type = '') {
        $formulas = Formula::select('formula_id', 'formula_name')
                ->get()
                ->toArray();
        if (!empty($formulas)) {
            if ($type != '') {
                if (!empty($formulas)) {
                    foreach ($formulas as $key => $val) {
                        $formula_data[$val['formula_id']] = $val['formula_name'];
                    }
                }
            } else {
                $formula_data = $formulas;
            }
            return $formula_data;
        }
    }

    /**
     * To get all providers.
     *
     * @param string $type.
     * @return array|$provider_data
     */
    public static function getAllProviders($type = '') {
        try {
            $providers = DB::table('providers')
                    ->select('id', 'first_name', 'last_name')
                    ->get()
                    ->toArray();
             $provider_data=[];       
            if (!empty($providers)) {
                if ($type != '') {
                    if (!empty($providers)) {
                        foreach ($providers as $key => $val) {
                            $provider_data[$val->id] = $val->first_name . " " . $val->last_name;
                        }
                    }
                } else {
                    $provider_data = $providers;
                }
                return $provider_data;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get Status.
     *
     * @param array $status_id.
     * return array|$status
     */
    public static function getStatus($status_id = []) {
        if (!empty($status_id)) {
            $status = Status::whereIn('id', $status_id)
                    ->get()
                    ->toArray();
            return $status;
        }
    }

    /**
     * To get all documents.
     *
     * @param string $type.
     * return array|$document_data
     */
    public static function getAllDocuments($type = '') {

        $documents = Document::select('id', 'name','pmp_code')
                ->get()
                ->toArray();
         $document_data=[];       
        if ($type != '') {
            if (!empty($documents)) {
                foreach ($documents as $key => $val) {
                    if($type=='assoc'){
                        $document_data[$val['id']] = $val['name'];
                    }else{
                        $document_data[$val['pmp_code']] = $val['name'];
                    }
                }
            }
        } else {
            $document_data = $documents;
        }
        return $document_data;
    }

    /**
     * To get all Provider Types.
     *
     * @param string $type.
     * return array|$provider_type_data
     */
    public static function getAllProviderTypes($type = '') {

        $provider_types = ProviderType::select('id', 'type')
                ->get()
                ->toArray();
        if (!empty($provider_types)) {
            if ($type != '') {
                if (!empty($provider_types)) {
                    foreach ($provider_types as $key => $val) {
                        $provider_type_data[$val['id']] = $val['type'];
                    }
                }
            } else {
                $provider_type_data = $provider_types;
            }
            return $provider_type_data;
        }
    }

    /* To get all DAW's.
     *
     * @param string $type.
     * return array|$daw_data
     */

    public static function getAllDaws($type = '') {

        $daws = Daw::all()
                ->toArray();
        if (!empty($daws)) {
            if ($type != '') {
                if (!empty($daws)) {
                    foreach ($daws as $key => $val) {
                        $daw_data[$val->id] = $val->description;
                    }
                }
            } else {
                $daw_data = $daws;
            }
            return $daw_data;
        }
    }

    /* To get all Schedule's.
     *
     * @param string $type.
     * return array|$schedule_data
     */

    public static function getAllSchedules($type = '') {

        $schedule = Schedule::all()
                ->toArray();
        if (!empty($schedule)) {
            if ($type != '') {
                if (!empty($schedule)) {
                    foreach ($schedule as $key => $val) {
                        $schedule_data[$val->id] = $val->code;
                    }
                }
            } else {
                $schedule_data = $schedule;
            }
            return $schedule_data;
        }
    }

    /* To get all Unit's.
     *
     * @param string $type.
     * return array|$unit_data
     */

    public static function getAllUnits($type = '') {

        $unit = Unit::all()
                ->toArray();
        if (!empty($unit)) {
            if ($type != '') {
                if (!empty($unit)) {
                    foreach ($unit as $key => $val) {
                        $unit_data[$val->id] = $val->code . " " . $val->description;
                    }
                }
            } else {
                $unit_data = $unit;
            }
            return $unit_data;
        }
    }

    /* To get all RxOrigin's.
     *
     * @param string $type.
     * return array|$origin_data
     */

    public static function getAllRxOrigins($type = '') {

        $origin = RxOrigin::all()
                ->toArray();
        if (!empty($origin)) {
            if ($type != '') {
                if (!empty($origin)) {
                    foreach ($origin as $key => $val) {
                        $origin_data[$val->id] = $val->rx_origin_desc;
                    }
                }
            } else {
                $origin_data = $origin;
            }
            return $origin_data;
        }
    }

    /* To get all Dispatch Method's.
     *
     * @param string $type.
     * return array|$method_data
     */

    public static function getAllDispatchMethods($type = '') {
        $methods = DispatchMethod::all()
                ->toArray();
        $method_data=[];
        if (!empty($methods)) {
            if ($type != '') {
                if (!empty($methods)) {
                    foreach ($methods as $key => $val) {
                        $method_data[$val['id']] = $val['dispatch_method'];
                    }
                }
            } else {
                $method_data = $methods;
            }
            return $method_data;
        }
    }

    /* To get all Weight Unit's.
     *
     * @param string $type.
     * return array|$weight_data
     */

    public static function getAllWeightUnits($type = '') {
        $weight_unit = WeightUnit::all()
                ->toArray();
        if (!empty($weight_unit)) {
            if ($type != '') {
                if (!empty($weight_unit)) {
                    foreach ($weight_unit as $key => $val) {
                        $weight_data[$val['id']] = $val['code'] . " " . $val['description'];
                    }
                }
            } else {
                $weight_data = $weight_unit;
            }
            return $weight_data;
        }
    }

    /**
     * To get PK Formula Price.
     *
     * @param integer $formula_id
     * @return double|$price formula price.
     */
    public static function getPkFormulaPrice($formula_id) {
        if (!empty($formula_id)) {
            $conn = Helpers::pkConnection();
            $formula_price = $conn->prepare("SELECT FORMCOST_ID,FORMULA_ID, "
                    . "CAST(PRICE AS NUMERIC(15,2)) AS PRICE FROM FORMCOST "
                    . "WHERE FORMULA_ID =:FORMULA_ID");
            $formula_price->bindValue(':FORMULA_ID', $formula_id);
            $formula_price->execute();
            $price = $formula_price->fetchAll(PDO::FETCH_ASSOC);
            return $price;
        }
    }

    /**
     * To get price from manipulation table.
     *
     * @param integer $provider_id
     * @param integer $formula_id
     * @return array|$formula_price formula price.
     */
    public static function getManipualtionPrice($provider_id = '', $formula_id = '') {
        if (!empty($provider_id) && !empty($formula_id)) {
            $formula_price = PriceManipulation::select('price')
                    ->where(['provider_id' => $provider_id, 'formula_id' => $formula_id])
                    ->get()
                    ->toArray();
            return $formula_price;
        }
    }

    /**
     * To get provider details by provider id.
     *
     * @param integer $provider_id
     * @return array|$provider_detail provider detail.
     */
    public static function getProvierDetail($provider_id) {
        if (!empty($provider_id)) {
            $provider_detail = Provider::select('provider_corporation', 'client', 'first_name', 'last_name', 
                    'reg_address1', 'reg_address2', 'reg_city', 'reg_state', 'reg_zip', 'reg_country', 'phone1', 'email', 'dea')
                    ->where('id', $provider_id)
                    ->get()
                    ->toArray();
            return $provider_detail;
        }
    }

    /**
     * To get all providers with address.
     *
     * @return array|$provider_with_address
     */
    public static function getAllProvidersWithAddress() {
        try {
            $providers = DB::table('providers')
                    ->select('*')
                    ->get()
                    ->toArray();
            if (!empty($providers)) {
                foreach ($providers as $key => $val) {
                    $dea = '';
                    if (!empty($val->reg_address1) && !empty($val->dea)) {
                        $dea = "(" . $val->dea . ")" . ' ' . "(" . $val->reg_address1 . ' ' . $val->reg_city . ' ' . $val->reg_state . ' ' . $val->reg_zip . ")";
                    } elseif (!empty($val->reg_address1)) {
                        $dea = "(" . $val->reg_address1 . ' ' . $val->reg_city . ' ' . $val->reg_state . ' ' . $val->reg_zip . ")";
                    } elseif (!empty($val->dea)) {
                        $dea = "(" . $val->dea . ")";
                    }
                    $provider_with_address[$val->id] = $val->first_name . " " . $val->last_name . ' ' . $dea;
                }
                return $provider_with_address;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get all status.
     *
     * @return array|$status_data
     */
    public static function getAllStatus() {
        $status = Status::all()
                ->toArray();
        if (!empty($status)) {
            foreach ($status as $key => $val) {
                $status_data[$val['value']] = $val['name'];
            }
            return $status_data;
        }
    }

    /**
     * To get first letter of each word
     *
     * @param string|$str
     * @return string|$result
     */
    public static function firstLetter($str) {
        $arr = array_filter(array_map('trim', explode(' ', $str)));
        $result = '';
        foreach ($arr as $v) {
            $result .= $v[0];
        }
        return $result;
    }

    /**
     * To get first fixed number of words from long string
     *
     * @param string|$str
     * @param string|$word_count
     * @return string|$world
     */
    public static function firstWords($str, $word_count) {
        if (!empty($str)) {
            $arr = explode(" ", str_replace(",", ", ", $str));
            dd($arr);
            for ($index = 0; $index < $word_count; $index++) {
                $word[] = $arr[$index] . " ";
            }
        } else {
            $word[] = '';
        }
        return implode(' ', $word);
    }

    /**
     * To get LOG details from PK
     *
     * @param integer|$log_id
     * @return array|$logmain_details
     */
    public static function pkLogDetails($log_id) {
        try {
            if (!empty($log_id)) {
                $conn = Helpers::pkConnection();
                $logmain = $conn->prepare("SELECT * FROM LOGMAIN WHERE LOGMAIN_ID=:LOG_ID");
                $logmain->bindValue(':LOG_ID', $log_id);
                $logmain->execute();
                $logmain_details = $logmain->fetchAll(PDO::FETCH_ASSOC);
            }
            return $logmain_details;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To client logo.
     *
     * @param integer $client_id
     * @return string|$client_logo
     */
    public static function getClientLogo($client_id) {
        try {
            if (!empty($client_id)) {
                $client_logo = DB::table('providers')
                        ->select('logo')
                        ->where('id', $client_id)
                        ->get()
                        ->toArray();
                return $client_logo;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get all formula's from PK by id.
     *
     * @param integer $formula_id
     * @return array|$formula_data
     */
    public static function getPKFormulaById($formula_id) {
        if (!empty($formula_id)) {
            $conn = Helpers::pkConnection();
            $formula = $conn->prepare(
                    "SELECT FORMULA_ID,ACTIVATED,NAME,CODE,GENERIC_NAME,FORM,STRENGTH,"
                    . "THERAPEUTIC_CLASS,"
                    . "LOT_NUMBER,SPEEDCODE FROM FORMULA WHERE FORMULA_ID =:FORMULA_ID"
            );
            $formula->bindValue(':FORMULA_ID', $formula_id);
            $formula->execute();
            $formula_details = $formula->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($formula_details)) {
                return $formula_details;
            }
        }
    }

    /**
     * To wrap words
     * 
     * @param string|$string
     * @return array|$wrapped_word
     */
    public static function wrapWord($string, $type) {
        if (!empty($string)) {
            $lines = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
            $i = 0;
            $first_string = '';
            $second_string = '';
            $third_string = '';
            if ($type == 'SIG') {
                $max_char = 35;
            } else {
                $max_char = 31;
            }
            foreach ($lines as $lin) {
                if ($i < $max_char) {
                    $first_string .= $lin;
                } else if ($i < ($max_char * 2)) {
                    $second_string .= $lin;
                } else if ($i < ($max_char * 3)) {
                    $third_string .= $lin;
                }
                $i++;
            }
            $wrapped_word = ['first_string' => $first_string, 'second_string' => $second_string, 'third_string' => $third_string];
            return $wrapped_word;
        }
    }
    
    /**
     * To get patient details by patient id.
     *
     * @param integer $patient_id
     * @return array|$patient_detail patient detail.
     */
    public static function getPatientDetail($patient_id) {
        if (isset($patient_id)) {
            $patient_detail = Patient::select('id', 'first_name', 'last_name', 'dob', 'address1', 'address2', 'city', 'state', 'zip', 'phone', 'gender')
                    ->where('id', $patient_id)
                    ->get()
                    ->toArray();
            if (!empty($patient_detail)) {
                return $patient_detail;
            }
        }
    }
    
    /**
     * To get dispatch method by id.
     *
     * @param integer $dispatch_id
     * @return array|$dispatch_method dispatch detail.
     */
    public static function getDispatchDetailById($dispatch_id) {
        if (isset($dispatch_id)) {
            $dispatch_method = DispatchMethod::where(['id' => $dispatch_id])
                    ->get(['dispatch_method'])
                    ->toArray();
            if(!empty($dispatch_method)){
                return $dispatch_method;
            }
        }
    }
    
    /**
     * To get PK formula by id.
     *
     * @param integer $formula_id
     * @return array|$formula_data PK formula detail.
     */
    public static function getActivePKFormulaById($formula_id) {
        if (isset($formula_id)) {
            $conn = Helpers::pkConnection();
            $formula = $conn->prepare(
                    "SELECT FORMULA_ID,ACTIVATED,NAME,CODE,GENERIC_NAME,FORM,TOTAL_QTY_USED,"
                    . "THERAPEUTIC_CLASS,DEFAULT_DAYS_SUPPLY,SCHEDULE,EXP_DATE,DAYS_TO_EXP_DATE,"
                    . "LOT_NUMBER,PRICE_CODE_1,UNIT_COST,SPEEDCODE,STRENGTH,COMPOUNDED_IN_STORE FROM FORMULA WHERE FORMULA_ID =:FORMULA_ID"
            );
            $formula->bindValue(':FORMULA_ID', $formula_id);
            $formula->execute();
            $formula_details = $formula->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($formula_details)) {
                return $formula_details;
            }
        }
    }
    
    /**
     * To get PK chemical units.
     *
     * @param integer $formula_id
     * @return array|$formula_data PK formula detail.
     */
    public static function getChemicalUnits(){
        $conn = Helpers::pkConnection();
        $units = $conn->prepare(
                "SELECT UNIT_ID,CODE FROM UNITS"
        );
        $units->execute();
        $chemical_units = $units->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($chemical_units)){
            foreach($chemical_units as $key => $value){
                $unit_arr[$value['UNIT_ID']] = $value['CODE'];
            }
            return $unit_arr;
        }
    }
    
    /**
     * To convert UTC time to CST.
     *
     * @param timestamp $timestamp
     * @return timestamp.
     */
    public static function convertToCST($timestamp, $type = '') {
        if (isset($timestamp)) {
            // create old time
            $d = new \DateTime($timestamp, new \DateTimeZone('UTC'));
            // convert to new tz
            $d->setTimezone(new \DateTimeZone('CST'));
            // output with new format
            if($type == ''){
                return $d->format('Y-m-d H:i:s');
            } else {
                return $d->format('Y-m-d H:i');
            }
        }
    }
    
    /**
     * To get rx ingredient count.
     *
     * @param integer $logm_id
     * @return array|$ingr
     */
    public static function getIngredientCount($logm_id) {
        
        if (isset($logm_id)) {
            $conn = Helpers::pkConnection();
            $ingredients = $conn->prepare("SELECT logc.QUANTITY_USED,logc.EXP_DATE,logc.CHEMICAL_ID,
                        logc.LOT_NUMBER, chem.NAME,chem.FORM,chem.STRENGTH,chem.EXP_DATE FROM LOGCHEM AS logc 
                        INNER JOIN CHEMICAL AS chem ON logc.CHEMICAL_ID=chem.CHEMICAL_ID 
                        WHERE LOGMAIN_ID=:LOGMAIN_ID  AND logc.QUANTITY_USED > 0.0000");
            $logm_id = $logm_id;
            $ingredients->bindValue(':LOGMAIN_ID', $logm_id);
            $ingredients->execute();
            $ingr = $ingredients->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($ingr)) {
                return $ingr;
            }
        }
    }
    
    /**
     * Save new prescription details into summary table.
     * 
     * @param array|$data
     * @param integer|$stage_id
     * @param integer|$provider_id
     * @param array|$formula_details
     * @param string|$rx_id'
     * @param integer|$allowed_refill
     * @paran float|$remaining_refill
     * 
     * @return void
     */
    public static function savePrescription($data = [], $stage_id, $formula_details, $rx_id, $allowed_refill, $remaining_refill) {
        if (!empty($data)) {
            $order_dtl = AllQueueSummary::where(['order_id' => $data['order_id']])
                    ->get(['stage', 'date_received', 'provider_id', 'provider', 'doctor_address1', 'doctor_address2', 'doctor_city', 'doctor_state', 'doctor_zip', 
                        'doctor_dea', 'doctor_phone', 'doctor_email', 'patient_id', 'patient', 'dob', 'client', 'patient_lastname', 'patient_address1', 'patient_address2',
                        'patient_city', 'patient_state', 'patient_zip', 'patient_gender', 'patient_phone', 'tech'])
                    ->toArrAY();
            if (!empty($order_dtl)) {
                $get_status = Status::where(['id' => $stage_id])
                        ->get(['name'])
                        ->toArray();
                $daw = Daw::where(['code' => $data['daw']])
                        ->get(['description'])
                        ->toArray();
                $schedule = Schedule::where(['id' => $data['schedule']])
                        ->get(['code'])
                        ->toArray();
                if ($formula_details[0]['COMPOUNDED_IN_STORE'] == 'C') {
                    $ingr = Helpers::getIngredientCount($data['log_id']);
                }
                $user = User::where(['id' => $data['log_id']])
                        ->get(['name'])
                        ->toArray();
                AllQueueSummary::create([
                    'stage' => $get_status ? $get_status[0]['name'] : '',
                    'stage_id' => $stage_id,
                    'stage_change_at' => Carbon::now(),
                    'date_received' => $order_dtl[0]['date_received'],
                    'order_id' => $data['order_id'],
                    'provider' => $order_dtl[0]['provider'],
                    'provider_id' => $order_dtl[0]['provider_id'],
                    'doctor_address1' => $order_dtl[0]['doctor_address1'],
                    'doctor_address2' => $order_dtl[0]['doctor_address2'],
                    'doctor_city' => $order_dtl[0]['doctor_city'],
                    'doctor_state' => $order_dtl[0]['doctor_state'],
                    'doctor_zip' => $order_dtl[0]['doctor_zip'],
                    'doctor_dea' => $order_dtl[0]['doctor_dea'],
                    'doctor_phone' => $order_dtl[0]['doctor_phone'],
                    'doctor_email' => $order_dtl[0]['doctor_email'],
                    'patient_id' => $order_dtl[0]['patient_id'],
                    'patient' => $order_dtl[0]['patient'],
                    'patient_lastname' => $order_dtl[0]['patient_lastname'],
                    'patient_address1' => $order_dtl[0]['patient_address1'],
                    'patient_address2' => $order_dtl[0]['patient_address2'],
                    'patient_city' => $order_dtl[0]['patient_city'],
                    'patient_state' => $order_dtl[0]['patient_state'],
                    'patient_zip' => $order_dtl[0]['patient_zip'],
                    'patient_gender' => $order_dtl[0]['patient_gender'],
                    'patient_phone' => $order_dtl[0]['patient_phone'],
                    'dob' => $order_dtl[0]['dob'],
                    'date_entered' => Carbon::now(),
                    'fill_number' => $data['rx_fill_number'],
                    'supply' => $data['supply'],
                    'fill_date' => date('Y-m-d', strtoTime($data['refill_date'])),
                    'day_written' => date('Y-m-d', strtoTime($data['date_written'])),
                    'daw' => $daw ? $daw[0]['description'] : '',
                    'qty' => $data['quantity_dispensed'],
                    'medication' => $formula_details ?  $formula_details[0]['NAME'] . '-' . $formula_details[0]['SPEEDCODE'] . '-' . $formula_details[0]['FORMULA_ID'] : '',
                    'schedule' => $schedule ? $schedule[0]['code'] : '',
                    'insurance' => $data['third_party'],
                    'sig' => $data['sig'],
                    'formula_id' => $data['formula'],
                    'therapeutic_class' => $formula_details ? $formula_details[0]['THERAPEUTIC_CLASS'] : '',
                    'drugspeed_code' => $formula_details ? $formula_details[0]['SPEEDCODE'] : '',
                    'drug_strength' => $formula_details ? $formula_details[0]['STRENGTH'] : '',
                    'drug_from' =>  $formula_details ? $formula_details[0]['FORM'] : '',
                    'rx_id' => $rx_id,
                    'dob' => $order_dtl[0]['dob'],
                    'client' => $order_dtl[0]['client'],
                    'refills' => $allowed_refill,
                    'refills_rem' => $remaining_refill,
                    'location_name' => 'Riteawayallergy',
                    'ingredient_count' => isset($ingr) ? count($ingr) : '',
                    'log' => $data['log_id'],
                    'tech' => $order_dtl[0]['tech'],
                    'total_price' => $data['total_price'] 
                ]);
            }
        }
    }
    
    /**
     * Update existing prescription details into summary table.
     * 
     * @param array|$data
     * @param array|$formula_details
     * @param string|$rx_id
     * @param integer|$allowed_refill
     * @param float|$remaining_refill'
     * 
     * @return void
     */
    public static function updatePrescription($data = [], $formula_details, $rx_id, $allowed_refill, $remaining_refill) {
        if (!empty($data)) {
            $daw = Daw::where(['code' => $data['daw']])
                    ->get(['description'])
                    ->toArray();
            $schedule = Schedule::where(['id' => $data['schedule']])
                    ->get(['code'])
                    ->toArray();
            if ($formula_details[0]['COMPOUNDED_IN_STORE'] == 'C') {
                $ingr = Helpers::getIngredientCount($data['log_id']);
            }
            AllQueueSummary::where('order_id',  $data['order_id'])
                    ->update([
                        'rx_id' => $rx_id,
                        'date_entered' => Carbon::now(),
                        'fill_number' => $data['rx_fill_number'],
                        'supply' => $data['supply'],
                        'fill_date' => date('Y-m-d', strtoTime($data['refill_date'])),
                        'day_written' => date('Y-m-d', strtoTime($data['date_written'])),
                        'daw' => $daw ? $daw[0]['description'] : '',
                        'qty' => $data['quantity_dispensed'],
                        'medication' => $formula_details ? $formula_details[0]['NAME'] . '-' . $formula_details[0]['SPEEDCODE'] . '-' . $formula_details[0]['FORMULA_ID'] : '',
                        'schedule' => $schedule ? $schedule[0]['code'] : '',
                        'insurance' => $data['third_party'],
                        'sig' => $data['sig'],
                        'formula_id' => $data['formula'],
                        'therapeutic_class' => $formula_details ? $formula_details[0]['THERAPEUTIC_CLASS'] : '',
                        'drugspeed_code' => $formula_details ? $formula_details[0]['SPEEDCODE'] : '',
                        'drug_strength' => $formula_details ? $formula_details[0]['STRENGTH'] : '',
                        'drug_from' => $formula_details ? $formula_details[0]['FORM'] : '',
                        'refills' => $allowed_refill,
                        'refills_rem' => $remaining_refill,
                        'ingredient_count' => isset($ingr) ? count($ingr) : '',
                        'log' => $data['log_id'],
                        'total_price' => $data['total_price'],
                        'location_name' => 'Riteawayallergy'
            ]);
        }
    }
   /**
     * To get pmp state.
     * @return array|$list
    */
    public static function getPmpState(){
        $list = State::select('postal_code','license_no','name')->where('pmp_status',1)->get();
        return $list;
    }

     /**
     * To get pmp fields.
     * @return array|$list
    */
    public static function getPmpFields(){
        $list = MatrixMaster::select('field_code')->groupBy('field_code')->orderBy('id','Asc')->get();
        return $list;
    }
    /**
     * To get field type list.
     * @return array|$arr
    */
    public static function fieldTypeList(){
        $arr = [
            "C"=>"C",
            "O"=>"O",
            "P"=>"P",
            "N"=>"N",
            "R"=>"R",
            "RR"=>"RR",
            "CS2*"=>"CS2*",
            "S"=>"S",
            ""=>"",
        ];
        return $arr;
    }
    
   
    /**
     * To get pmp state version.
     * @return integer|version
    */
    public static function getPmpStateVersion($state_id){
        $list = MatrixMaster::select('version')->where('pmp_state_code',$state_id)->groupBy('pmp_state_code')->first();
        return $list->version??'';
    }
    /**
     * To get pmp matrix field type.
     * @return string|field_type
    */
    public static function getPmpMatrixData($state_id,$field_id){
        $list = MatrixMaster::select('field_type')->where('pmp_state_code',$state_id)->where('field_code',$field_id)->first();
        return $list->field_type??'';
    }
    /**
     * To get pmp matrix field rule.
     * @return string|rule
    */
    public static function getPmpMatrixRule($state_id,$field_id){
        $list = MatrixMaster::select('rule')->where('pmp_state_code',$state_id)->where('field_code',$field_id)->first();
        return $list->rule??'';
    }
    /**
     * To get patient location code.
     * @param string $type.
     * return array|$location_data
     */
    public static function getPatientLocationCode($type='') {

        $location_code = PatientLocationCode::select('id', 'name','code')
                ->get()
                ->toArray();
                $location_data=[];       
                if ($type != '') {
                    if (!empty($location_code)) {
                        foreach ($location_code as $key => $val) {   
                            $location_data[$val['code']] = $val['name'];
                    }
                }
                } else {
                    $location_data = $location_code;
                }
        return $location_data;
    }


     /**
     * To get all formula's from All queue.
     *
     * @return array|$formula_data
     */
    public static function getAllFormula() {
       $formula_details = PKFomula::get();
        if (!empty($formula_details)) {
            foreach ($formula_details as $key => $val) {
                $formula_data[$val['formula_id']] = !empty($val['formula_name']) ? $val['formula_name'] : '';
            }
            return $formula_data;
        }
    }
   
}