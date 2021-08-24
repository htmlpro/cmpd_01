<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTableGrid extends Model
{
    protected $table = 'data_table_grids';
    protected $fillable = ['user_id', 'stage', 'column_order'];
}
