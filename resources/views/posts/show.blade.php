@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-5xl px-2 sm:px-4">
        <div class="overflow-hidden rounded-lg border border-gray-300 bg-white">
            <!-- success messages -->
            <x-message />

            <div class="md:flex">
                <!-- Image Section -->
                <x-image-carousel :post="$post" />

                <!-- Content Section -->
                <div class="flex flex-col md:w-2/5">
                    <!-- Post Header -->
                    <div class="flex items-center justify-between border-b border-gray-200 p-2 sm:p-3">
                        <div class="flex items-center space-x-2">
                            @if ($post->user)
                                <div class="flex items-center">
                                    <x-profile-img :user="$post->user" :isSmall="true" />
                                    <a href="{{ route('profile.show', $post->user->id) }}"
                                        class="ml-3 font-semibold text-gray-900 hover:text-gray-700">
                                        {{ $post->user->username ? $post->user->username : $post->user->name }}
                                    </a>
                                </div>
                                <div>
                                    <x-follow-button :post="$post" />
                                </div>
                            @else
                                <img loading="lazy" src="https://via.placeholder.com/40"
                                    class="h-8 w-8 rounded-full object-cover">
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

                    <!-- Caption Section -->
                    <div class="h-fit min-h-10 overflow-y-auto p-2">
                        <!-- Caption -->
                        @if ($post->user)
                            <div class="flex items-center space-x-1">
                                <x-profile-img :user="$post->user" :isSmall="true" />
                                <p class="text-xs sm:ml-1 sm:text-sm">
                                    <span class="font-semibold text-gray-900">{{ $post->user->username }}</span>
                                    {{ $post->caption }}
                                </p>
                            </div>
                        @else
                            <div class="text-gray-900">{{ $post->caption }}</div>
                        @endif
                    </div>

                    <!-- Comments -->
                    <div class="min-h-10 flex-1 space-y-1 overflow-y-auto overflow-x-hidden border-t border-gray-200 px-2">
                        @if ($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                <div class="flex items-start justify-between">
                                    {{-- comment user / content --}}
                                    <div class="flex items-center gap-x-1">
                                        @if ($comment->user)
                                            @if (auth()->user()->profile_img)
                                                <x-profile-img :user="$comment->user" isSmall="true" />
                                            @else
                                                <span
                                                    class="h-5.5 w-5.5 flex cursor-pointer items-center justify-center rounded-full bg-gray-500 text-6xl font-bold text-gray-900">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                            @endif
                                            <span
                                                class="ml-0.5 mr-0.5 text-[13px] font-semibold text-gray-900">{{ $comment->user->name }}</span>
                                            <p class="text-xs">{{ $comment->comment }}</p>
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
                                                <button type="submit"
                                                    class="flex gap-0.5 text-gray-700 hover:text-red-900">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
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
                        @else
                            <div
                                class="flex h-full min-h-20 w-full flex-col items-center justify-center text-xs sm:text-sm">
                                <p>There is no comments!</p>
                                <span>don't be shy! create it 😒.</span>
                            </div>
                        @endif
                    </div>

                    <!-- Actions Section -->
                    <div class="border-t border-gray-200">
                        <!-- Like / countLikes / Date -->
                        <div class="flex flex-col items-start p-2 sm:p-4">
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

                            <!-- Like Count -->
                            <div
                                class="likes-modal-container cursor-pointer text-center text-sm font-normal sm:text-lg sm:font-semibold">
                                <div class="likes-modal-btn text-start">
                                    <span class="flex-start text-xs text-gray-900 sm:text-sm">{{ $post->likes->count() }}
                                        likes</span>
                                </div>
                                <x-likes-card :user="$post" name="post" />
                            </div>

                            <div>
                                <span
                                    class="text-xs uppercase text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>



                        <!-- Add Comment -->
                        <div class="border-t border-gray-200 p-2 sm:p-4">
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

        // likes modal 
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.likes-modal-container').forEach((container) => {
                const btn = container.querySelector('.likes-modal-btn');
                const overlay = container.querySelector('.likes-modal-overlay');
                const content = container.querySelector('.likes-modal-content');
                const closebtn = container.querySelector('.likes-modal-close-btn');

                // show the card
                btn.addEventListener('click', () => {
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                })

                // hide the card on button click
                closebtn.addEventListener('click', () => {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                })

                // hide the card on outside click
                overlay.addEventListener('click', () => {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                })
            });
        });
    </script>
@endsection
