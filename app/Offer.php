<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\Order;

class Offer extends Model
{
    //    Table Name
    protected $table = 'offers';
//    Primary Key
    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    protected $dates = ['date_begin', 'date_end'];

    protected $casts = [
        'images' => 'array',
    ];

    public function orders()
    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class)->withTimestamps();
        return $this->belongsToMany('App\Order', 'offer_order', 'offer_id', 'order_id')->withPivot('quantity')->withTimestamps();
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
