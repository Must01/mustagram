<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Like extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'likes'; // collection

    protected $fillable = [
        'user_id',
        'post_id',
        'comment_id'
    ];

    protected function post() {
        return $this->belongsTo(Post::class);
    }

    protected function comment() {
        return $this->belongsTo(Comment::class);
    }

    protected function user() {
        return $this->belongsTo(User::class);
    }
}
