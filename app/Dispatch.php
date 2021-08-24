<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispatch extends Model
{

    protected $table = 'dispatches';

    use SoftDeletes;

    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the order records associated with Dispatch
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

    /**
     * Get the state records associated with Dispatch
     */
    public function state()
    {
        return $this->hasOne('App\State', 'postal_code', 'state');
    }

    /**
     * Get the prescription records associated with order
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'rx_id', 'rx_id')->with('order');
    }

    /**
     * Get the invoice records associated with order
     */
    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'dispatch_id', 'dispatch_id');
    }

    /**
     * Get the dispatch method type records associated with Dispatch
     */
    public function dispatchMethod()
    {
        return $this->hasOne('App\DispatchMethod', 'id', 'dispatch_method');
    }
}
