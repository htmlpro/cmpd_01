<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\OrderHistory;
use App\Provider;
use Session;
use App\AllQueueSummary;

class AllQueueController extends Controller {

    /**
     * To render  all Order/Rx at All Order Queue.
     *
     * @return array|void
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['all_queue'] = AllQueueSummary::get([
                            'stage', 'stage_change_at', 'date_received', 'order_id', 'provider', 'date_entered', 'rx_id',
                            'patient', 'dob', 'medication', 'client', 'ship_to', 'dispatch_method', 'tracking_num', 'patient_lastname', 'stage_id'
                        ])
                        ->toArray();
                $data['stage_name'] = trans('messages.all_queue_stage');
                $data['current_date'] = Carbon::now()->timestamp;
                return View('orders.all_queue', $data);
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To render all provider Order/Rx at All Order Queue.
     *
     * @return array|void
     */
    public function providerAllQueue() {
        try {
            if (!in_array(auth()->user()->role, [1, 2, 3])) {
                $user_role = auth()->user()->role;
                if ($user_role == 4) {
                    $provider_arr[] = auth()->user()->provider_id;
                } else if ($user_role == 5) {
                    $provider_id = auth()->user()->provider_id;
                    $corporate_providers = Provider::select('id')->where(['provider_corporation' => $provider_id])
                            ->get()
                            ->toArray();
                    if (!empty($corporate_providers)) {
                        foreach ($corporate_providers as $key => $value) {
                            $provider_arr[] = $value['id'];
                        }
                        array_push($provider_arr, $provider_id);
                    } else {
                        $provider_arr[] = $provider_id;
                    }
                } else if ($user_role == 6) {
                    $provider_id = auth()->user()->provider_id;
                    $client_providers = Provider::select('id')->where(['client' => $provider_id])
                            ->get()
                            ->toArray();
                    if (!empty($client_providers)) {
                        foreach ($client_providers as $key => $value) {
                            $provider_arr[] = $value['id'];
                        }
                        array_push($provider_arr, $provider_id);
                    } else {
                        $provider_arr[] = $provider_id;
                    }
                }
                $data['all_queue'] = AllQueueSummary::whereIn('provider_id', $provider_arr)
                        ->get([
                            'stage', 'stage_change_at', 'date_received', 'order_id', 'provider', 'date_entered', 'rx_id',
                            'patient', 'dob', 'medication', 'client', 'ship_to', 'dispatch_method', 'tracking_num', 'patient_lastname', 'stage_id'
                        ])
                        ->toArray();
                $data['stage_name'] = trans('messages.all_queue_stage');
                $data['all_count'] = !empty($data['all_queue']) ? count($data['all_queue']) : 0;
                $data['current_date'] = Carbon::now()->timestamp;
                return View('orders.all_queue', $data);
            } else {
                return redirect('all');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To get order stage interval time in hrs.
     *
     * @param integer $rx_id
     * @param integer $order_id
     * @return integer $stage_time
     */
    public function stageTimeInterval($rx_id, $order_id) {
        try {
            $order_history = OrderHistory::where('order_id', $order_id)
                    ->orWhere('rx_id', $rx_id)
                    ->whereNull('time')
                    ->orderBy('id', 'DESC')
                    ->first();
            if (!empty($order_history)) {
                if (isset($order_history['time'])) {
                    $stage_time = $order_history['time'];
                } else {
                    $time_diff = (Carbon::now()->timestamp - strtotime($order_history['created_at']));
                    $stage_time = round($time_diff / 3600);
                }
            }
            return $stage_time;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(),
                'line' => $e->getLine()]);
            abort(500);
        }
    }

}
