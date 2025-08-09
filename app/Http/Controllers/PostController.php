<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        // array to hold image paths
        $images = [];

        // validate the post request
        $data = $request->validate([
            'caption' => 'required',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // loop through each file and store them + add to images array
        foreach (request()->file('images') as $file) {
            $imagePath = $file->store('uploads', 'public');
            # Check if the image was uploaded successfully (made with ai not really understand it)
            if (!$imagePath) {
                return back()->withErrors(['image' => 'Failed to upload image.']);
            }
            $images[] = $imagePath;
        }

        // create the post with the current authenticated user
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image_path' => $images
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Check if the authenticated user is the same as the post user
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        // validate the request
        $data = $request->validate([
            'caption' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updatedImages = [];

        // get old images and decode them
        $oldImages = json_decode($post->image_path ?? '[]', true);

        // loop over each file and check if they exist ? save in new array : store them
        foreach($request->file('images') as $file) {
            if (in_array($file, $oldImages)) {
                $updatedImages[] = $file;
            } else {
                $updatedImages[] = $file->store('uploads', 'public');
            }
        }

        // Check if the authenticated user is the same as the post user
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        // store teh data 
        $data = $request->validate([
            'caption' => request('caption'),
            'image_path' => $updatedImages ? $updatedImages : $oldImages, //key old if there is no new images
        ]);

        // update the post
        $post->update($data);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        // Check if the authenticated user is the same as the post user
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Delete the image file
        Storage::disk('public')->delete($post->image_path);
        
        // Delete the post
        $post->delete();

        return redirect('/profile/' . auth()->user()->id);
    }
}