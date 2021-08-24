<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScriptCounter extends Model
{

    protected $table = 'script_counters';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['type', 'start_counter'];
}
