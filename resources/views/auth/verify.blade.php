@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo/Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Verify Your Email</h2>
            <p class="text-gray-600">We sent you a verification link</p>
        </div>

        <!-- Verification Message -->
        <div class="bg-white p-8 border border-gray-300 rounded-lg">
            @if (session('resent'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-center space-y-4">
                <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>

                <div class="space-y-2">
                    <p class="text-gray-900 font-medium">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>
                    <p class="text-gray-600 text-sm">
                        Check your spam folder if you don't see it in your inbox.
                    </p>
                </div>

                <div class="pt-4">
                    <p class="text-sm text-gray-600 mb-4">
                        {{ __('If you did not receive the email') }}
                    </p>
                    
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" 
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md text-sm font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            {{ __('Click here to request another') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Back to Login -->
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:text-blue-600">
                ← Back to login
            </a>
        </div>
    </div>
</div>
@endsection