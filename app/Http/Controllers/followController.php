<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class followController extends Controller
{
    public function follow(User $user) {
        // dd("so  " . auth()->user()->username." want to follow $user->username");

        Follow::create([
            'follower_id' => auth()->user()->id,
            'following_id' => $user->id,
        ]);

        return redirect()->back();
    }

    public function unfollow( User $user) {

        Follow::where(['follower_id' => auth()->user()->id, 'following_id'=> $user->id])->delete();

        return redirect()->back();
    }
}
