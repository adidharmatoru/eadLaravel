<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar_Post extends Model
{
    protected $table = "komentar_posts";

    protected $fillable = ["id", "user_id", "post_id", "comment"];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
