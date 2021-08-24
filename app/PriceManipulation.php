<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceManipulation extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'price_manipulations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['provider_id', 'provider_type', 'formula_id', 'price', 'created_at', 'updated_at'];
}
