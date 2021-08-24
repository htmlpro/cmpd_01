<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vial extends Model
{

    protected $table = 'vials';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the client records associated with Vial
     */
    public function client()
    {
        return $this->belongsTo('App\Client', 'formula_id', 'client_id');
    }

    /**
     * Get the formula records associated with Vial
     */
    public function formula()
    {
        return $this->belongsTo('App\Formula');
    }
}
