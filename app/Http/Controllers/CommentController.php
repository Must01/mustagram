<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post) 
    {
        $data = $request->validate([
            'comment' => 'required|max:255',
        ]);

        $post->comments()->create([
            'comment' => $data['comment'],
            'user_id' => auth()->id(),
        ]);

        return redirect('/posts/' . $post->id);
    }

    public function destroy (Comment $comment) {
        // check if the authenticated user is the owner of the comment
        if (auth()->user()->id !== $comment->user_id) {
            abort(403 , 'Unauthorized action.');
        }

        $comment->delete();

        return redirect('/posts/' . $comment->post_id);
    }
}
