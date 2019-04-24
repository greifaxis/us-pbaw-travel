<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\Relations\Pivot;

class OfferOrder extends Model
{
    protected $guarded = [
        'offer_id', 'order_id'
    ];

    protected $fillable = [
        'places'
    ];
}
