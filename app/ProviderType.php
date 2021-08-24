<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderType extends Model 
{

    protected $table = 'provider_types';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

}
