<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
         'title', 'slug', 'content', 'user_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
