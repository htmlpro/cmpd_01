<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $table = 'states';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mot mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the dispatch records associated with State
     */
    public function dispatch()
    {
        return $this->belongsTo('App\Dispatch', 'postal_code', 'state');
    }

    /**
     * Get the prescription records associated with State
     */
    public function prescription()
    {
        return $this->belongsTo('App\Prescription', 'rx_state', 'postal_code');
    }
}
