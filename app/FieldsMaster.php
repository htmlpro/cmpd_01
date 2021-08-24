<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldsMaster extends Model
{

    protected $table = 'pmp_fields_master';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = [
        'field_name', 'created_by'
    ];
}
