<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table = 'schedule';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the prescription records associated with Schedule
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'schedule', 'id');
    }
}
