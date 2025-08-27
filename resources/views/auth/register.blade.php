@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <!-- Logo/Header -->
            <div class="text-center">
                <h2 class="mb-2 font-[playwrite] text-3xl font-bold text-gray-900">mustagram</h2>
                <p class="text-gray-600">Sign up to see photos and videos from your friends</p>
            </div>

            <!-- Register Form -->
            <div class="rounded-lg border border-gray-300 bg-white p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="sr-only">{{ __('Full Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autocomplete="name" autofocus placeholder="Full name"
                            class="@error('name') border-red-500 @enderror w-full rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" placeholder="Email address"
                            class="@error('email') border-red-500 @enderror w-full rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            placeholder="Password"
                            class="@error('password') border-red-500 @enderror w-full rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">

                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirm password"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    </div>

                    <!-- Terms -->
                    <div class="text-center text-xs text-gray-500">
                        By signing up, you agree to our Terms, Data Policy and Cookies Policy.
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Sign Up') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Login Link -->
            <div class="rounded-lg border border-gray-300 bg-white p-4 text-center">
                <p class="text-sm text-gray-600">
                    Have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-500 hover:text-indigo-600">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
