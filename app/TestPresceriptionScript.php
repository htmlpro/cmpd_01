<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPresceriptionScript extends Model
{
    protected $table = 'test_presceription_scripts';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
