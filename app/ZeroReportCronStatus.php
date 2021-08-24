<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZeroReportCronStatus extends Model
{
    protected $table = 'zero_report_cron_statuses';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
