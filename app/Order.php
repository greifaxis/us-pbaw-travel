<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    protected $dates = ['placed_at', 'finished_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withPivot('quantity', 'value')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
