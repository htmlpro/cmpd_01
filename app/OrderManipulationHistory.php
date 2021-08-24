<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderManipulationHistory extends Model
{

    protected $table = 'order_manipulation_histories';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = [
        'order_id', 'action', 'new_orders', 'new_file', 'delete_pages', 'created_by', 'ip'
    ];
}
