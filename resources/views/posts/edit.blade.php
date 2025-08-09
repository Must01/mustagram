@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Post</h1>
        <p class="text-gray-600">Update your post caption</p>
    </div>
    
    <!-- Form -->
    <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
        <!-- Current Image -->
        <div class="w-full">
            <img src="{{ asset('storage/' . $post->image_path) }}" 
                 class="w-full h-auto object-cover" 
                 alt="Post image">
        </div>
        
        <!-- Edit Form -->
        <div class="p-6">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" class="space-y-6">
                @csrf
                @method('PATCH')
                
                <!-- Current User Info -->
                <div class="flex items-center mb-4">
                    <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : 'https://via.placeholder.com/40' }}" 
                         class="w-8 h-8 rounded-full object-cover">
                    <span class="ml-3 font-semibold text-gray-900">{{ auth()->user()->username }}</span>
                </div>
                
                <!-- Caption -->
                <div>
                    <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">
                        Caption
                    </label>
                    <textarea id="caption" 
                              name="caption" 
                              rows="4" 
                              placeholder="Write a caption..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 resize-none @error('caption') border-red-500 @enderror">{{ old('caption', $post->caption) }}</textarea>
                    
                    @error('caption')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex space-x-3">
                    <button type="submit" 
                            class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md text-sm font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                        Update Post
                    </button>
                    <a href="{{ route('posts.show', $post->id) }}" 
                       class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-md text-sm font-semibold text-center hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Post Info -->
    <div class="mt-6 text-center text-sm text-gray-500">
        <p>Posted {{ $post->created_at->diffForHumans() }}</p>
        <p>{{ $post->likes->count() }} likes • {{ $post->comments->count() }} comments</p>
    </div>
    
    <!-- Delete Post -->
    <div class="mt-6 text-center">
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="text-red-500 text-sm hover:text-red-600 hover:underline"
                    onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                Delete Post
            </button>
        </form>
    </div>
</div>
@endsection