<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Post extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'posts'; // collection

    protected $casts = [
        'image_path' => 'array',
    ];


    protected $fillable = [
        'caption',
        'image_path',
        'image_url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function postLikes()
    {
        $likes = Like::where('post_id', $this->id)->get()->pluck('user_id');
        return User::whereIn('_id', $likes)->get();
    }
}
