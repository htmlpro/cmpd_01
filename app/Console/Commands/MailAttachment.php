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

class MailAttachment extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attachment:getattachment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get mail attachments';

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
     * To create new orders from email cron.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $inbox = imap_open(
                config('constant.IMAP_HOST'),
                config('constant.IMAP_USERNAME'),
                config('constant.IMAP_PASSWORD')
            ) or die('Cannot connect to Gmail: ' . imap_last_error());
            $emails = imap_search($inbox, 'ALL');

            if ($emails) {
                $count = 1;
                rsort($emails);
                foreach ($emails as $email_number) {
                    /* get information specific to this email */
                    $overview = imap_fetch_overview($inbox, $email_number, FT_UID);
                    $message = imap_fetchbody($inbox, $email_number, 2);
                    /* get mail structure */
                    $structure = imap_fetchstructure($inbox, $email_number);
                    $uid = imap_uid($inbox, $email_number);
                    $attachments = array();
                    /* if any attachments found... */
                    if (isset($structure->parts) && count($structure->parts)) {
                        for ($i = 0; $i < count($structure->parts); $i++) {
                            $attachments[$i] = array(
                                'is_attachment' => false,
                                'filename' => '',
                                'name' => '',
                                'attachment' => ''
                            );
                            if ($structure->parts[$i]->ifdparameters) {
                                foreach ($structure->parts[$i]->dparameters as $object) {
                                    if (strtolower($object->attribute) == 'filename') {
                                        $attachments[$i]['is_attachment'] = true;
                                        $attachments[$i]['filename'] = $object->value;
                                    }
                                }
                            }
                            if ($structure->parts[$i]->ifparameters) {
                                foreach ($structure->parts[$i]->parameters as $object) {
                                    if (strtolower($object->attribute) == 'name') {
                                        $attachments[$i]['is_attachment'] = true;
                                        $attachments[$i]['name'] = $object->value;
                                    }
                                }
                            }
                            if ($attachments[$i]['is_attachment']) {
                                $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i + 1);
                                if ($structure->parts[$i]->encoding == 3) {
                                    $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                                } elseif ($structure->parts[$i]->encoding == 4) {
                                    $attachments[$i]['attachment'] = quoted_printable_decode(
                                        $attachments[$i]['attachment']
                                    );
                                }
                            }
                        }
                    }
                    if (!(Attachment::where('message_id', $uid)->exists())) {
                        foreach ($attachments as $attachment) {
                            if ($attachment['is_attachment'] == 1) {
                                $filename = round(microtime(true) * 1000) . '-' .
                                        str_replace('-', '_', $attachment['name']);
                                $folder = base_path() . '/public/attachments';
                                if (!is_dir($folder)) {
                                    mkdir($folder);
                                }
                                $fp = fopen($folder . "/" . $filename, "w+");
                                fwrite($fp, $attachment['attachment']);
                                fclose($fp);
                                $pdftext = file_get_contents($folder . "/" . $filename);
                                $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                                $attachment = Attachment::create([
                                            'message_id' => $uid,
                                            'file_name' => $filename,
                                            'file_path' => $folder . "/" . $filename,
                                            'created_at' => Carbon::now()
                                ]);
                                if (!empty($attachment)) {
                                    $orders = Order::create([
                                                'order_id' => null,
                                                'source' => 'Fax',
                                                'page_count' => $num,
                                                'attachment_id' => $attachment->id,
                                                'created_at' => Carbon::now()
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
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['message' => $e->getMessage(), 'line' => $e->getLine()]);
        }
    }
}
