<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $connection = 'mongodb';
    protected $table = 'users'; // collection


    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_img',
        'bio'
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

    protected function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected function likes()
    {
        return $this->hasMany(Like::class); 
    }

    protected function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
