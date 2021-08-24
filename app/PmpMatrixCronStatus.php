<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmpMatrixCronStatus extends Model
{
    protected $table = 'pmp_matrix_cron_status';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
