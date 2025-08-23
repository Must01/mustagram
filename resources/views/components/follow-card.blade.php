@props(['name', 'user' => null])
<div class="modal-overlay fixed inset-0 z-50 hidden items-center justify-center bg-black/20">
    <div class="modal-content relative w-3/4 max-w-sm rounded-lg bg-white pt-3 shadow-lg">
        <div class="border-b-1 flex items-center justify-center border-gray-400">
            <h2 class="mb-4 font-[playwrite] text-sm text-gray-800 sm:text-lg">{{ $name }}</h2>
            <button
                class="modal-close-btn absolute right-0 top-0 m-1 flex cursor-pointer items-center justify-center text-white">
                <img src="{{ asset('icons/remove.png') }}" class="h-5 w-5" />
            </button>
        </div>

        @if ($user->followingUsers()->with('following')->pluck('following')->count() > 0)
            @if ($name === 'following')
                {{-- following --}}
                <div class="flex flex-col items-center justify-between">
                    @foreach ($user->followingUsers()->with('following')->get()->pluck('following') as $follower)
                        <div class="flex w-full">
                            <div class="flex flex-1 items-center">
                                <a href="{{ route('profile.show', $follower) }}"
                                    class="flex items-center space-x-2 px-2 py-1">
                                    <x-profile-img :isSmall="true" :user="$follower" />
                                    <div class="flex flex-col">
                                        <span class="sm:text-md text-xs font-bold">{{ $follower->username }}</span>
                                        <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                                    </div>
                                </a>
                            </div>
                            @if ($user->id === auth()->user()->id)
                                <form action="{{ route('unfollow', $follower) }}" method="POST" class="flex-none">
                                    @csrf
                                    <button
                                        class="m-1 mr-2 rounded-sm bg-gray-200 px-1 py-0.5 text-black hover:bg-gray-300">remove</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                {{-- followers --}}
                <div class="flex flex-col items-center justify-between">
                    @foreach ($user->followersUsers()->with('follower')->get()->pluck('follower') as $follower)
                        <div class="flex w-full">
                            <div class="flex flex-1 items-center space-x-2 px-2 py-1">
                                <x-profile-img :isSmall="true" :user="$follower" />
                                <div class="flex flex-col">
                                    <span class="sm:text-md text-xs font-bold">{{ $follower->username }}</span>
                                    <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                                </div>
                            </div>
                            @if ($user->id === auth()->user()->id)
                                <form action="{{ route('unfollow', $follower) }}" method="POST" class="flex-none">
                                    @csrf
                                    <button
                                        class="m-1 mr-2 rounded-sm bg-gray-200 px-1 py-0.5 text-black hover:bg-gray-300">remove</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            @if ($name === 'following')
                <div class="flex min-h-20 w-full flex-col items-center space-y-2.5 p-4">
                    <x-icon icon="silence" format="png" size="w-12 h-12" />
                    <h6 class='text-gray-600'>You aren't following anyone.</h6>
                    <p class="text-xs text-gray-500 sm:text-sm">Don't be shy, follow someone!</p>
                </div>
            @else
                <div class="flex min-h-20 w-full flex-col items-center space-y-2.5 p-4">
                    <x-icon icon="silence" format="png" size="w-12 h-12" />
                    <h6 class='text-gray-600'>You don't have any followers yet</h6>
                    <p class="text-xs text-gray-500 sm:text-sm">Don't be shy, follow someone!</p>
                </div>
            @endif
        @endif
    </div>
</div>
