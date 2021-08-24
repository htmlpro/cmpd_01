<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use phpseclib\Net\SFTP;
use App\Prescription;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\Helpers;
use PDO;
use App\PmpDispenserLog;
use App\PmpMatrixCronStatus;
use App\PharmacyInfo;
use Carbon\Carbon;
use Log;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use File;
use App\OrderHistory;
use App\Dispatch;

class PmpDispenserGuide extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attachment:pmpdispenser';
    public $conn;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send RX to PMP dispender';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->conn = Helpers::pkConnection();
    }

    /**
     * Execute the console command(To send prescriptions to ASAP).
     *
     * @return mixed
     */
    public function handle() {
        try {
            $url = config('constant.PMP_SFTP_URL');
            $user = config('constant.PMP_SFTP_USER');
            $password = config('constant.PMP_SFTP_PASSWORD');
            $site_name = config('constant.ZERO_REPORT_SITE_NAME');
            $cst_date_time = Helpers::convertToCST(date('Y-m-d H:i'), 'time');
            $cst_arr = explode(' ', $cst_date_time);
            $cst_date = $cst_arr[0];
            $cst_time = $cst_arr[1];
            $date_string = preg_replace('/-|:/', null, $cst_date);
            $time_string = preg_replace('/-|:/', null, $cst_time);
            DB::beginTransaction();
            $states = Helpers::getPmpState();
            $pharmacyInfo = PharmacyInfo::first();
            $header = '';
            if (!$states->isEmpty()):
                foreach ($states as $key => $eachState):
                    $file_name = $site_name . $date_string . $eachState->postal_code . ".dat";
                    $file_path = public_path() . "/pmp/" . $eachState->postal_code . '/' . $file_name;
                    $pres = Prescription::with('order:id,order_id')
                            ->with('order.patient:id,last_name,middle_name,first_name,address1,address2,species,city,state,phone,zip,dob,gender,identification,identification_number,name_suffix,name_prefix,animal_name,country_of_non_us,location_code,additional_identification_number,additional_identification_type')
                            ->with('order.provider:id,dea,last_name,first_name,middle_name,phone1,npi,statelicense')
                            ->with('order.patient.document:id,pmp_code')
                            ->with('order.patient.species:id,pmp_code')
                            ->with('daw:code,description')
                            ->with('rxOrigin:id,origin_code')
                            ->with('schedule:id,code')
                            ->with('state:id,postal_code')
                            ->with('unit:id,code')
                            ->with('refillAllowed:rx_id,refill_allowed,remaining_refill')
                            ->whereHas('orderStageRealtion', function (Builder $query) {
                                $query->whereIn('stage', [5, 8, 10]);
                            })
                            ->withTrashed()
                            ->where('rx_state', '=', $eachState->postal_code)
                            ->where('pmp_dispenser', '=', 'N')
                            ->whereIn('schedule', [1, 2, 3, 4])
                            ->get(['id', 'order_id', 'quantity_prescribed', 'sig', 'quantity_dispensed', 'rx_id', 'daw', 'rx_origin', 'schedule', 'units', 'rx_state', 'reporting_status', 'formula', 'log_id', 'rx_fill_number', 'supply', 'date_written', 'refill_date', 'deleted_at'])
                            ->toArray();
                    if (!empty($pres)):
                        $tranaction_num = $eachState->postal_code . round(microtime(true) * 1000);
                        $env = config('constant.PMP_ENV');
                        #---------------------Tranaction Header----------------------------------#
                        $header = 'TH*4.2';
                        $header .= $this->getHeader('TH02', $eachState->postal_code, $tranaction_num);
                        $header .= $this->getHeader('TH03', $eachState->postal_code, '01');
                        $header .= "*";
                        $header .= $this->getHeader('TH05', $eachState->postal_code, $date_string);
                        $header .= $this->getHeader('TH06', $eachState->postal_code, $time_string);
                        $header .= $this->getHeader('TH07', $eachState->postal_code, $env);
                        $header .= "*";
                        $header .= $this->getHeader('TH09', $eachState->postal_code, '~');
                        $header .= "\n";
                        #---------------------End Tranaction Header------------------------------#
                        #---------------------Information Source Header--------------------------#
                        $header .= "IS";
                        $header .= $this->getHeader('IS01', $eachState->postal_code, $pharmacyInfo->unique_info_source_code);
                        $header .= $this->getHeader('IS02', $eachState->postal_code, $pharmacyInfo->source_entity_name);
                        $header .= $this->getHeader('IS03', $eachState->postal_code, $pharmacyInfo->message);
                        $header .= "~\n";

                        #---------------------End Information Source Header----------------------#
                        #---------------------Pharmacy Header--------------------------------#
                        $header .= "PHA";
                        $header .= $this->getHeader('PHA01', $eachState->postal_code, $pharmacyInfo->npi);
                        $header .= $this->getHeader('PHA02', $eachState->postal_code, $pharmacyInfo->ncpdp);
                        $header .= $this->getHeader('PHA03', $eachState->postal_code, $pharmacyInfo->dea);
                        $header .= $this->getHeader('PHA04', $eachState->postal_code, $pharmacyInfo->pharmacy_name);
                        $header .= $this->getHeader('PHA05', $eachState->postal_code, $pharmacyInfo->pharmacy_address_1);
                        $header .= $this->getHeader('PHA06', $eachState->postal_code, $pharmacyInfo->pharmacy_address_2);
                        $header .= $this->getHeader('PHA07', $eachState->postal_code, $pharmacyInfo->pharmacy_city);
                        $header .= $this->getHeader('PHA08', $eachState->postal_code, $pharmacyInfo->pharmacy_state);
                        $header .= $this->getHeader('PHA09', $eachState->postal_code, $pharmacyInfo->pharmacy_zip_code);
                        $header .= $this->getHeader('PHA10', $eachState->postal_code, $pharmacyInfo->pharmacy_phone);
                        $header .= $this->getHeader('PHA11', $eachState->postal_code, $pharmacyInfo->pharmacy_conatct_name);
                        $header .= $this->getHeader('PHA12', $eachState->postal_code, $pharmacyInfo->pharmacy_chain_site_no);
                        $header .= $this->getHeader('PHA13', $eachState->postal_code, $eachState->license_no);
                        $header .= "~\n";

                        #---------------------End Pharmacy Header----------------------------#
                        $rx_header_count = 0;

                        foreach ($pres as $key => $value):
                            #---------------------Patient Header---------------------------------#
                            $gender = !empty($value['order']['patient']['gender']) ? Crypt::decrypt($value['order']['patient']['gender']) : '';
                            $gender == 'Female' ? $gender = 'F' : $gender = 'M';
                            $header .= "PAT";

                            $header .= !empty($value['order']['patient']['identification_number']) ? $this->getHeader('PAT01', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['identification_number'])) : '';
                            $header .= !empty($value['order']['patient']['document']) ? $this->getHeader('PAT02', $eachState->postal_code, $value['order']['patient']['document']['pmp_code']) :'';
                            $header .= !empty($value['order']['patient']['identification_number']) ? $this->getHeader('PAT03', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['identification_number'])) : '';
                            $header .= !empty($value['order']['patient']['additional_identification_number']) ? $this->getHeader('PAT04', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['additional_identification_number'])) : '';
                            $header .= !empty($value['order']['patient']['additional_identification_type']) ? $this->getHeader('PAT05', $eachState->postal_code, $value['order']['patient']['additional_identification_type']) : '';
                            $header .= !empty($value['order']['patient']['additional_identification_number']) ? $this->getHeader('PAT06', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['additional_identification_number'])) : '';
                            $header .= !empty($value['order']['patient']['last_name']) ? $this->getHeader('PAT07', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['last_name'])) : '';
                            $header .= !empty($value['order']['patient']['first_name']) ? $this->getHeader('PAT08', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['first_name'])) : '';
                            $header .= !empty($value['order']['patient']['middle_name']) ? $this->getHeader('PAT09', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['middle_name'])) : '';
                            $header .= !empty($value['order']['patient']['name_prefix']) ? $this->getHeader('PAT10', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['name_prefix'])) : '';
                            $header .= !empty($value['order']['patient']['name_suffix']) ? $this->getHeader('PAT11', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['name_suffix'])) : '';
                            $header .= !empty($value['order']['patient']['address1']) ? $this->getHeader('PAT12', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['address1'])) : '';
                            $header .= !empty($value['order']['patient']['address2']) ? $this->getHeader('PAT13', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['address2'])) : '';
                            $header .= !empty($value['order']['patient']['city']) ? $this->getHeader('PAT14', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['city'])) : '';
                            $header .= !empty($value['order']['patient']['state']) ? $this->getHeader('PAT15', $eachState->postal_code, $value['order']['patient']['state']) : '';
                            $header .= !empty($value['order']['patient']['zip']) ? $this->getHeader('PAT16', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['zip'])) : '';
                            $header .= !empty($value['order']['patient']['phone']) ? $this->getHeader('PAT17', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['phone'])) : '';
                            $header .= !empty($value['order']['patient']['dob']) ? $this->getHeader('PAT18', $eachState->postal_code, date('Ymd', strtotime(Crypt::decrypt($value['order']['patient']['dob'])))) : '';
                            $header .= $this->getHeader('PAT19', $eachState->postal_code, $gender);
                            $header .= !empty($value['order']['patient']['species']) ? $this->getHeader('PAT20', $eachState->postal_code, $value['order']['patient']['species']['pmp_code']) : '';
                            $header .= !empty($value['order']['patient']['location_code']) ? $this->getHeader('PAT21', $eachState->postal_code, $value['order']['patient']['location_code']) : '';
                            $header .= !empty($value['order']['patient']['country_of_non_us']) ? $this->getHeader('PAT22', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['country_of_non_us'])) : '';
                            $header .= !empty($value['order']['patient']['animal_name']) ? $this->getHeader('PAT23', $eachState->postal_code, Crypt::decrypt($value['order']['patient']['animal_name'])) : '';
                            $header .= "~\n";
                            #---------------------End Patient Header------------------------------#
                            #---------------------Dispensing Record Header------------------------#
                            $fillnumber = "01";
                            if ($value['quantity_prescribed'] == $value['quantity_dispensed']):
                                $fillnumber = "00";
                            endif;
                            $drug_units = $value['unit']!=''?$value['unit']['code']:'';
                            $drug_conversion_unit = $this->conversionUnitValue($value['quantity_dispensed'],$drug_units);
                            $drug_conversion_unit = explode('~',$drug_conversion_unit);
                            $dispatchDetail = Dispatch::select('dispatches.first_name','dispatches.last_name','dispatches.dispatch_to_type','dispatches.additional_person_drop_id_indentification','dispatches.relationship_person_dropping_id','dispatches.person_drop_id_indentification_number','dispatches.person_drop_id_indentification','invoices.created_at')
                                ->join('invoices','invoices.dispatch_id','=','dispatches.dispatch_id')
                                ->where(['dispatches.order_id'=>$value['order_id'],'dispatches.rx_id' => $value['rx_id']])->first();        
                            $dipatchDate = ($dispatchDetail!='' && $dispatchDetail->created_at!='') ? date('Ymd', strtotime($dispatchDetail->created_at)) : '';
                            $formula_qualifier = $this->getProductType($value['formula']);
                            $product_id = ($formula_qualifier == '06') ? '99999':$value['log_id'];
                            $header .= "DSP";
                            $header .= isset($value['reporting_status']) ? $this->getHeader('DSP01', $eachState->postal_code, $value['reporting_status']) : '';
                            $header .= isset($value['rx_id']) ? $this->getHeader('DSP02', $eachState->postal_code, $value['rx_id']) : '';
                            $header .= isset($value['date_written']) ? $this->getHeader('DSP03', $eachState->postal_code, date('Ymd', strtotime($value['date_written']))) : '';
                            $header .= $value['refill_allowed'] ? $this->getHeader('DSP04', $eachState->postal_code, $value['refill_allowed']['refill_allowed']) : '';
                            $header .= isset($value['refill_date']) ? $this->getHeader('DSP05', $eachState->postal_code, date('Ymd', strtotime($value['refill_date']))) : '';
                            $header .= isset($value['rx_fill_number']) ? $this->getHeader('DSP06', $eachState->postal_code, $value['rx_fill_number']) : '';
                            $header .= isset($value['formula']) ? $this->getHeader('DSP07', $eachState->postal_code, $formula_qualifier) : '';
                            $header .= $this->getHeader('DSP08', $eachState->postal_code, $product_id);
                            $header .= $this->getHeader('DSP09', $eachState->postal_code, $drug_conversion_unit[0]);
                            $header .= isset($value['supply']) ? $this->getHeader('DSP10', $eachState->postal_code, $value['supply']) : '';
                            $header .= $this->getHeader('DSP11', $eachState->postal_code, $drug_conversion_unit[1]);
                            $header .= isset($value['rx_origin']) ? $this->getHeader('DSP12', $eachState->postal_code, $value['rx_origin']['origin_code']) : '';
                            $header .= $this->getHeader('DSP13', $eachState->postal_code, $fillnumber);
                            $header .= "*";
                            $header .= "*";
                            $header .= $this->getHeader('DSP16', $eachState->postal_code, "01");
                            $header .= $this->getHeader('DSP17', $eachState->postal_code, $dipatchDate);
                            $header .= "*";
                            $header .= "*";
                            $header .= isset($value['rx_serial']) ? $this->getHeader('DSP20', $eachState->postal_code, $value['rx_serial']) : '';
                            $header .= "*";
                            $header .= $this->getHeader('DSP22', $eachState->postal_code, $value['quantity_prescribed']);
                            $header .= $this->getHeader('DSP23', $eachState->postal_code, $value['sig']);
                            $header .= "*";
                            $header .= "*";
                            $header .= "~\n";
                            #---------------------End Dispensing Record Header----------------------#
                            #-----------------------Prescriber Information Header-------------------#
                            $header .= "PRE";
                            $header .= !empty($value['order']['provider']['npi']) ? $this->getHeader('PRE01', $eachState->postal_code, $value['order']['provider']['npi']) : '';
                            $header .= !empty($value['order']['provider']['dea']) ? $this->getHeader('PRE02', $eachState->postal_code, $value['order']['provider']['dea']) : '';
                            $header .= "*";
                            $header .= !empty($value['order']['provider']['statelicense']) ? $this->getHeader('PRE04', $eachState->postal_code, $value['order']['provider']['statelicense']) : '';
                            $header .= !empty($value['order']['provider']['last_name']) ? $this->getHeader('PRE05', $eachState->postal_code, $value['order']['provider']['last_name']) : '';
                            $header .= !empty($value['order']['provider']['first_name']) ? $this->getHeader('PRE06', $eachState->postal_code, $value['order']['provider']['first_name']) : '';
                            $header .= !empty($value['order']['provider']['middle_name']) ? $this->getHeader('PRE07', $eachState->postal_code, $value['order']['provider']['middle_name']) : '';
                            $header .= !empty($value['order']['provider']['phone1']) ? $this->getHeader('PRE08', $eachState->postal_code, $value['order']['provider']['phone1']) : '';
                            $header .= "*";
                            $header .= "~\n";
                            #-----------------------End Prescriber Information Header---------------#
                            #-----------------------Compound Drug Ingredient Detail Header----------#
                                $i = '01';
                                $ingres = $this->getIngredient($value['log_id'], $value['formula']);
                                $chemial_units = Helpers::getChemicalUnits();
                                if (!empty($ingres)):
                                    foreach ($ingres as $key => $val):
                                        $chem_unit = !empty($chemial_units) && isset($val['UNIT_ID']) ? $chemial_units[$val['UNIT_ID']] : '';
                                        $coversion_unit = $this->conversionUnitValue($val['QUANTITY_USED'],$chem_unit);
                                        $coversion_unit = explode('~',$coversion_unit);
                                        $header .= "CDI";
                                        $header .= $this->getHeader('CDI01', $eachState->postal_code, $i);
                                        $header .= isset($value['formula']) ? $this->getHeader('CDI02', $eachState->postal_code, $formula_qualifier) : '';
                                        $header .= isset($value['log_id']) ? $this->getHeader('CDI03', $eachState->postal_code, $value['log_id']) : '';
                                        $header .= $this->getHeader('CDI04', $eachState->postal_code, $coversion_unit[0]);
                                        $header .= $this->getHeader('CDI05', $eachState->postal_code, $coversion_unit[1]);
                                        $header .= "~\n";
                                        $i = str_pad(($i + 1), 2, "0", STR_PAD_LEFT);
                                        $rx_header_count = $rx_header_count + 1;
                                    endforeach;
                                endif;
                            #-----------------------End Compound Drug Ingredient Detail Header------#
                            #-----------------------Additional Information Reporting Header---------#
                            $pharmasict = OrderHistory::select('users.name')->where([
                                'order_id' => $value['order_id'],
                                'rx_id' => $value['rx_id'],
                                'last_stage' => '6']
                                    )->join('users','order_histories.created_by','=','users.id')->first();
                            $pharmasict_first_name='';
                            $pharmasict_last_name='';
                            if($pharmasict):
                                $name = explode(" ", $pharmasict->name);
                                $pharmasict_first_name = isset($name[0])?$name[0]:'';
                                $pharmasict_last_name = isset($name[1])?$name[1]:'';
                            endif;
                            $header .= "AIR";
                            $header .= $this->getHeader('AIR01', $eachState->postal_code, $eachState->postal_code);
                            $header .= isset($value['rx_serial']) ? $this->getHeader('AIR02', $eachState->postal_code, $value['rx_serial']) : '*';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?($dispatchDetail->person_drop_id_indentification!='' && ($dispatchDetail->person_drop_id_indentification=='02' || $dispatchDetail->person_drop_id_indentification=='06'))?$this->getHeader('AIR03', $eachState->postal_code, $dispatchDetail->person_drop_id_indentification):'*':'';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR04', $eachState->postal_code, $dispatchDetail->person_drop_id_indentification):'*';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR05', $eachState->postal_code, $dispatchDetail->person_drop_id_indentification_number):'*';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR06', $eachState->postal_code, $dispatchDetail->relationship_person_dropping_id):'*';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR07', $eachState->postal_code, Crypt::decrypt($dispatchDetail->first_name)):'*';
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR08', $eachState->postal_code, Crypt::decrypt($dispatchDetail->last_name)):'*';
                            $header .= $this->getHeader('AIR09', $eachState->postal_code, $pharmasict_last_name);
                            $header .= $this->getHeader('AIR10', $eachState->postal_code, $pharmasict_first_name);
                            $header .= ($dispatchDetail!='' && $dispatchDetail['dispatch_to_type']=='Other')?$this->getHeader('AIR11', $eachState->postal_code, $dispatchDetail->additional_person_drop_id_indentification):'*';
                            $header .= "~\n";
                            $rx_header_count = $rx_header_count + 1;
                            #-----------------------End Additional Information Reporting Header------#
                            $rx_header_count = $rx_header_count + 3;
                            PmpDispenserLog::insert([
                                'transaction_date' => $cst_date,
                                'tranaction_number' => $tranaction_num,
                                'order_id' => $value['order_id'],
                                'rx_number' => $value['rx_id'],
                                'state' => $eachState->postal_code,
                                'fill_number' => $value['rx_fill_number'],
                                'tranaction_type' => $env,
                                'created_at' => $cst_date_time,
                                'updated_at' => $cst_date_time]);
                            if (isset($value['deleted_at'])):
                                $pres_arr = ['deleted_at' => $value['deleted_at'], 'pmp_dispenser' => 'Y'];
                                Prescription::withTrashed()->find($value['id'])->restore();
                            else:
                                $pres_arr = ['pmp_dispenser' => 'Y'];
                            endif;
                            Prescription::where('id', $value['id'])
                                    ->update($pres_arr);
                        endforeach;

                        $tp_count = $rx_header_count + 2;
                        $tt_count = $tp_count + 3;
                        #----------------------- Pharmacy Trailer  Header-----------------------#
                        $header .= "TP";
                        $header .= $this->getHeader('TP01', $eachState->postal_code, $tp_count);
                        $header .= "~\n";

                        #-----------------------End Pharmacy Trailer  Header-----------------------#
                        #----------------------- Transaction Trailer Header---------------------#
                        $header .= "TT";
                        $header .= $this->getHeader('TT01', $eachState->postal_code, $tranaction_num);
                        $header .= $this->getHeader('TT02', $eachState->postal_code, $tt_count);
                        $header .= "~\n";
                        #-----------------------End Transaction Trailer Header---------------------#

                        if (is_dir(public_path('/pmp/' . $eachState->postal_code)) && is_dir(public_path('/archive/' . $eachState->postal_code))) {
                            $myfile = fopen($file_path, "w") or die("Unable to open file!");
                            fwrite($myfile, $header);
                            fclose($myfile);
                            if (file_exists($file_path)) {
                                $sftp = new SFTP($url);
                                if (!$sftp->login($user, $password)) {
                                    throw new Exception('Login failed');
                                } else {
                                     if ($sftp->put($eachState->postal_code . '/' . $file_name, $file_path, SFTP::SOURCE_LOCAL_FILE)) {
                                        $arch_file_name = "/archive/" . $eachState->postal_code . "/" . $tranaction_num . ".dat";
                                        File::copy($file_path, public_path($arch_file_name));
                                        PmpDispenserLog::where(['tranaction_number' => $tranaction_num])
                                                ->update(['file_name' => $arch_file_name]);
                                        unlink($file_path);
                                        $response = trans('messages.pmp_response_success', ['state' => $eachState->postal_code]);
                                    } else {
                                        $tranaction_num = '';
                                        $response = trans('messages.pmp_file_not_created', ['state' => $eachState->postal_code]);
                                    }
                                }
                            } else {
                                
                                $tranaction_num = '';
                                $response = trans('messages.pmp_file_not_created', ['state' => $eachState->postal_code]);
                            }
                        } else {

                            $tranaction_num = '';
                            $response = trans('messages.pmp_state_dir_not_exit', ['state' => $eachState->postal_code]);
                        }
                        PmpMatrixCronStatus::insert([
                            'transaction_date' => $cst_date,
                            'transaction_number' => isset($tranaction_num) ? $tranaction_num : '',
                            'state' => $eachState->postal_code,
                            'response' => $response,
                            'created_at' => $cst_date_time
                        ]);
                        DB::commit();
                    endif;
                endforeach;
            endif;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }

    /**
     * To get product type.
     *
     * @param integer $formula_id
     * @return integer|$product_type
     */
    public function getProductType($formula_id) {

        if (isset($formula_id)) {
            $log_data = $this->conn->prepare("SELECT fr.FORMULA_ID,lg.LOGMAIN_ID,fr.COMPOUNDED_IN_STORE "
                    . "FROM FORMULA fr "
                    . "FULL JOIN LOGMAIN lg ON fr.FORMULA_ID = lg.FORMULA_ID WHERE "
                    . "fr.FORMULA_ID = :FORMULA_ID AND lg.QTY_MADE_REMAINING > 0  rows 1");

            $log_data->bindValue(':FORMULA_ID', $formula_id);
            $log_data->execute();
            $log_details = $log_data->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($log_details)) {
                if ($log_details[0]['COMPOUNDED_IN_STORE'] == 'C') {
                    $product_type = '06';
                } else {
                    $product_type = '01';
                }
                return $product_type;
            }
        }
    }

    /**
     * To get ingredients.
     *
     * @param integer $log_id
     * @return array|$ingredients
     */
    public function getIngredient($log_id, $formula) {
        if (isset($log_id) && isset($formula)) {
            $formula_dtl = Helpers::getActivePKFormulaById($formula);
            if ($formula_dtl[0]['COMPOUNDED_IN_STORE'] == 'C') {
                $ingredients = $this->conn->prepare("SELECT logc.QUANTITY_USED, logc.UNIT_ID FROM LOGCHEM AS logc INNER JOIN 
                                       CHEMICAL AS chem ON logc.CHEMICAL_ID=chem.CHEMICAL_ID WHERE 
                                       LOGMAIN_ID=:LOGMAIN_ID AND QUANTITY_USED >0.0000");
                $ingredients->bindValue(':LOGMAIN_ID', $log_id);
                $ingredients->execute();
                $ingredients = $ingredients->fetchAll(PDO::FETCH_ASSOC);
                return $ingredients;
            }
        }
    }

    /**
     * To get chemical unit.
     *
     * @param integer $log_id
     * @return string|$unit
     */
    public function getChemicalUnit($log_id) {
        if (isset($log_id)) {
            $unit = $this->conn->prepare("SELECT QUANTITY_UNITS FROM LOGMAIN WHERE 
                                       LOGMAIN_ID=:LOGMAIN_ID");
            $unit->bindValue(':LOGMAIN_ID', $log_id);
            $unit->execute();
            $unit = $unit->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($unit)) {
                return $unit[0]['QUANTITY_UNITS'];
            }
        }
    }

    /**
     * To get chemical unit.
     *
     * @param string $fieldName
     * @param string $stateCode
     * @param string $value
     * @return string|$header
     */
    public function getHeader($fieldName, $stateCode, $value) {
        $header = Helpers::getPmpMatrixRule($stateCode, $fieldName) ? "*" . $value : "*";
        return $header;
    }
    /**
     * To get Conversion unit value.
     *
     * @param integer $quantity_used
     * @param string $chem_unit
     */
    public function conversionUnitValue($quantity_used,$chem_unit){
        $numb = "";
        $qty_used = "";
        
        $each_unit_arr = ['SUPP', 'TAB', 'TABLET', 'TABS', 'TROCHE', 'CAP', 'CAPS', 'EA','CALC'];
        $gram_unit_arr = ['G', 'GM', 'GMS'];
        if (in_array($chem_unit, $each_unit_arr)):
            $numb = "01";
            $qty_used = $quantity_used;
        elseif (in_array($chem_unit, $gram_unit_arr)):
            $numb = "03";
            $qty_used = $quantity_used;
        elseif ($chem_unit == 'ML'):
            $numb = "02";
            $qty_used = $quantity_used;
        elseif ($chem_unit == 'GR'):
            $numb = "03";
            $qty_used = ($quantity_used * 60) / 1000;
        elseif ($chem_unit == 'MG'):
            $numb = "03";
            $qty_used = $quantity_used / 1000;
        elseif($chem_unit == 'MCG'):
            $numb = "03";
            $qty_used = $quantity_used / 1000000;
        elseif($chem_unit == 'GAL'):
            $numb = "02";
            $qty_used = number_format($quantity_used * 3785.411784,2);
        elseif($chem_unit == 'CC'):
            $numb = "02";
            $qty_used = $quantity_used;    
        else:
            $qty_used = $quantity_used;
        endif;
        return $qty_used.'~'.$numb;
        
    }

}