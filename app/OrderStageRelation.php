<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrderStageRelation extends Model
{

    protected $table = 'order_stage_relations';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'rx_id', 'stage', 'changed_by'];

    /**
     * Get the order records associated with OrderStageRelation
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

    /**
     * Get the prescription records associated with OrderStageRelation
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'rx_id', 'rx_id');
    }

    /**
     * Get the statuses records associated with OrderStageRelation
     */
    public function statuses()
    {
        return $this->hasMany('App\Status', 'value', 'stage');
    }

    /**
     * Get the order stage prescription records associated with OrderStageRelation
     */
    public function orderStagePrescription()
    {
        return $this->hasMany('App\Prescription', 'rx_id', 'rx_id')
                        ->withTrashed();
    }

    /**
     * Get the order stage orders records associated with OrderStageRelation
     */
    public function orderStageOrders()
    {
        return $this->hasMany('App\Order', 'order_id', 'order_id')
                        ->withTrashed();
    }

    /**
     * Get the order history records associated with OrderStageRelation
     */
    public function orderHistory()
    {
        return $this->hasMany('App\OrderHistory', 'order_id', 'order_id')
                        ->orderBy('id', 'DESC');
    }

    /**
     * Get the dispatch records associated with order
     */
    public function orderDispatchDetails()
    {
        return $this->hasOne('App\Dispatch', 'order_id', 'order_id');
    }

    /**
     * To get the dispatch records associated with Prescription
     */
    public function prescriptionDispatchDetails()
    {
        return $this->hasOne('App\Dispatch', 'rx_id', 'rx_id');
    }
    
    /**
     * Get the order stage orders records associated with OrderStageRelation with customization
     */
    public function orderStageOrdersCustomize()
    {
        return $this->hasMany('App\Order', 'order_id', 'order_id')->select(array('order_id', 'patient_id', 'provider_id', 'client_id'))
                        ->withTrashed();
    }
}
