<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RxOrigin extends Model
{

    protected $table = 'rx_origins';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the prescription records associated with RxOrigin.
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'rx_origin', 'id');
    }
}
