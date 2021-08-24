<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use App\Helpers\Helpers;
use App\Prescription;
use Carbon\Carbon;
use App\OrderHistory;
use App\OrderStageRelation;
use App\Dispatch;
use Session;
use App\RefillHistory;
use Illuminate\Support\Facades\Crypt;
use App\Vial;
use App\PmpDispenserLog;
use App\AllQueueSummary;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * To change order state.
     *
     * @param \Illuminate\Http\Request $request
     * @return response|json
     */
    public function changeStage(Request $request){
        try {
            $rx_ids = $request->input('rx_num');
            if (!empty($rx_ids)) {
                $change_stage = $request->input('stage');
                $current_stage=$request->input('current_stage');
                foreach ($rx_ids as $key => $val) {
                    $rx_order_array = explode('-', $val);
                    $data = ['order_id' => $rx_order_array[1],'current_stage'=>$current_stage,'stage' => $change_stage, 'rx' => $rx_order_array[0]];
                    $this->manageOrderHistory($data);
                    $get_status = Helpers::getStatus([$change_stage]);
                    AllQueueSummary::where(['order_id' => $rx_order_array[1], 'rx_id' => $rx_order_array[0]])
                            ->update([
                                'stage' => $get_status ? $get_status[0]['name'] : '',
                                'stage_id' => $change_stage,
                                'stage_change_at' => Carbon::now(),
                    ]);
                }
                $message = trans('messages.state_changed');
            } else {
                $message = trans('messages.no_prescription_selected');
                $status = false;
            }
            $status = true;
            return response()->json(['status' => $status,'message' => $message]);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

     /**
     * To manage order history.
     *
     * @param array $data
     * @return void
     */
    private function manageOrderHistory($data = [])
    {
        try{
            $order_id = $data['order_id'];
            $rx_id = $data['rx'];
            $change_stage = $data['stage'];
            $current_stage=$data['current_stage'];
            $timestamp = Carbon::now();
            $change_by = auth()->user()->id;
            $con = "where order_id=$order_id and rx_id=$rx_id";
            $order_history = DB::select(DB::raw("select * from `order_histories` $con and `stage` = "
                                    . "$current_stage and time IS NUll order by `id` desc"));                      
            if (!empty($order_history)) {
                OrderStageRelation::where(['order_id'=>$order_id,'rx_id'=>$rx_id])->update(['stage'=>$change_stage,'changed_by'=>$change_by,'updated_at'=>$timestamp]);
                $time_diff = (Carbon::now()->timestamp - strtotime($order_history[0]->created_at));
                $time_in_hr = round($time_diff / 3600);
                OrderHistory::where('id', $order_history[0]->id)
                        ->update(['time' => $time_in_hr, 'updated_by' => $change_by]);
                OrderHistory::create([
                    'order_id' => $order_id,
                    'rx_id' => $rx_id,
                    'stage' => $change_stage,
                    'last_stage' => $current_stage,
                    'created_by' => $change_by,
                    'created_at' => $timestamp
                ]);
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
   
    }
}
