<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{

    protected $table = 'formulas';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the client records associated with Formula
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Get the prescription records associated with Formula
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'formula_id', 'formula_id');
    }

    /**
     * Get the vial records associated with Formula
     */
    public function vial()
    {
        return $this->hasMany('App\Vial', 'formula_id', 'formula_id');
    }
}
