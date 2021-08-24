<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrixMaster extends Model
{

    protected $table = 'pmp_matrix_master';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = [
        'version', 'pmp_state_id', 'field_id', 'field_type', 'rule', 'created_by'
    ];
}
