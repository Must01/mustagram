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
            <!-- Navbar -->
            <nav class="border-b border-gray-200 bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <a href="{{ url('/') }}" class="font-[playwrite] text-2xl font-medium text-indigo-600">
                                mustagram
                            </a>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-8">
                                <div class="flex items-center space-x-6">
                                    @guest
                                        <!-- Guest Links -->
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}"
                                                class="text-gray-600 transition-colors duration-200 hover:text-indigo-600">
                                                Login
                                            </a>
                                        @endif
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="rounded-lg bg-indigo-600 px-4 py-2 text-white transition-colors duration-200 hover:bg-indigo-700">
                                                Register
                                            </a>
                                        @endif
                                    @else
                                        <!-- Authenticated Links -->
                                        @auth
                                            <a href="{{ route('posts.index') }}"
                                                class="text-gray-600 transition-colors duration-200 hover:text-indigo-600">
                                                Feed
                                            </a>
                                        @endauth

                                        <a href="{{ route('posts.create') }}"
                                            class="flex items-center text-gray-600 transition-colors duration-200 hover:text-indigo-600">
                                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                            New Post
                                        </a>

                                        <!-- User Dropdown -->
                                        <div class="relative">
                                            <button id="desktop-dropdown-button"
                                                class="flex items-center rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span class="mr-2">{{ Auth::user()->username }}</span>
                                                <svg class="h-4 w-4 transition-transform duration-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>

                                            <div id="desktop-dropdown-menu"
                                                class="absolute right-0 z-20 mt-2 hidden w-48 rounded-lg bg-white py-2 shadow-lg ring-1 ring-black ring-opacity-5">
                                                <a href="{{ route('profile.show', Auth::user()->id) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                                                    Profile
                                                </a>
                                                <hr class="my-1 border-gray-100">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600">
                                                    Logout
                                                </a>
                                            </div>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="md:hidden">
                            <button id="mobile-menu-button"
                                class="inline-flex items-center justify-center rounded-lg p-2 text-gray-600 transition-colors duration-200 hover:bg-gray-100 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                aria-label="Toggle menu">
                                <svg class="block h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div id="mobile-menu" class="hidden border-t border-gray-200 md:hidden">
                    <div class="space-y-1 bg-gray-50 px-2 pb-3 pt-2">
                        @guest
                            <!-- Guest Mobile Links -->
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">
                                    Login
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block rounded-lg bg-indigo-600 px-3 py-2 text-center text-white transition-colors duration-200 hover:bg-indigo-700">
                                    Register
                                </a>
                            @endif
                        @else
                            <!-- Authenticated Mobile Links -->
                            @auth
                                <a href="{{ route('posts.index') }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">
                                    Feed
                                </a>
                            @endauth

                            <a href="{{ route('posts.create') }}"
                                class="flex items-center rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                New Post
                            </a>

                            <div class="mt-2 border-t border-gray-200 pt-2">
                                <div class="px-3 py-2 text-sm font-medium text-gray-500">{{ Auth::user()->username }}</div>
                                <a href="{{ route('profile.show', Auth::user()->id) }}"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-indigo-600">
                                    Profile
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block rounded-lg px-3 py-2 text-gray-600 transition-colors duration-200 hover:bg-white hover:text-red-600">
                                    Logout
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

            <!-- Main Content -->
            <main class="mx-auto w-full max-w-5xl flex-grow px-4 py-8">
                @yield('content')
            </main>
        </div>
    </body>

</html>
