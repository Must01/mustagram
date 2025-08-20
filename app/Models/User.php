<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function follow() 
    {
        return $this->hasMany(Follow::class , 'follower_id')->with('user');
    }

    // show me all the people that this user follow
    public function following() {
        return Follow::where('follower_id' , $this->id);
    }

    // show me all the people that followe this user
    public function followers() {
        return Follow::where('following_id', $this->id);
    }

    public function isFollowing($user) {
        return Follow::where(['follower_id' => $this->id , 'following_id' => $user->id]);
    }

    // Users I follow
    public function followingUsers() {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    // Users who follow me
    public function followersUsers() {
        return $this->hasMany(Follow::class, 'following_id');
    }

}
