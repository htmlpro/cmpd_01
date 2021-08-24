<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientLocationCode extends Model 
{

    protected $table = 'patient_location_code';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}