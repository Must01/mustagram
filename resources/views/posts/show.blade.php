@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-5xl px-4">
        <div class="overflow-hidden rounded-lg border border-gray-300 bg-white">
            <!-- success messages -->
            @if (session('success'))
                <div id="success" class="mb-4 flex items-center border-t-4 border-green-300 bg-green-50 p-4 text-green-800"
                    role="alert">
                    <svg class="h-4 w-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button" onclick='hideMessage("success")'
                        class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg bg-green-50 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif ()

            <div class="md:flex">
                <!-- Image Section -->
                <x-image-carousel :post="$post" />

                <!-- Content Section -->
                <div class="flex flex-col md:w-2/5">
                    <!-- Post Header -->
                    <div class="flex items-center justify-between border-b border-gray-200 p-4">
                        <div class="flex items-center">
                            @if ($post->user)
                                <img src="{{ $post->user->profile_img ? asset('storage/' . $post->user->profile_img) : 'https://via.placeholder.com/40' }}"
                                    class="h-8 w-8 rounded-full object-cover">
                                <a href="{{ route('profile.show', $post->user->id) }}"
                                    class="ml-3 font-semibold text-gray-900 hover:text-gray-700">
                                    {{ $post->user->username }}
                                </a>
                            @else
                                <img src="https://via.placeholder.com/40" class="h-8 w-8 rounded-full object-cover">
                                <span class="ml-3 text-gray-500">Deleted User</span>
                            @endif
                        </div>

                        @if (auth()->id() === $post->user_id)
                            <div class="relative">
                                <button
                                    class="post-options-toggle cursor-pointer rounded-md p-0.5 text-gray-400 hover:bg-gray-200 hover:text-gray-600">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <div
                                    class="post-options-menu absolute right-0 z-10 mt-2 hidden w-32 rounded-md border border-gray-200 bg-white shadow-lg">
                                    <div class="py-1">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-gray-100"
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
                    <div class="h-fit min-h-20 flex-1 overflow-y-auto p-4">
                        <!-- Caption -->
                        @if ($post->user)
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . $post->user->profile_img) }}"
                                    class="h-5.5 w-5.5 mr-2 rounded-full object-cover" />
                                <span class="mr-2 font-semibold text-gray-900">{{ $post->user->username }}</span>
                                <span class="text-gray-900">{{ $post->caption }}</span>
                            </div>
                        @else
                            <div class="text-gray-900">{{ $post->caption }}</div>
                        @endif
                    </div>

                    <!-- Comments -->
                    <div class="border-t border-gray-200 px-2">
                        @foreach ($post->comments as $comment)
                            <div class="my-2 flex items-start justify-between">
                                {{-- comment user / content --}}
                                <div class="flex">
                                    @if ($comment->user)
                                        <img src="{{ asset('storage/' . $comment->user->profile_img) }}"
                                            class="h-5.5 w-5.5 mr-2 rounded-full object-cover" />
                                        <p class="text-[13px] text-gray-900">
                                            <span
                                                class="mr-0.5 text-xs font-semibold text-gray-900">{{ $comment->user->name }}</span>
                                            {{ $comment->comment }}
                                        </p>
                                    @else
                                        <span class="mr-2 font-semibold text-gray-500">Deleted User</span>
                                    @endif
                                </div>

                                <div class="flex items-center">
                                    {{-- comment like/unlike --}}
                                    @if ($comment->likes->where('user_id', auth()->id())->count() > 0)
                                        <form action="{{ route('unlike.comment', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex gap-0.5 text-red-500 hover:text-red-600">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>{{ $comment->likes->count() }}</span>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('likes.comment', $comment->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="flex gap-0.5 text-gray-700 hover:text-red-900">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                <span class="text-xs">{{ $comment->likes->count() }}</span>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- comment delete --}}
                                    @if (auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                            class="ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs text-gray-400 hover:text-red-500"
                                                onclick="return confirm('Delete this comment?')">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Actions Section -->
                    <div class="border-t border-gray-200">
                        <!-- Like/Comment Actions -->
                        <div class="flex items-center space-x-4 p-4">
                            @if ($post->likes->where('user_id', auth()->id())->count() > 0)
                                <form action="{{ route('unlike.post', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('likes.post', $post->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-gray-700 hover:text-gray-900">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
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
                            <span class="text-xs uppercase text-gray-500">{{ $post->created_at->format('F d, Y') }}</span>
                        </div>

                        <!-- Add Comment -->
                        <div class="border-t border-gray-200 p-4">
                            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="flex">
                                @csrf
                                <textarea name="comment" placeholder="Add a comment..." required
                                    class="max-h-15 flex-1 border-none text-sm placeholder-gray-500 outline-none"></textarea>
                                <button type="submit"
                                    class="cursor-pointer rounded-md bg-blue-500 px-3 py-1 text-sm font-semibold text-white hover:bg-blue-600">
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
        function hideMessage(message) {
            const el = document.getElementById(message);
            if (el) el.remove();
        }

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
