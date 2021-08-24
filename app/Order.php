<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $table = 'orders';

    use SoftDeletes;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'provider_id', 'client_id', 'patient_id', 'medication_id', 'rx_id', 'source', 'page_count', 'stage_name', 'attachment_id', 'created_by', 'updated_by', 'deleted_at'];

    /**
     * Get the attachments record associated with the user.
     */
    public function attachment()
    {
        return $this->hasOne('App\Attachment');
    }

    /**
     * Get the patient records associated with order
     */
    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }

    /**
     * Get the provider records associated with order
     */
    public function provider()
    {
        return $this->hasOne('App\Provider', 'id', 'provider_id');
    }

    /**
     * Get the prescription records associated with order
     */
    public function prescription()
    {
        return $this->hasMany('App\Prescription', 'order_id', 'order_id');
    }

    /**
     * Get the client records associated with order
     */
    public function client()
    {
        return $this->hasOne('App\Provider', 'provider_status', 'provider_id')
                        ->where('provider_status', 3);
    }

    /**
     * Get the order_stage_relations records associated with order
     */
    public function orderStageRealtion()
    {
        return $this->hasOne('App\OrderStageRelation', 'order_id', 'order_id');
    }

    /**
     * Get the dispatch records associated with order
     */
    public function dispatchDetails()
    {
        return $this->hasOne('App\Dispatch', 'order_id', 'order_id');
    }

    /**
     * Get the note records associated with order
     */
    public function noteDetails()
    {
        return $this->hasOne('App\Note', 'order_id', 'order_id');
    }

    /**
     * Get the order history records associated with order
     */
    public function orderHistory()
    {
        return $this->hasMany('App\OrderHistory', 'order_id', 'order_id');
    }
    
    /**
     * To get user details, who created order
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
