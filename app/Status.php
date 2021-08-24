<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $table = 'statuses';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the OrderStageRelation records associated with Status
     */
    public function orderStageRelation()
    {
        return $this->belongsTo('App\OrderStageRelation', 'stage', 'value');
    }

    /**
     * Get the OrderStageRelation records associated with Status
     */
    public function orderHistory()
    {
        return $this->belongsTo('App\OrderHistory', 'last_stage', 'value');
    }
}
