<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daw extends Model
{

    protected $table = 'daws';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * Get the prescription records associated with Daw
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'daw', 'code');
    }
}
