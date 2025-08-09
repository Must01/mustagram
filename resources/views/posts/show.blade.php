@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4">
    <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
        <div class="md:flex">
            <!-- Image Section -->
            <x-image-carousel :post="$post" />

            <!-- Content Section -->
            <div class="md:w-2/5 flex flex-col">
                <!-- Post Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
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
                    
                    @if(auth()->id() === $post->user_id)
                        <div class="relative">
                            <button class="post-options-toggle text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                            <div class="post-options-menu hidden absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg border border-gray-200 z-10">
                                <div class="py-1">
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Comments Section -->
                <div class="p-4  overflow-y-auto h-fit min-h-20">
                    <!-- Caption -->
                    @if($post->user)
                        <div class="flex">
                            <span class="font-semibold text-gray-900 mr-2">{{ $post->user->username }}</span>
                            <span class="text-gray-900">{{ $post->caption }}</span>
                        </div>
                    @else
                        <div class="text-gray-900">{{ $post->caption }}</div>
                    @endif

                </div>

                <!-- Comments -->
                <div class="flex-1 border-t px-2 border-gray-200">
                    @foreach($post->comments as $comment)
                        <div class="flex my-2 items-start justify-between">
                            <div class="flex">
                                @if($comment->user)
                                    <span class="font-semibold text-gray-900 mr-2">{{ $comment->user->username }}</span>
                                @else
                                    <span class="font-semibold text-gray-500 mr-2">Deleted User</span>
                                @endif
                                <span class="text-gray-900">{{ $comment->comment }}</span>
                            </div>

                        @if($comment->likes->where('user_id', auth()->id())->count() > 0)
                            <form action="{{ route('unlike.comment', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{$comment->likes->count()}}</span>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('likes.comment', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-900">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span>{{$comment->likes->count()}}</span>
                                </button>
                            </form>
                        @endif

                            
                        @if(auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-gray-400 hover:text-red-500 text-xs"
                                        onclick="return confirm('Delete this comment?')">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                            
                        </div>
                    @endforeach
                </div>
                <!-- Actions Section -->
                <div class="border-t border-gray-200">
                    <!-- Like/Comment Actions -->
                    <div class="flex items-center p-4 space-x-4">
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
                    </div>
                    
                    <!-- Like Count -->
                    <div class="px-4 pb-2">
                        <span class="font-semibold text-gray-900">{{ $post->likes->count() }} likes</span>
                    </div>
                    
                    <!-- Date -->
                    <div class="px-4 pb-4">
                        <span class="text-xs text-gray-500 uppercase">{{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                    
                    <!-- Add Comment -->
                    <div class="border-t border-gray-200 p-4">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="flex">
                            @csrf
                            <input type="text" 
                                   name="comment" 
                                   placeholder="Add a comment..." 
                                   required
                                   class="flex-1 border-none outline-none text-sm placeholder-gray-500">
                            <button type="submit" 
                                    class="text-blue-500 font-semibold text-sm hover:text-blue-600">
                                Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const optionsToggle = document.querySelector('.post-options-toggle');
    const optionsMenu = document.querySelector('.post-options-menu');
    
    if (optionsToggle && optionsMenu) {
        optionsToggle.addEventListener('click', function() {
            optionsMenu.classList.toggle('hidden');
        });
        
        document.addEventListener('click', function(event) {
            if (!optionsToggle.contains(event.target) && !optionsMenu.contains(event.target)) {
                optionsMenu.classList.add('hidden');
            }
        });
    }
});
</script>
@endsection