@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
        <!-- Profile Header Section -->
        <div class="mb-12 flex flex-col items-center gap-8 md:flex-row md:items-start">
            <!-- Profile Image -->
            <div class="flex-shrink-0">
                <x-profile-img :user="$user" :isSmall="false" />
            </div>

            <!-- Profile Info -->
            <div class="flex-1 text-center md:text-left">
                <!-- Username and Edit Button -->
                <div class="mb-6 flex flex-col items-center justify-center gap-4 sm:flex-row md:justify-start">
                    <h1 class="text-3xl font-light text-gray-900">{{ $user->username }}</h1>
                    @if (auth()->id() === $user->id)
                        <a href="{{ route('profile.edit', $user->id) }}"
                            class="rounded-lg border border-gray-300 px-2 py-1 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-100 sm:px-4 sm:py-2 sm:text-lg">
                            Edit Profile
                        </a>
                    @endif
                </div>

                <!-- Stats -->
                <div class="mb-3 flex justify-center gap-8 sm:mb-6 md:justify-start">
                    <div class="rounded-md p-1 text-center text-sm font-normal sm:px-2 sm:py-1 sm:text-lg sm:font-semibold">
                        <span class="text-gray-900">{{ $user->posts->count() }}</span>
                        <span class="ml-1 text-gray-600">posts</span>
                    </div>
                    <div
                        class="modal-container cursor-pointer rounded-md p-1 text-center text-sm font-normal transition-colors duration-200 hover:bg-indigo-50 sm:px-2 sm:py-1 sm:text-lg sm:font-semibold">
                        <div class="modal-btn">
                            <span class="text-gray-900">{{ $user->followers()->count() }}</span>
                            <span class="ml-1 text-gray-600">followers</span>
                        </div>
                        <x-follow-card :user="$user" name="followers" />
                    </div>
                    <div
                        class="modal-container cursor-pointer rounded-md p-1 text-center text-sm font-normal transition-colors duration-200 hover:bg-indigo-50 sm:px-2 sm:py-1 sm:text-lg sm:font-semibold">
                        <div class="modal-btn">
                            <span class="text-gray-900">{{ $user->following()->count() }}</span>
                            <span class="ml-1 text-gray-600">following</span>
                        </div>
                        <x-follow-card :user="$user" name="following" />
                    </div>
                </div>

                <!-- Name and Bio -->
                <div class="max-w-lg">
                    <h2 class="font-semibold text-gray-900">{{ $user->name }}</h2>
                    @if ($user->bio)
                        <p class="leading-relaxed text-gray-600">{{ $user->bio }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- success messages --}}
        <x-message />

        <!-- Posts Grid -->
        @if ($user->posts->count() > 0)
            <div class="border-t border-gray-200 pt-2 sm:pt-4">
                <div class="grid grid-cols-3 gap-0.5 sm:grid-cols-2 sm:gap-4 md:gap-6 lg:grid-cols-3">
                    @foreach ($user->posts as $post)
                        <a href="{{ route('posts.show', $post->id) }}" class="block h-full w-full">
                            <div class="group relative aspect-square cursor-pointer">
                                <img src=" {{ Storage::disk('cloudinary')->url($post->image_path[0]) }} "
                                    class="h-full w-full rounded-lg object-cover shadow-sm transition-shadow duration-200 group-hover:shadow-md"
                                    alt="Post image">
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/20 bg-opacity-50 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                    <div class="flex space-x-6 text-lg font-semibold">
                                        <div class="flex items-center space-x-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                            </svg>
                                            <span>{{ $post->likes->count() }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M18 10c0 3.866-3.582 7-8 7a8.83 8.83 0 01-4.964-1.528L2 17l1.528-2.964A8.83 8.83 0 014 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" />
                                            </svg>
                                            <span>{{ $post->comments->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="border-t border-gray-200 pb-8 pt-16">
                <div class="text-center">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">
                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-medium text-gray-900">No posts yet</h3>
                    <p class="text-gray-500">Start sharing your moments!</p>
                </div>
            </div>
        @endif
    </div>
@endsection


<script>
    // hide message (success)
    function hideMessage(message) {
        const el = document.getElementById(message);
        if (el) el.remove();
    }

    // follow card toggle
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.modal-container').forEach((container) => {
            const btn = container.querySelector('.modal-btn');
            const overlay = container.querySelector('.modal-overlay');
            const content = container.querySelector('.modal-content');
            const closebtn = container.querySelector('.modal-close-btn');

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
