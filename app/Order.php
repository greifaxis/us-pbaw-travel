<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Offer;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class)->withTimestamps();
        return $this->belongsToMany('App\Offer', 'offer_order', 'offer_id', 'order_id')->withPivot('places')->withTimestamps();
    }
}
