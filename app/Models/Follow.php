<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Follow extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'follow'; // collection

    protected $fillable = [
        'follower_id', // me
        'following_id' // the one i follow
    ];

    // who did the following?
    public function follower() {
        return $this->belongsTo(User::class, 'follower_id');
    }

    // who is being followed?
    public function following() {
        return $this->belongsTo(User::class, 'following_id');
    }

}
