<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyInfo extends Model 
{

    protected $table = 'pharmacy_info_master';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}