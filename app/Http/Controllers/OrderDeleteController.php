<?php

namespace App\Http\Controllers;

use Log;
use App\OrderStageRelation;
use App\Helpers\Helpers;
use Session;

class OrderDeleteController extends Controller
{

    public $delete_stage = 5;

    /**
     * To render all deleted Order/Rx at Delete queue.
     *
     * @param array $data
     * @return void
     */
    public function index()
    {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $order_stage_relation = OrderStageRelation::where('stage', $this->delete_stage)
                        ->get()
                        ->toArray();
                if (!empty($order_stage_relation)) {
                    foreach ($order_stage_relation as $key => $value) {
                        if (empty($value['rx_id'])) {
                            $data['deleted_orders'][] = OrderStageRelation::with('orderStageOrders')
                                    ->with('orderStageOrders.patient')
                                    ->with('orderStageOrders.provider')
                                    ->with('statuses')
                                    ->where('order_id', $value['order_id'])
                                    ->get()
                                    ->toArray();
                        } else {
                            $data['deleted_orders'][] = OrderStageRelation::with('orderStagePrescription')
                                    ->with('orderStageOrders.patient')
                                    ->with('orderStageOrders.provider')
                                    ->with('orderStagePrescription')
                                    ->with('statuses')
                                    ->where('order_id', $value['order_id'])
                                    ->where('rx_id', $value['rx_id'])
                                    ->get()
                                    ->toArray();
                        }
                    }
                }
                $data['formula_data'] = Helpers::getAllFormula();
                $data['patient_data'] = Helpers::getAllPatients('assoc');
                $data['provider_data'] = Helpers::getAllProviders('assoc');         
                $data['stage_name'] = trans('messages.delete_stage');
                return view('orders.delete', $data);
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
}
