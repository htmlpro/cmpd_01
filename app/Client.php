<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * Get order associated with client
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get formula associated with client
     */
    public function formula()
    {
        return $this->hasMany('App\Formula', 'client_id');
    }

    /**
     * Get vial associated with client
     */
    public function vial()
    {
        return $this->hasMany('App\Vial', 'id');
    }
}
