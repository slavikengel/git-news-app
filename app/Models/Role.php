<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slug',
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User', 'role_users', 'role_id', 'user_id');
//        return $this->belongsToMany(User::class);
    }
}
