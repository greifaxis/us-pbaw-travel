<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
//    Table Name
    protected $table = 'hotels';
//    Primary Key
    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
