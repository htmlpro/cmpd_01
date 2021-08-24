<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the order records associated with Patient
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'patient_id', 'id');
    }
    
    /**
     * Get the document records associated with Patient
     */
    public function document()
    {
        return $this->belongsTo('App\Document', 'identification', 'id');
    }
    
    /**
     * Get the species records associated with patient
     */
    public function species()
    {
        return $this->belongsTo('App\Species', 'species', 'id');
    }
}
