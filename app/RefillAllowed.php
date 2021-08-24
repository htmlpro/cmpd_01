<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefillAllowed extends Model
{

    protected $table = 'refill_alloweds';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the order records associated with Prescription
     */
    public function prescriptions()
    {
        return $this->belongsTo('App\Prescription', 'rx_id', 'rx_id');
    }
}
