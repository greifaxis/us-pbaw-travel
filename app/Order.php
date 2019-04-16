<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\Offer;

class Order extends Model
{
    public function offers()
    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class)->withTimestamps();
        return $this->belongsToMany(Offer::class, 'offer_order')->withTimestamps();
    }
}
