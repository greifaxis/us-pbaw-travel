<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_statuses';

    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
