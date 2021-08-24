<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmpDispenserResponse extends Model
{
    protected $table = 'pmp_dispenser_responses';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
