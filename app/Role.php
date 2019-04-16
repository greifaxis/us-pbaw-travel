<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*    protected $table = 'roles';
    //    Primary Key
        public $primaryKey = 'id';
    //    Timestamps
        public $timestamps = true;*/

    protected $fillable = [
        'created_at', 'updated_at'
    ];

    protected $guarded = [
        'id', 'role'
    ];

    /*    public function users()
        {
            return $this->belongsToMany('App\User', 'role_users')->withTimestamps();
        }*/

    public function users()
    {
        return $this->hasMany(User::class);
    }

}