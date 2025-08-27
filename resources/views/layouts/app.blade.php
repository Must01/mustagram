<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="{{ asset('indigo-mustagram.png') }}" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'MustaGram') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-50 text-gray-800">
        <div id="app" class="flex min-h-screen flex-col">

            <!-- NAVBAR: three regions (left / center / right) -->
            <nav class="border-b border-gray-200 bg-white shadow-sm">
                {{-- disktop nav --}}
                <div class="mx-auto hidden max-w-7xl px-4 sm:block sm:px-6 lg:px-8">
                    <div class="flex h-14 items-center justify-between">
                        <!-- LEFT: logo + Feed -->
                        <div class="flex items-center space-x-6">
                            <!-- logo -->
                            <a href="{{ url('/') }}"
                                class="hidden font-[playwrite] text-lg font-semibold tracking-wide text-indigo-600 sm:inline">
                                mustagram
                            </a>

                            <!-- Feed (visible only to authenticated users) -->
                            @auth
                                <x-nav-link href="{{ route('posts.index') }}" :active="request()->is('posts') || request()->is('') || request()->is('/posts/{id}')">Feed</x-nav-link>
                                <x-nav-link href="{{ route('posts.create') }}" :active="request()->is('posts/create')">create</x-nav-link>
                            @endauth

                            <x-nav-link href="{{ route('about') }}" :active="request()->is('about')">about</x-nav-link>
                        </div>

                        <!-- RIGHT: optional New button + avatar menu -->
                        <div class="flex items-center">
                            @auth
                                <div
                                    class="profile-modal-container cursor-pointer text-center text-sm font-normal sm:text-lg sm:font-semibold">
                                    <div class="profile-modal-btn text-start">
                                        <button id="profile-menu-button" aria-haspopup="true" aria-expanded="false"
                                            class="flex items-center gap-2 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <x-profile-img />
                                        </button>
                                    </div>
                                    <x-profile-menu />
                                </div>
                            @else
                                <div class="flex items-center space-x-2">
                                    <x-nav-link href="{{ route('login') }}" :active="request()->is('login')">Login</x-nav-link>
                                    <x-nav-link href="{{ route('register') }}" :active="request()->is('register')">register</x-nav-link>
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
                {{-- mobile nav --}}
                @auth
                    <div class="border-t-1 fixed bottom-0 z-50 block w-full border-gray-500 bg-white p-1 sm:hidden">
                        <!-- mobile menu items -->
                        <div class="flex items-center justify-around">

                            <!-- logo -->
                            <a href="{{ url('/') }}"
                                class="inline font-[playwrite] text-lg font-semibold tracking-wide text-indigo-600 sm:hidden">
                                <img loading="lazy" src="{{ asset('black-mustagram.png') }}" alt="mustagram"
                                    class="h-8 w-8 rounded-lg bg-transparent p-1 hover:bg-indigo-100" />
                            </a>

                            <!-- Feed -->
                            <x-nav-link icon="compass" :isMobile="true" href="{{ route('posts.index') }}"
                                :active="request()->is('posts')" />

                            <x-nav-link icon="plus" :isMobile="true" href="{{ route('posts.create') }}"
                                :active="request()->is('posts/create')" />

                            <x-nav-link icon="info" :isMobile="true" href="{{ route('about') }}" :active="request()->is('about')" />

                            <div
                                class="profile-modal-container cursor-pointer text-center text-sm font-normal sm:text-lg sm:font-semibold">
                                <div class="profile-modal-btn text-start">
                                    <button id="profile-menu-button" aria-haspopup="true" aria-expanded="false"
                                        class="flex items-center gap-2 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <x-profile-img />
                                    </button>
                                </div>
                                <x-profile-menu />
                            </div>
                        </div>
                    </div>
                @endauth
            </nav>

            <!-- Hidden logout form (kept for compatibility with older inline-trigger patterns) -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

            <!-- Main Content Area -->
            <main class="mx-auto w-full max-w-5xl flex-grow px-1 py-8 sm:px-4">
                @yield('content')
            </main>
            <!--  footer  -->
            <x-footer />

        </div>
    </body>

    <script>
        // mobile menu modal
        document.addEventListener("DOMContentLoaded", () => {
            document
                .querySelectorAll(".profile-modal-container")
                .forEach((container) => {
                    const btn = container.querySelector(".profile-modal-btn");
                    const overlay = container.querySelector(".profile-modal-overlay");
                    const content = container.querySelector(".profile-modal-content");
                    const closebtn = container.querySelector(
                        ".profile-modal-close-btn"
                    );

                    // show the card
                    btn.addEventListener("click", () => {
                        overlay.classList.remove("hidden");
                        overlay.classList.add("flex");
                        console.log("you clicked me hehe 😋");
                    });

                    // hide the card on button click
                    closebtn.addEventListener("click", () => {
                        overlay.classList.add("hidden");
                        overlay.classList.remove("flex");
                    });

                    // hide the card on outside click
                    overlay.addEventListener("click", () => {
                        overlay.classList.add("hidden");
                        overlay.classList.remove("flex");
                    });
                });
        });
    </script>

</html>
