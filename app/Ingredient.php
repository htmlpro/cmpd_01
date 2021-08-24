<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{

    protected $table = 'ingredients';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = [
        'name', 'genric_name', 'form', 'purity', 'strength', 'schedule', 'ndc', 'price_date', 'price_code', 'current_lotnumber', 'wholesaler_pack_size', 'wholesaler_pack_units', 'stock_on_hands', 'min_reorder_qty', 'exp_date', 'total_qty_used', 'date_cleared_qty_used', 'date_last_used', 'shape', 'picture', 'molecular_formula', 'common_uses', 'water_of_hydration', 'molecular_weight', 'melting_point', 'boiling_point', 'specific_gravity', 'specific_density', 'ph_stability_range', 'storage_information', 'solubility', 'solubility', 'unit_price', 'unit_price_date', 'active_ingredient', 'package_cost', 'unit_cost', 'ipaddress', 'status', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at'
    ];
}
