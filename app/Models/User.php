<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use MongoDB\BSON\ObjectId; // Ensure this is imported for explicit casting
use Illuminate\Support\Str;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Notifiable;


    protected $connection = 'mongodb';
    protected $table = 'users'; // collection


    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_img',
        'bio',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    /**  Users I follow */
    // public function followingUsers()
    // {
    //     // 1. Get the IDs of the users this user is following from the 'follow' collection.
    //     //    We get the Follow documents first, then pluck the 'following_id' from them.
    //     $followingIds = Follow::where('follower_id', $this->id)->get()->pluck('following_id');

    //     // 2. Use those IDs to find the actual User models.
    //     return User::whereIn('_id', $followingIds)->get();
    // }

    /** Users who follow me */
    // public function followersUsers()
    // {
    //     // 1. Get the IDs of the users who are following this user from the 'follow' collection.
    //     $followerIds = Follow::where('following_id', $this->id)->get()->pluck('follower_id');

    //     // 2. Use those IDs to find the actual User models.
    //     return User::whereIn('_id', $followerIds)->get();
    // }

    // /** Check if the current user is following another user */
    // public function isFollowing(User $user): bool
    // {
    //     return Follow::where('follower_id', $this->id)
    //         ->where('following_id', $user->id)
    //         ->exists(); // add ->exists() to return a boolean
    // }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
