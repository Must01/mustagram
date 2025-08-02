<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'comments';


    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];

    protected function post() {
        return $this->belongsTo(Post::class);
    }

    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function likes() {
        return $this->hasMany(Like::class);
    }
}
