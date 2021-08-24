<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllQueueSummary extends Model
{
    protected $table = 'all_queue_summaries';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];
}
