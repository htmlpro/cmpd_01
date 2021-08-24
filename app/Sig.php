<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sig extends Model
{
    protected $table = 'sig_codes';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass not assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}