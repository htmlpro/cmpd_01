<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{

    protected $table = 'service_types';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dispatch_method_id', 'service_type'];

    /**
     * To get the prescriptions records associated with Prescription
     */
    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'service_type', 'id');
    }
}
