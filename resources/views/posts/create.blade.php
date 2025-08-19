@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-lg px-4">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="mb-2 text-2xl font-bold text-gray-900">Create New Post</h1>
            <p class="text-gray-600">Share a photo with your followers</p>
        </div>

        <!-- Form -->
        <div class="rounded-lg border border-gray-300 bg-white p-6">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Image Upload -->
                <x-image-upload name="images" :multiple="true" />

                <!-- Caption -->
                <div>
                    <label for="caption" class="mb-2 block text-sm font-medium text-gray-700">
                        Caption
                    </label>
                    <textarea id="caption" name="caption" rows="4" placeholder="Write a caption..."
                        class="@error('caption') border-red-500 @enderror w-full resize-none rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('caption') }}</textarea>

                    @error('caption')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        class="flex-1 rounded-md bg-blue-500 px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Share Post
                    </button>
                    <a href="{{ route('posts.index') }}"
                        class="flex-1 rounded-md bg-gray-100 px-4 py-2 text-center text-sm font-semibold text-gray-700 transition-colors duration-200 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
