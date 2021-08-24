<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $table = 'notes';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the order records associated with Note
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }
}
