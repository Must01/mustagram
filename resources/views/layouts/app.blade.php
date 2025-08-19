<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'MustaGram') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-50 text-gray-800">
        <div id="app" class="flex min-h-screen flex-col">

            <!-- NAVBAR: three regions (left / center / right) -->
            <nav class="border-b border-gray-200 bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">

                        <!-- LEFT: logo + Feed -->
                        <div class="flex items-center space-x-6">
                            <!-- logo -->
                            <a href="{{ url('/') }}"
                                class="font-[playwrite] text-lg font-semibold tracking-wide text-indigo-600">
                                mustagram
                            </a>

                            <!-- Feed (visible only to authenticated users) -->
                            @auth
                                <a href="{{ route('posts.index') }}"
                                    class="text-sm font-medium text-gray-600 transition-colors hover:text-indigo-600">
                                    Feed
                                </a>
                            @endauth

                            <a href="{{ route('about') }}"
                                class="text-sm font-medium text-gray-600 transition-colors hover:text-indigo-600">
                                about
                            </a>
                        </div>

                        <!-- CENTER: intentionally empty for minimal look -->
                        <div class="hidden items-center justify-center md:flex">

                        </div>

                        <!-- RIGHT: optional New button + avatar menu -->
                        <div class="flex items-center space-x-3">

                            <!-- Small "New" button (hidden on very small screens) -->
                            @auth
                                <a href="{{ route('posts.create') }}"
                                    class="hidden items-center rounded-md bg-indigo-600 px-3 py-1 text-sm text-white transition hover:bg-indigo-700 sm:inline-flex">
                                    New
                                </a>
                            @endauth

                            <!-- Avatar + Dropdown -->
                            @auth
                                <div class="relative">
                                    <!-- Avatar button toggles the user menu -->
                                    <button id="user-menu-button" aria-haspopup="true" aria-expanded="false"
                                        class="flex items-center gap-2 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <img src="{{ auth()->user()->profile_img ? asset('storage/' . auth()->user()->profile_img) : 'https://via.placeholder.com/32' }}"
                                            alt="{{ auth()->user()->username }}"
                                            class="h-8 w-8 rounded-full object-cover shadow-sm">
                                    </button>

                                    <!-- User menu: New Post / Profile / Logout -->
                                    <div id="user-menu"
                                        class="absolute right-0 z-20 mt-2 hidden w-44 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                                        role="menu" aria-label="User menu">
                                        <a href="{{ route('posts.create') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
                                            role="menuitem">New Post</a>
                                        <a href="{{ route('profile.show', Auth::user()->id) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
                                            role="menuitem">Profile</a>

                                        <!-- Logout uses a POST form for security (CSRF) -->
                                        <form method="POST" action="{{ route('logout') }}" class="mt-1" role="none">
                                            @csrf
                                            <button type="submit"
                                                class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50"
                                                role="menuitem">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <!-- If guest, show Login/Register buttons on right side for better balance -->
                                <div class="flex items-center space-x-2">
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}"
                                            class="text-sm text-gray-600 transition-colors hover:text-indigo-600">Login</a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="rounded-lg bg-indigo-600 px-3 py-1 text-sm text-white transition hover:bg-indigo-700">Register</a>
                                    @endif
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>

                <!-- MOBILE MENU: toggled by hamburger, keep links readable and stacked -->
                <div id="mobile-menu" class="hidden border-t border-gray-200 md:hidden">
                    <div class="space-y-1 bg-gray-50 px-2 pb-3 pt-2">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block rounded-lg bg-indigo-600 px-3 py-2 text-center text-white transition-colors duration-200 hover:bg-indigo-700">Register</a>
                            @endif
                        @else
                            @auth
                                <a href="{{ route('posts.index') }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">Feed</a>
                                <a href="{{ route('posts.create') }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">New
                                    Post</a>
                                <a href="{{ route('profile.show', Auth::user()->id) }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-3 py-2 text-left text-gray-600 hover:bg-red-50">Logout</button>
                                </form>
                            @endauth
                        @endguest
                    </div>
                </div>
            </nav>

            <!-- Hidden logout form (kept for compatibility with older inline-trigger patterns) -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

            <!-- Main Content Area -->
            <main class="mx-auto w-full max-w-5xl flex-grow px-4 py-8">
                @yield('content')
            </main>
            <!--  footer  -->
            <x-footer />

        </div>
    </body>

</html>
