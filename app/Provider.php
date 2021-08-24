<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{

    protected $table = 'providers';
    protected $primaryKey = 'id';

    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the order records associated with Provider.
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    /**
     * To get provides as client records associated with Provider.
     */
    public function providerAsClient()
    {
        return $this->belongsTo('App\Order', 'provider_id', 'provider_status');
    }
}
