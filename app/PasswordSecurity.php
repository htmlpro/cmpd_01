<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordSecurity extends Model
{

    protected $table = 'password_securities';
    protected $primaryKey = 'id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array|$guarded
     */
    protected $guarded = ['id'];

    /**
     * Get the user records associated with PasswordSecurity
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
