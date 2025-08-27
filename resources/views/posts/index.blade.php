@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-2xl">
        @foreach ($posts as $post)
            @php
                $postId = 'post-' . $post->id;
            @endphp
            <div id="{{ $postId }}" class="mb-6 rounded-lg border border-gray-300 bg-white">
                <!-- Post Header -->
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-2">
                        @if ($post->user)
                            <a href="{{ route('profile.show', $post->user->id) }}"
                                class="flex cursor-pointer items-center space-x-2">
                                <x-profile-img :user="$post->user" :isSmall="true" />
                                <span
                                    class="text-sm font-semibold text-gray-900 hover:text-gray-700 sm:text-base">{{ $post->user->username ? $post->user->username : $post->user->name }}
                                </span>
                            </a>
                            <x-follow-button type="post" :post="$post" />
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

                <!-- Post Image -->
                <div class="flex">
                    <x-image-carousel :post="$post" width="w-full" />
                </div>

                <!-- Post Actions -->
                <div class="p-4">
                    <!-- Like/Comment/Share -->
                    <div class="mb-4 flex items-center space-x-4">
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

                        <a href="{{ route('posts.show', $post->id) }}" class="text-gray-700 hover:text-gray-900">
                            <x-icon format="png" icon="black-comment" />
                        </a>
                    </div>

                    <!-- Like Count -->
                    <div
                        class="likes-modal-container cursor-pointer text-center text-sm font-normal sm:text-lg sm:font-semibold">
                        <div class="likes-modal-btn text-start">
                            <span class="flex-start text-gray-900">{{ $post->likes->count() }} likes</span>
                        </div>
                        <x-likes-card :user="$post" name="post" />
                    </div>

                    <a href="{{ route('posts.show', $post->id) }}">
                        <!-- Caption -->
                        <div class="mb-2">
                            @if ($post->user)
                                <span class="mr-1 font-semibold text-gray-900">{{ $post->user->username }}</span>
                            @endif
                            <span class="text-xs text-gray-900 sm:text-base">{{ $post->caption }}</span>
                        </div>
                    </a>

                    <!-- View Comments -->
                    @if ($post->comments->count() > 0)
                        <div class="mb-2">
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-sm text-gray-500 hover:text-gray-700">
                                View all {{ $post->comments->count() }} comments
                            </a>
                        </div>
                    @endif

                    <!-- Time -->
                    <div class="text-xs text-gray-500">
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @endforeach

        {!! $posts->links() !!}

        @if ($posts->isEmpty())
            <div class="py-12 text-center">
                <div class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-full bg-gray-100">
                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">No posts yet</h3>
                <p class="mb-4 text-gray-500">Start following people to see their posts in your feed.</p>
                <a href="{{ route('posts.create') }}"
                    class="inline-flex items-center rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                    Create your first post
                </a>
            </div>
        @endif
    </div>
@endsection

<script>
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
