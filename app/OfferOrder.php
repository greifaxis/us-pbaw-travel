<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\Relations\Pivot;

class OfferOrder extends Model
{
    protected $table = 'offer_order';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [
        'offer_id', 'order_id'
    ];

    protected $fillable = [
        'quantity','value'
    ];
}
