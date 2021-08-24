<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{

    protected $table = 'package_types';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['id', 'dispatch_method_id', 'package_type'];
}
