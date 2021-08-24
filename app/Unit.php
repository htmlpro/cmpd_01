<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $table = 'units';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the prescription records associated with Unit
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'units', 'id');
    }
}
