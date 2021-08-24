<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Helpers;
use App\State;
use App\PmpDispenserLog;
use App\ZeroReportLog;
use phpseclib\Net\SFTP;
use App\ZeroReportCronStatus;
use Carbon\Carbon;
use Exception;
use DB;
use Log;
use File;
use App\ZeroReportCronRuningStatus;

class PmpDispenserZeroReport extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pmpdispenser:zeroreport';
    public $conn;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send zero report to all states';

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
     * Execute the console command(To send zero report).
     *
     * @return mixed
     */
    public function handle() {
        try {
            $cst_date_time = Helpers::convertToCST(date('Y-m-d H:i'), 'time');
            $cst_arr = explode(' ', $cst_date_time);
            $cst_date = $cst_arr[0];
            $cst_time = $cst_arr[1];
            $date_string = preg_replace('/-|:/', null, $cst_date);
            $time_string = preg_replace('/-|:/', null, $cst_time);
            $cron_status = ZeroReportCronRuningStatus::where(['cron_date' => $cst_date])
                    ->get()
                    ->toArray();
            if (empty($cron_status)) {
                if ($cst_time >= '23:53' && $cst_time <= '23:56') {
                    $url = config('constant.PMP_SFTP_URL');
                    $user = config('constant.PMP_SFTP_USER');
                    $password = config('constant.PMP_SFTP_PASSWORD');
                    $site_name = config('constant.ZERO_REPORT_SITE_NAME');
                    DB::beginTransaction();
                    $states = State::where(['pmp_status' => 1])
                            ->get(['postal_code'])
                            ->toArray();
                    if (!empty($states)) {
                        foreach ($states as $key => $value) {
                            $logs = PmpDispenserLog::select('id')
                                    ->where(['transaction_date' => $cst_date, 'state' => $value['postal_code']])
                                    ->get()
                                    ->toArray();
                            if (empty($logs)) {
                                $file_name = $site_name . "zero_reports_" . $date_string . ".dat";
                                $file_path = public_path() . "/pmp/" . $value['postal_code'] . "/" . $file_name;

                                $tranaction_num = $value['postal_code'] . round(microtime(true) * 1000);
                                $tranaction_date = $date_string;
                                $traction_time = $time_string;
                                $env = config('constant.PMP_ENV');
                                $info_id = '2104902733';
                                $source_entity_name = 'Thousand Oaks Health Care LLC';

                                #---------------------Tranaction Header----------------------------------#
                                $header = "TH*4.2*" . $tranaction_num . "*01**" . $tranaction_date . "*" . $traction_time . "*" . $env . "**~~\n";
                                #---------------------End Tranaction Header------------------------------#
                                #---------------------Information Source Header--------------------------#
                                $header .= "IS*" . $info_id . "*" . $source_entity_name . "*#" . date('Ymd') . "#-#" . date('Ymd') . "#" . "~\n";
                                #---------------------End Information Source Header----------------------#

                                $ph_dea_num = "FR2077344";
                                $nabp_num = "5900419";
                                #---------------------Pharmacy Header--------------------------------#
                                $header .= "PHA**" . $nabp_num . "*" . $ph_dea_num . "~\n";
                                #---------------------End Pharmacy Header----------------------------#
                                #---------------------Patient Header---------------------------------#
                                $header .= "PAT*******REPORT*ZERO*~\n";
                                #---------------------End Patient Header-----------------------------#
                                #---------------------Dispensing Record Header-----------------------#
                                $header .= "DSP*****" . date('Ymd') . "~\n";
                                #---------------------End Dispensing Record Header-------------------#
                                #---------------------Prescriber Record Header-----------------------#
                                $header .= "PRE*~\n";
                                #---------------------End Prescriber Record Header-------------------#
                                #---------------------Compound Drug Ingredient Detail Header---------#
                                $header .= "CDI*~\n";
                                #---------------------End Compound Drug Ingredient Detail Header-----#
                                #---------------------Additional Information Reporting Header--------#
                                $header .= "AIR*~\n";
                                #---------------------End Additional Information Reporting Header----#
                                #----------------------- Pharmacy Trailer  Header--------------------#
                                $header .= "TP*7~\n";
                                #-----------------------End Pharmacy Trailer Header------------------#
                                #----------------------- Transaction Trailer  Header-----------------#
                                $header .= "TT*" . $tranaction_num . "*10~";
                                #-----------------------End Transaction Trailer Header---------------#
                                if (is_dir(public_path('/pmp/' . $value['postal_code'])) && is_dir(public_path('/archive/' . $value['postal_code']))) {
                                    $myfile = fopen($file_path, "w") or die("Unable to open file!");
                                    fwrite($myfile, $header);
                                    fclose($myfile);

                                    if (file_exists($file_path)) {
                                        $sftp = new SFTP($url);
                                        if (!$sftp->login($user, $password)) {
                                            throw new Exception('Login failed');
                                        } else {
                                            if ($sftp->put($value['postal_code'] . '/' . $file_name, $file_path, SFTP::SOURCE_LOCAL_FILE)) {
                                                $arch_file_name = "/archive/" . $value['postal_code'] . "/$site_name.zero_report_" . $tranaction_num . ".dat";
                                                File::copy($file_path, public_path($arch_file_name));
                                                ZeroReportLog::insert([
                                                    'transaction_date' => $cst_date,
                                                    'transaction_number' => $tranaction_num,
                                                    'transaction_type' => $env,
                                                    'state' => $value['postal_code'],
                                                    'file_name' => $arch_file_name,
                                                    'created_at' => $cst_date_time]);
                                                unlink($file_path);
                                                $response = $value['postal_code'] . " File submitted successfully to PMP";
                                            } else {
                                                $tranaction_num = '';
                                                $response = $value['postal_code'] . " File not submitted to PMP";
                                            }
                                        }
                                    } else {
                                        $tranaction_num = '';
                                        $response = $value['postal_code'] . " File not created";
                                    }
                                } else {
                                    $tranaction_num = '';
                                    $response = $value['postal_code'] . " dir not exist on the server";
                                }
                            } else {
                                $response = $value['postal_code'] . " No record found";
                            }
                            ZeroReportCronStatus::insert([
                                'transaction_date' => $cst_date,
                                'transaction_number' => isset($tranaction_num) ? $tranaction_num : '',
                                'state' => $value['postal_code'],
                                'response' => $response,
                                'created_at' => $cst_date_time
                            ]);
                        }
                        ZeroReportCronRuningStatus::insert([
                            'cron_date' => $cst_date,
                            'status' => 1,
                            'created_at' => $cst_date_time
                        ]);
                        DB::commit();
                    }
                }
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }

}
