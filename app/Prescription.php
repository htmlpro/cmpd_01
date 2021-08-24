<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{

    protected $table = 'prescriptions';
    protected $primaryKey = 'id';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['schedule', 'qty', 'units', 'rx_id', 'daw', 'log_id', 'refills', 'supply', 'sig', 'price', 'date_written', 'date_entered', 'rx_state', 'rx_serial', 'entered_by_user', 'deleted_by_user', 'rx_exp_date', 'used_by_date' ,'deleted_at'];

    /**
     * To get the order records associated with Prescription
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

    /**
     * To get the OrderStageRelation records associated with Prescription
     */
    public function orderStageRealtion()
    {
        return $this->hasMany('App\OrderStageRelation', 'rx_id', 'rx_id');
    }

    /**
     * To get the formula records associated with Prescription
     */
    public function formula()
    {
        return $this->hasOne('App\Formula', 'formula_id', 'formula');
    }

    /**
     * To get the daw records associated with Prescription
     */
    public function daw()
    {
        return $this->hasOne('App\Daw', 'code', 'daw');
    }

    /**
     * To get the rxOrigin records associated with Prescription
     */
    public function rxOrigin()
    {
        return $this->hasOne('App\RxOrigin', 'id', 'rx_origin');
    }

    /**
     * To get the schedule records associated with Prescription
     */
    public function schedule()
    {
        return $this->hasOne('App\Schedule', 'id', 'schedule');
    }

    /**
     * To get the unit records associated with Prescription
     */
    public function unit()
    {
        return $this->hasOne('App\Unit', 'id', 'units');
    }

    /**
     * To get the state records associated with Prescription
     */
    public function state()
    {
        return $this->hasOne('App\State', 'postal_code', 'rx_state');
    }

    /**
     * To get the dispatch records associated with Prescription
     */
    public function dispatch()
    {
        return $this->hasOne('App\Dispatch', 'rx_id', 'rx_id');
    }

    /**
     * To get the orderHistory records associated with Prescription
     */
    public function orderHistory()
    {
        return $this->hasMany('App\OrderHistory', 'order_id', 'order_id');
    }

    /**
     * To get the orderHistory records associated with Prescription
     *
     */
    public function prescriptionInvoicePrice()
    {
        return $this->hasMany('App\InvoicePrice', 'rx_id', 'rx_id');
    }

    /**
     * Get the refillHistory records associated with Prescription
     */
    public function refillHistory()
    {
        return $this->hasMany('App\RefillHistory', 'order_id', 'order_id');
    }

    /**
     * To get user details, who created prescription
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    /**
     * To get the dispatch records associated with Prescription
     */
    public function orderDispatchDetails()
    {
        return $this->hasOne('App\Dispatch', 'order_id', 'order_id');
    }

    /**
     * To get the OrderStageRelation records associated with Prescription
     */
    public function orderStageRelationDetails()
    {
        return $this->hasMany('App\OrderStageRelation', 'order_id', 'order_id');
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
     * Get the order stage prescription records associated with OrderStageRelation
     */
    public function orderStagePrescription()
    {
        return $this->hasMany('App\Prescription', 'rx_id', 'rx_id')
                        ->withTrashed();
    }
    
    /**
     * Get the refill allowed records associated with Prescription
     */
    public function refillAllowed()
    {
        return $this->hasOne('App\RefillAllowed', 'rx_id', 'rx_id');
    }
}
