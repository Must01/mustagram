@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-lg px-4">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="mb-2 text-2xl font-bold text-gray-900">Edit Post</h1>
            <p class="text-gray-600">Update your post caption</p>
        </div>

        <!-- Form -->
        <div class="overflow-hidden rounded-lg border border-gray-300 bg-white">
            <!-- Edit Form -->
            <div class="p-6">
                <form method="POST" action="{{ route('posts.update', $post->id) }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Current User Info -->
                    <div class="mb-4 flex items-center">
                        <img src="{{ auth()->user()->profile_img ? asset('storage/' . auth()->user()->profile_img) : 'https://via.placeholder.com/40' }}"
                            class="h-8 w-8 rounded-full object-cover">
                        <span class="ml-3 font-semibold text-gray-900">{{ auth()->user()->username }}</span>
                    </div>

                    <!-- Caption -->
                    <div>
                        <label for="caption" class="mb-2 block text-sm font-medium text-gray-700">
                            Caption
                        </label>
                        <textarea id="caption" name="caption" rows="4" placeholder="Write a caption..."
                            class="@error('caption') border-red-500 @enderror w-full resize-none rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('caption', $post->caption) }}</textarea>

                        @error('caption')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Images -->
                    <div class="w-full p-0.5">
                        <x-image-upload name="images" :post="$post" />

                    </div>

                    {{-- Errors --}}
                    @if ($errors->any())
                        <div class="mb-4 flex rounded-lg bg-red-400 p-4 text-sm text-white" role="alert">
                            <svg class="me-3 mt-[2px] inline h-4 w-4 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Ensure that these requirements are met:</span>
                                <ul class="mt-1.5 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Submit Buttons -->
                    <div class="flex space-x-3">
                        <button type="submit"
                            class="flex-1 cursor-pointer rounded-md bg-blue-500 px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update Post
                        </button>
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="flex-1 cursor-pointer rounded-md bg-gray-100 px-4 py-2 text-center text-sm font-semibold text-gray-700 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Post Info -->
        <div class="text-center text-sm text-gray-500">
            <p>Posted {{ $post->created_at->diffForHumans() }}</p>
            <p>{{ $post->likes->count() }} likes • {{ $post->comments->count() }} comments</p>
        </div>

        <!-- Delete Post -->
        <div class="mt-6 text-center">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-500 py-3 text-center text-sm text-white hover:bg-red-600"
                    onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                    Delete Post
                </button>
            </form>
        </div>
    </div>
@endsection
