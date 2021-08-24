<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmpDispenserLog extends Model
{
    protected $table = 'pmp_dispenser_logs';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
