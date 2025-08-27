@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <!-- Header -->
            <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                <h2 class="text-lg font-medium text-gray-900">Edit Profile</h2>
            </div>

            <!-- Form -->
            <div class="px-6 py-6">
                <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="@error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror block w-full rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="mb-2 block text-sm font-medium text-gray-700">
                            Username
                        </label>
                        <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}"
                            required
                            class="@error('username') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror block w-full rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bio Field -->
                    <div>
                        <label for="bio" class="mb-2 block text-sm font-medium text-gray-700">
                            Bio
                        </label>
                        <textarea id="bio" name="bio" rows="3" placeholder="Tell us about yourself..."
                            class="@error('bio') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror block w-full resize-none rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile Image Field -->
                    <x-image-upload name="image" :user="$user" :multiple="false" />

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

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('profile.show', $user->id) }}"
                            class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Cancel
                        </a>
                        <button type="submit"
                            class="rounded-lg border border-transparent bg-blue-600 px-6 py-2 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>

            <form class="delete-field w-full" method="POST" action="{{ route('profile.destroy', $user) }}">
                @csrf
                @method('DELETE')

                <div class="flex items-center">
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');"
                        class="not-[]: w-full cursor-pointer rounded-b-lg bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-600">
                        Delete My Account
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
