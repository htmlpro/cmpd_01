<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZeroReportLog extends Model
{
    protected $table = 'zero_report_logs';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
