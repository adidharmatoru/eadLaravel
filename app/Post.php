<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ["id", "user_id", "caption", "image", "likes"];

    public function comments()
    {
        return $this->hasMany('App\Komentar_Post', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
