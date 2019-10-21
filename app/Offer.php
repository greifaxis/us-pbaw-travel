<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
        return $this->belongsToMany(Order::class)->withPivot('quantity','value')->withTimestamps();
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
