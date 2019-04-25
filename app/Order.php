<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class)->withTimestamps();
        return $this->belongsToMany('App\Offer', 'offer_order', 'offer_id', 'order_id')->withPivot('quantity')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
