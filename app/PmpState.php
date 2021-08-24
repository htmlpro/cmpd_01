<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmpState extends Model
{
    protected $table = 'pmp_states';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
