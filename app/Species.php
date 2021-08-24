<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = 'species';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
    /**
     * Get the species records associated with patient
     */
    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'species');
    }
}
