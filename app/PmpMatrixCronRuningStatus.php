<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmpMatrixCronRuningStatus extends Model
{
    protected $table = 'pmp_matrix_cron_runing_status';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
