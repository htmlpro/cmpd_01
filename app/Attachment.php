<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $table = 'attachments';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['message_id', 'file_name', 'file_path'];

    /**
     * Get the user that owns the attachment.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
