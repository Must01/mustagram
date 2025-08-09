@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4">
    @foreach($posts as $post)
        <div class="bg-white border border-gray-300 rounded-lg mb-6">
            <!-- Post Header -->
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center">
                    @if($post->user)
                        <img src="{{ $post->user->profile_img ? asset('storage/' . $post->user->profile_img) : 'https://via.placeholder.com/40' }}" 
                             class="w-8 h-8 rounded-full object-cover">
                        <a href="{{ route('profile.show', $post->user->id) }}" 
                           class="ml-3 font-semibold text-gray-900 hover:text-gray-700">
                            {{ $post->user->username }}
                        </a>
                    @else
                        <img src="https://via.placeholder.com/40" 
                             class="w-8 h-8 rounded-full object-cover">
                        <span class="ml-3 text-gray-500">Deleted User</span>
                    @endif
                </div>
                
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                    </svg>
                </button>
            </div>
            
            <!-- Post Image -->
            <x-image-carousel :post="$post" width="w-full"/>
            
            <!-- Post Actions -->
            <div class="p-4">
                <!-- Like/Comment/Share -->
                <div class="flex items-center space-x-4 mb-4">
                    @if($post->likes->where('user_id', auth()->id())->count() > 0)
                        <form action="{{ route('unlike.post', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('likes.post', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-gray-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                    
                    <a href="{{ route('posts.show', $post->id) }}" class="text-gray-700 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </a>
                    
                    <button class="text-gray-700 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>
                </div>
                
                <!-- Like Count -->
                <div class="mb-2">
                    <span class="font-semibold text-gray-900">{{ $post->likes->count() }} likes</span>
                </div>
                
                <!-- Caption -->
                <div class="mb-2">
                    @if($post->user)
                        <span class="font-semibold text-gray-900 mr-1">{{ $post->user->username }}</span>
                    @endif
                    <span class="text-gray-900">{{ $post->caption }}</span>
                </div>
                
                <!-- View Comments -->
                @if($post->comments->count() > 0)
                    <div class="mb-2">
                        <a href="{{ route('posts.show', $post->id) }}" 
                           class="text-gray-500 text-sm hover:text-gray-700">
                            View all {{ $post->comments->count() }} comments
                        </a>
                    </div>
                @endif
                
                <!-- Time -->
                <div class="text-xs text-gray-500 uppercase">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    @endforeach
    
    @if($posts->isEmpty())
        <div class="text-center py-12">
            <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No posts yet</h3>
            <p class="text-gray-500 mb-4">Start following people to see their posts in your feed.</p>
            <a href="{{ route('posts.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Create your first post
            </a>
        </div>
    @endif
</div>
@endsection