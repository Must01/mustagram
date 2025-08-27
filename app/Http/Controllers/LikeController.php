<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Like a post. 
     */
    public function likePost(Post $post) {
        $post->likes()->updateOrCreate([
            'user_id' => auth()->id(),
        ]);

        return back();
    }

    
    public function unlikePost(Post $post) {
        $post->likes()->where('user_id', auth()->id())->delete();

        return back();
    }


    /**
     * Like a comment.
     */

    public function likeComment(Comment $comment) {
        $comment->likes()->updateOrCreate([
            'user_id' => auth()->id(),
        ]);

        return back();
    }
    public function unlikeComment(Comment $comment) {
        $comment->likes()->where('user_id', auth()->id())->delete();

        return back();
    }



}
