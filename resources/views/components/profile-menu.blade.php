<div class="profile-modal-overlay fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/20 p-1">
    <div
        class="profile-modal-content min-w-1/2 sm:min-w-1/3 relative flex flex-col space-y-1 rounded-lg bg-white p-1 shadow-lg">
        <div class="relative flex w-full items-center">
            <button
                class="profile-modal-close-btn absolute right-0 top-0 m-1 flex cursor-pointer items-center justify-center rounded-lg p-1 text-white hover:bg-red-200">
                <img loading="lazy" src="{{ asset('icons/remove.png') }}" class="h-4 w-4" />
            </button>
        </div>

        <a href="{{ route('posts.create') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600" role="menuitem">New
            Post</a>
        <a href="{{ route('profile.show', auth()->user()->id) }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
            role="menuitem">Profile</a>

        <!-- Logout uses a POST form for security (CSRF) -->
        <form method="POST" action="{{ route('logout') }}" role="none">
            @csrf
            <button type="submit" class="w-full px-4 py-2 text-center text-sm text-red-600 hover:bg-red-50"
                role="menuitem">Logout</button>
        </form>
    </div>
</div>
