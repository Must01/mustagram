@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Profile Header Section -->
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-12">
        <!-- Profile Image -->
        <div class="flex-shrink-0">
            <img src="{{ $user->profile_img ? asset('storage/' . $user->profile_img) : 'https://via.placeholder.com/150' }}" 
                class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-gray-200 shadow-lg">
        </div>
        
        <!-- Profile Info -->
        <div class="flex-1 text-center md:text-left">
            <!-- Username and Edit Button -->
            <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4 mb-6">
                <h1 class="text-3xl font-light text-gray-900">{{ $user->username }}</h1>
                @if(auth()->id() === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Edit Profile
                    </a>
                @endif
            </div>
            
            <!-- Stats -->
            <div class="flex justify-center md:justify-start gap-8 mb-6">
                <div class="text-center">
                    <span class="font-semibold text-gray-900">{{ $user->posts->count() }}</span>
                    <span class="text-gray-600 ml-1">posts</span>
                </div>
                <div class="text-center">
                    <span class="font-semibold text-gray-900">0</span>
                    <span class="text-gray-600 ml-1">followers</span>
                </div>
                <div class="text-center">
                    <span class="font-semibold text-gray-900">0</span>
                    <span class="text-gray-600 ml-1">following</span>
                </div>
            </div>
            
            <!-- Name and Bio -->
            <div class="max-w-lg">
                <h2 class="font-semibold text-gray-900 mb-2">{{ $user->name }}</h2>
                @if($user->bio)
                    <p class="text-gray-600 leading-relaxed">{{ $user->bio }}</p>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Posts Grid -->
    @if($user->posts->count() > 0)
        <div class="border-t border-gray-200 pt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($user->posts as $post)
                    <div class="relative aspect-square group cursor-pointer">
                        <a href="{{ route('posts.show', $post->id) }}" class="block w-full h-full">
                            <img src="{{ asset('storage/' . $post->image_path[0]) }}" 
                                class="w-full h-full object-cover rounded-lg shadow-sm group-hover:shadow-md transition-shadow duration-200"
                                alt="Post image">
                        </a>
                        <div class="absolute inset-0 bg-black/20 bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white">
                            <div class="flex space-x-6 text-lg font-semibold">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 20 20" fill="currentColor"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                                <span>{{ $post->likes->count() }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 20 20" fill="currentColor"><path d="M18 10c0 3.866-3.582 7-8 7a8.83 8.83 0 01-4.964-1.528L2 17l1.528-2.964A8.83 8.83 0 014 10c0-3.866 3.582-7 8-7s8 3.134 8 7z"/></svg>
                                <span>{{ $post->comments->count() }}</span>
                            </div>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
    @else
        <div class="border-t border-gray-200 pt-16 pb-8">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet</h3>
                <p class="text-gray-500">Start sharing your moments!</p>
            </div>
        </div>
    @endif
</div>
@endsection