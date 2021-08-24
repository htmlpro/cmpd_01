<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Order;
use App\Attachment;
use DB;
use Log;
use App\OrderHistory;
use App\OrderStageRelation;
use App\ScriptCounter;
use App\AllQueueSummary;
use App\Helpers\Helpers;

class FaxAttachment extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fax:faxattachment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get fax attachments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $url = config('constant.FAX_URL');
            $dst = config('constant.FAX_NUMBER');
            $username = config('constant.FAX_USERNAME');
            $company = config('constant.FAX_COMPANY');
            $password = config('constant.FAX_PASSWORD');

            $fields = array(
                'username' => urlencode($username),
                'company' => urlencode($company),
                'password' => urlencode($password),
                'faxno' => urlencode($dst),
                'operation' => urlencode("listfax"),
            );

            $j = 0;
            $fields_string = '';
            foreach ($fields as $key => $value) {
                if ($j > 0) {
                    $fields_string .= "&";
                }
                $fields_string .= $key . '=' . $value;
                $j++;
            }
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            $remove_tabs = explode('\t', json_encode(preg_replace("/\n/", "\t", $result)));
            $remove_tabs_count = count($remove_tabs);
            $faxes = array();
            $i = 0;
            foreach ($remove_tabs as $key => $val) {
                if (($i % 4 == 0)) {
                    $faxes[] = $val;
                }
                $i++;
            }
            curl_close($ch);
            $this->createOrdersFromFax($faxes);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }

    /**
     * To create new orders from Fax.
     *
     * @param array|$faxList
     * @return void
     */
    public function createOrdersFromFax($faxList)
    {
        try {
            $url = config('constant.FAX_URL');
            $dst = config('constant.FAX_NUMBER');
            $username = config('constant.FAX_USERNAME');
            $company = config('constant.FAX_COMPANY');
            $password = config('constant.FAX_PASSWORD');
            $faxes = array_pop($faxList);
            foreach ($faxList as $val) {
                $uid = str_replace('"', '', $val);
                if (!(Attachment::where('message_id', $uid)->exists())) {
                    $get_fax_fields = array(
                        'username' => urlencode($username),
                        'company' => urlencode($company),
                        'password' => urlencode($password),
                        'faxno' => urlencode($dst),
                        'operation' => urlencode("getfax"),
                        'faxid' => urlencode($uid),
                        'informat' => urlencode("PDF")
                    );

                    $k = 0;
                    $i = 1;
                    $get_fax_fields_string = '';
                    foreach ($get_fax_fields as $key => $value) {
                        if ($k > 0) {
                            $get_fax_fields_string .= "&";
                        }
                        $get_fax_fields_string .= $key . '=' . $value;
                        $k++;
                    }
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, count($get_fax_fields));
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $get_fax_fields_string);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                    $get_fax_result = curl_exec($ch);

                    $file_name = round(microtime(true) * 1000) . "-Fax_$uid.pdf";
                    $file_path = base_path() . '/public/attachments/' . $file_name;
                    $content = $get_fax_result;
                    file_put_contents($file_path, $content);

                    $pdftext = file_get_contents($file_path);
                    $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                    curl_close($ch);
                    DB::beginTransaction();
                    $attachment = Attachment::create([
                                'message_id' => $uid,
                                'file_name' => $file_name,
                                'file_path' => $file_path,
                                'created_at' => Carbon::now()
                    ]);
                    if (!empty($attachment)) {
                        $orders = Order::create([
                                    'order_id' => null,
                                    'source' => 'FAX',
                                    'page_count' => $num,
                                    'attachment_id' => $attachment->id,
                                    'created_at' => Carbon::now(),
                        ]);
                        if (!empty($orders)) {
                            $start_counter = ScriptCounter::where('type', 'Order')
                                    ->get()
                                    ->toArray();
                            if (!empty($start_counter)) {
                                $order_id = $start_counter[0]['start_counter'] + $orders['id'];
                            } else {
                                $order_id = $orders['id'];
                            }
                            Order::where('id', $orders['id'])
                                    ->update(['order_id' => $order_id]);
                            OrderStageRelation::create([
                                'order_id' => $order_id,
                                'stage' => 1,
                                'created_at' => Carbon::now()
                            ]);
                            OrderHistory::create([
                                'order_id' => $order_id,
                                'stage' => 1,
                                'created_at' => Carbon::now()
                            ]);
                            $get_status = Helpers::getStatus(['1']);
                            AllQueueSummary::create([
                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                'stage_id' => '1',
                                'stage_change_at' => Carbon::now(),
                                'date_received' => Carbon::now(),
                                'order_id' => $order_id,
                            ]);
                            DB::commit();
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }
}
