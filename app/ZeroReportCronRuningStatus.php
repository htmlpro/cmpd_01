<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZeroReportCronRuningStatus extends Model
{
    protected $table = 'zero_report_cron_runing_statuses';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
