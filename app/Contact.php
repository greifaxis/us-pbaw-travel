<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
//    Table Name
    protected $table = 'contacts';
//    Primary Key
    public $primaryKey = 'id';
//    Timestamps
    public $timestamps = true;
}
