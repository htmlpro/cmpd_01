<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePrice extends Model
{

    protected $table = 'invoice_prices';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array|$fillable
     */
    protected $fillable = ['order_id', 'rx_id', 'formula_id', 'price', 'created_by', 'updated_by'];

    /**
     * To get the prescriptions records associated with Prescription
     */
    public function prescriptions()
    {
        return $this->belongsTo('App\Prescription', 'rx_id', 'rx_id');
    }
}
