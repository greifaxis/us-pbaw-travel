<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    //    Table Name
    protected $table = 'baskets';
//    Primary Key
    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    protected $fillable = [
        'quantity','value'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
