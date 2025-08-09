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
  <div id="app" class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow border-b border-gray-200">
      <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ url('/') }}" class="text-2xl font-semibold text-indigo-600 font-sans">mustagram</a>

        <!-- Hamburger Button for Mobile -->
        <button id="mobile-menu-button" class="md:hidden focus:outline-none" aria-label="Toggle menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Menu -->
        <div id="mobile-menu" class="hidden md:flex md:items-center md:space-x-6">
          <ul class="flex flex-col md:flex-row md:space-x-6">
            @auth
              <li><a href="{{ route('posts.index') }}" class="block py-2 hover:text-indigo-600">Feed</a></li>
            @endauth
          </ul>

          <ul class="flex flex-col md:flex-row md:space-x-4 items-center mt-3 md:mt-0">
            @guest
              @if (Route::has('login'))
                <li><a href="{{ route('login') }}" class="block py-2 hover:text-indigo-600">Login</a></li>
              @endif
              @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class="block py-2 hover:text-indigo-600">Register</a></li>
              @endif
            @else
              <li>
                <a href="{{ route('posts.create') }}" class="flex items-center py-2 hover:text-indigo-600">
                  <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 5v10m5-5H5"/></svg>
                  New Post
                </a>
              </li>

              <!-- Dropdown -->
              <li class="relative">
                <button id="dropdown-button" class="py-2 flex items-center focus:outline-none">
                  {{ Auth::user()->username }}
                  <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
                  </svg>
                </button>

                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow-md z-20">
                  <a href="{{ route('profile.show', Auth::user()->id) }}" class="block px-4 py-2 hover:bg-indigo-50">Profile</a>
                  <a href="{{ route('logout') }}" 
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                     class="block px-4 py-2 hover:bg-indigo-50">
                    Logout
                  </a>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

    <!-- Main Content -->
    <main class="flex-grow py-8 max-w-5xl mx-auto px-4 w-full">
      @yield('content')
    </main>
  </div>

</body>
</html>
