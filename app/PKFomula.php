<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PKFomula extends Model
{
    protected $table = 'pk_formula';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
