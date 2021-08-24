<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model 
{

    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
    /**
     * Get the document records associated with patient
     */
    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'identification');
    }
}
