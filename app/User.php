<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    protected $primaryKey = 'id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array|$hidden
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the passwordSecurity records associated with User
     */
    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }

    /**
     * Get orders associated with user
     */
    public function orderUser()
    {
        $this->hasOne('App\OrderHistory', 'id', 'created_by');
    }

    /**
     * To get prescription details associated with the user
     */
    public function prescription()
    {
        $this->hasOne('App\Prescription', 'created_by', 'id');
    }
}
