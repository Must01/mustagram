<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Post extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'posts'; // collection

    protected $fillable = [
        'caption', 
        'image_path',
        'image_url',
        'user_id'
    ];

    protected function user() {
        return $this->bleongsTo(User::class);
    }

    protected function comments() {
        return $this->hasMany(Comment::class);
    }

    protected function likes() {
        return $this->hasMany(Like::class);
    }
}
