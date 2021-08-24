<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;
use Log;
use Carbon\Carbon;
use DB;
use App\Attachment;
use App\Order;
use App\OrderStageRelation;
use App\OrderHistory;
use Session;

class BarcodeController extends Controller
{

    public function index()
    {
        return view('barcode');
    }

    /**
     *
     * Getting fax
     */
    public function fax()
    {
        try {
            $url = env('FAX_URL');
            $dst = env('FAX_NUMBER');
            $username = env('FAX_USERNAME');
            $company = env('FAX_COMPANY');
            $password = env('FAX_PASSWORD');

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

            $this->createOrdersFromFax($faxes);
        } catch (\Exception $e) {
            Log::info(['file'=> $e->getFile(),'message' => $e->getMessage(),'line'=>$e->getLine()]);
            abort(500);
        }
    }

    /**
     *
     *
     */
    public function createOrdersFromFax($faxList)
    {
        try {
            $url = env('FAX_URL');
            $dst = env('FAX_NUMBER');
            $username = env('FAX_USERNAME');
            $company = env('FAX_COMPANY');
            $password = env('FAX_PASSWORD');
            
            foreach ($faxList as $val) {
                /* iterate through each faxList and save it */
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
                    $file_name = time() . "_Fax_$uid.pdf";
                    $file_path = base_path() . '/public/attachments/' . $file_name;
                    $content = $get_fax_result;
                    file_put_contents($file_path, $content);
                    $pdftext = file_get_contents($file_path);
                    $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                    DB::beginTransaction();
                    $attachment = Attachment::create([
                                'message_id' => $uid,
                                'file_name' => $file_name,
                                'file_path' => $file_path,
                                'created_at' => Carbon::now()
                    ]);
                    if ($attachment) {
                        $order_count = DB::table('orders')->count();
                        $count_incr = $order_count + 1;
                        $order_id = 1000 + $count_incr;

                        $orders = Order::create([
                                    'order_id' => $order_id,
                                    'source' => 'FAX',
                                    'page_count' => $num,
                                    'attachment_id' => $attachment->id,
                                    'created_at' => Carbon::now(),
                                    'created_by' => auth()->user()->id,
                        ]);
                        if ($orders) {
                            OrderStageRelation::create([
                                'order_id' => $order_id,
                                'stage' => 1,
                                'created_at' => Carbon::now()
                            ]);
                            OrderHistory::create([
                                'order_id' => $order_id,
                                'stage' => 1,
                                'created_by' => auth()->user()->id,
                                'created_at' => Carbon::now()
                            ]);
                        }
                    }
                    $message = trans('messages.order_success');
                    $alert_class = 'alert-success';

                    Session::flash('message', $message);
                    Session::flash('alert-class', $alert_class);
                    DB::commit();
                }
            }
            curl_close($ch);
            return redirect('/orders');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file'=> $e->getFile(),'message' => $e->getMessage(),'line'=>$e->getLine()]);
            abort(500);
        }
    }
}
