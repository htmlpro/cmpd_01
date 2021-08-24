<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoices';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dispatch_id', 'service_type', 'weight', 'package_type', 'dimension_l', 'dimension_w', 'dimension_h', 'tracking', 'order_id', 'price', 'delivery_price', 'unit', 'created_by', 'updated_by', 'deleted_at'];

    /**
     * Get the dispatch records associated with Invoice
     */
    public function dispatch()
    {
        return $this->hasMany('App\Dispatch', 'dispatch_id', 'dispatch_id');
    }

    /**
     * Get the dispatch records associated with Invoice
     */
    public function invoicePrice()
    {
        return $this->hasMany('App\InvoicePrice', 'dispatch_id', 'dispatch_id');
    }

    /**
     * Get the service type records associated with Invoice
     */
    public function invoiceServiceType()
    {
        return $this->hasOne('App\ServiceType', 'id', 'service_type');
    }
}
