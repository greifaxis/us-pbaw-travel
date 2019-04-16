<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\Order;

class Offer extends Model
{
    public function orders()
    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class)->withTimestamps();
        return $this->belongsToMany(Order::class, 'offer_order')->withTimestamps();
    }
}
