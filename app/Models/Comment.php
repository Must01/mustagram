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

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function commentLikes()
    {
        $likes = Like::where('comment_id', $this->id)->get()->pluck('user_id');

        return User::whereIn('_id', $likes)->get();
    }
}
