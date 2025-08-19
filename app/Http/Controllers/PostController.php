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
        $posts = Post::with('user','comments','likes')->latest()->get();
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
            'caption' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // loop through each file and store them + add to images array
        foreach (request()->file('images') as $file) {
            $imagePath = $file->store('uploads', 'public');
            # Check if the image was uploaded successfully
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

        return redirect()->route('profile.show', auth()->user()->id )->with('success', 'Post created successfuly');
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
                Storage::disk('public')->delete($dbimage);
            }
        }

        // 4 - check for new images then we save them into storage
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file) {
            $newImages[] = $file->store('uploads', 'public');
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
            Storage::disk('public')->delete($image);
        } 
        
        // Delete the post
        $post->delete();

        return redirect()->route('profile.show', auth()->user()->id)->with('success', 'Post deleted successfuly');
    }
}