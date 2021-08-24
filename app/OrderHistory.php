<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{

    protected $table = 'order_histories';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['order_id', 'rx_id', 'stage', 'time', 'last_stage', 'created_by', 'updated_by', 'deleted_at'];

    /**
     * Get the prescription records associated with OrderHistory
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'order_id', 'order_id');
    }

    /**
     * Get the order records associated with OrderHistory
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

    /**
     * Get the order stage relation records associated with OrderHistory
     */
    public function orderStage()
    {
        return $this->belongsTo('App\OrderStageRelation', 'order_id', 'order_id');
    }

    /**
     * Get the order history status relation records associated with OrderHistory
     */
    public function status()
    {
        return $this->hasOne('App\Status', 'value', 'last_stage');
    }

    /**
     * Get user records associated with order
     */
    public function orderHistoryUser()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    /**
     * Get user records associated with order
     */
    public function declinStatuses()
    {
        $last_stage = OrderHistory::where('stage', 9)
                ->get()
                ->toArray();
        return $last_stage;
    }

    /**
     * Get the prescription records associated with OrderHistory
     */
    public function orderHistoryPrescription()
    {
        return $this->belongsTo('App\Prescription', 'rx_id', 'rx_id');
    }
}
