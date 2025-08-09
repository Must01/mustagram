@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Create New Post</h1>
        <p class="text-gray-600">Share a photo with your followers</p>
    </div>
    
    <!-- Form -->
    <div class="bg-white border border-gray-300 rounded-lg p-6">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Image Upload -->
            <x-image-upload name="images" :multiple="true"/>

            <!-- Caption -->
            <div>
                <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">
                    Caption
                </label>
                <textarea id="caption" 
                          name="caption" 
                          rows="4" 
                          placeholder="Write a caption..."
                          class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 resize-none @error('caption') border-red-500 @enderror">{{ old('caption') }}</textarea>
                
                @error('caption')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit Buttons -->
            <div class="flex space-x-3">
                <button type="submit" 
                        class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md text-sm font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                    Share Post
                </button>
                <a href="{{ route('posts.index') }}" 
                   class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-md text-sm font-semibold text-center hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection