<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchMethod extends Model
{

    protected $table = 'dispatch_methods';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['dispatch_method'];

    /**
     * Get the dispatch records associated with Dispatch Method
     */
    public function dispatch()
    {
        return $this->belongsTo('App\Dispatch', 'dispatch_method', 'id');
    }
}
