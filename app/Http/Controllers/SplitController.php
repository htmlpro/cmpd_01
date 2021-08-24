<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Log;
use DB;
use setasign\Fpdi\Fpdi;
use App\Order;
use App\Attachment;
use App\OrderStageRelation;
use Carbon\Carbon;
use App\Helpers\DeletePDFPages;
use App\OrderManipulationHistory;
use App\OrderHistory;
use App\ScriptCounter;

class SplitController extends Controller
{

    /**
     * Split the selected PDF pages.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_num = $request->pagenumber;
        $file_name = $request->pdf;
        $order_id = $request->orderid;
        $i = 1;

        DB::beginTransaction();

        try {
            foreach ($page_num as $key => $value) {
                $new_pdf = new FPDI();
                $new_pdf->AddPage();
                $new_pdf->setSourceFile('./public/attachments/' . $file_name);
                $new_pdf->useTemplate($new_pdf->importPage($value));

                $name_array = explode('-', $file_name);
                $new_file_name = (round(microtime(true) * 1000) + $i) . '-' . $name_array[1];
                $file_path = './public/attachments/' . $new_file_name;
                $new_pdf->Output($file_path, "F");

                $pdf_text = file_get_contents($file_path);
                $num = preg_match_all("/\/Page\W/", $pdf_text, $dummy);

                $attachment = Attachment::create([
                            'message_id' => 0,
                            'file_name' => $new_file_name,
                            'file_path' => $file_path,
                            'created_at' => Carbon::now()
                ]);
                if (!empty($attachment)) {
                    $orders = Order::create([
                                'order_id' => null,
                                'source' => trans('messages.order_type'),
                                'page_count' => $num,
                                'attachment_id' => $attachment->id,
                                'created_by' => auth()->user()->id,
                                'created_at' => Carbon::now()
                    ]);
                    if (!empty($orders)) {
                        $start_counter = ScriptCounter::where('type', 'Order')
                                ->get()
                                ->toArray();
                        if (!empty($start_counter)) {
                            $new_order_id = $start_counter[0]['start_counter'] + $orders['id'];
                        } else {
                            $new_order_id = $orders['id'];
                        }
                        Order::where('id', $orders['id'])
                                ->update(['order_id' => $new_order_id]);
                        if (empty($split_order_ids)) {
                            $split_order_ids = $new_order_id;
                        } else {
                            $split_order_ids .= ' ,' . $new_order_id;
                        }
                        OrderStageRelation::create([
                            'order_id' => $new_order_id,
                            'stage' => 1,
                            'created_at' => Carbon::now()
                        ]);
                        OrderHistory::create([
                            'order_id' => $new_order_id,
                            'stage' => 1,
                            'created_by' => auth()->user()->id,
                            'created_at' => Carbon::now()
                        ]);
                    }
                }
                $i ++;
            }
            $data = ['file_name' => $file_name, 'selected_pages' => $page_num, 'order_id' => $order_id];
            $delete = new DeletePDFPages();
            $delete->deletePage($data);
            OrderManipulationHistory::create([
                'order_id' => $order_id,
                'action' => 'Split',
                'new_orders' => $split_order_ids,
                'created_by' => auth()->user()->id,
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
            DB::commit();
            return trans('messages.split_pages') . $split_order_ids;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }
}
