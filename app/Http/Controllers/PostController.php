<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('user','comments','likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    // ✅ Step 1: Validate
    $data = $request->validate([
        'caption' => 'required|string|max:255',
        'images' => 'required|array',
        'images.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    // ✅ Step 2: Collect uploaded images
    $images = [];

    foreach ($request->file('images') as $file) {
        // Upload to Cloudinary
        $url = Storage::disk('cloudinary')->putFile('posts', $file);

        $images[] = $url->getSecurePath();
    }

    // ✅ Step 3: Save Post in DB
    auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image_path' => $images
    ]);

    return redirect()
        ->route('profile.show', auth()->user()->id)
        ->with('success', 'Post created successfully');
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
        $newImages =[];

        // 1 - Authentification
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 2 - Validate the request
        $data = $request->validate([
            'caption' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'oldImages' => 'nullable|array',
            'oldImages.*' => 'string'
        ]);

        // 3 - we delete images aren't on oldImages and add the other to the newImages,
        foreach($post->image_path as $dbimage) {
            if (in_array($dbimage, $request->input('oldImages', $post->image_path))) {
                $newImages[] = $dbimage;
            } else {
                Storage::disk('cloudinary')->delete($dbimage);
            }
        }

        // 4 - check for new images then we save them into storage
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file) {
                $newImages[] = Storage::disk('cloudinary')->putFile('posts', $file);
            }
        }

        // 5 - make sure there is no dublication 
        $newImages = array_values(array_unique($newImages));
        
        // 6 - store the data 
        $data = [
            'caption' => request('caption'),
            'image_path' => $newImages
        ];

        // 7 - update the post
        $post->update($data);

        // 8 - redirect
        return redirect()->route('posts.show',$post->id)->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Check if the authenticated user is the same as the post user
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Delete the image file
        foreach ($post->image_path as $image) {
            Storage::disk('cloudinary')->delete($image);
        } 
        
        // Delete the post
        $post->delete();

        return redirect()->route('profile.show', auth()->user()->id)->with('success', 'Post deleted successfuly');
    }
}