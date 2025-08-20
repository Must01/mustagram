<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        // Check if the authenticated user is the same as the profile user
        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Check if the authenticated user is the same as the profile user
        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'bio' => 'nullable',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->file('image')) {
            // Delete old profile image if exists
            if ($user->profile_image) {
                Storage::disk('cloudinary')->delete($user->profile_image);
            }
            
            $imagePath = Storage::disk('cloudinary')->putFile('public', $request->file('image'));
            $data['profile_img'] = $imagePath;
        }

        $user->update($data);

        return redirect()->view('profile.show' , $user->id);
    }
}