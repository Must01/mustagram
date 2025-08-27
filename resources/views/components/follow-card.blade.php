@props(['name', 'user' => null])
<div class="modal-overlay max-h-50 fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/20">
    <div class="modal-content relative w-3/4 max-w-sm rounded-lg bg-white p-1 shadow-lg">
        <div class="border-b-1 flex items-center justify-center border-gray-300">
            <h2 class="mb-4 font-[playwrite] text-sm font-semibold text-gray-800 sm:text-lg">{{ $name }}</h2>
            <button
                class="modal-close-btn absolute right-0 top-0 m-1 flex cursor-pointer items-center justify-center text-white">
                <img loading="lazy" src="{{ asset('icons/remove.png') }}" class="h-4 w-4" />
            </button>
        </div>

        @if ($user->followingUsers()->count() > 0 && $name === 'following')
            {{-- following --}}
            <div class="flex flex-col items-center justify-between space-y-0.5">
                @foreach ($user->followingUsers()->sortByDesc('created_at') as $follower)
                    <div class="flex w-full">
                        <div class="flex flex-1 items-center">
                            <a href="{{ route('profile.show', $follower) }}"
                                class="flex items-center space-x-2 px-2 py-1">
                                <x-profile-img :isSmall="true" :user="$follower" />
                                <div class="flex flex-col">
                                    <span class="text-xs font-semibold sm:text-sm">{{ $follower->username }}</span>
                                    <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                                </div>
                            </a>
                        </div>
                        @if ($user->id === auth()->user()->id)
                            <form action="{{ route('unfollow', $follower) }}" method="POST" class="flex-none">
                                @csrf
                                <button
                                    class="m-1 mr-2 rounded-md bg-gray-200 px-1 py-0.5 text-black hover:bg-gray-300">remove</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @elseif ($user->followersUsers()->count() > 0 && $name === 'followers')
            {{-- followers --}}
            <div class="flex flex-col items-center justify-between space-y-0.5">
                @foreach ($user->followersUsers()->sortByDesc('created_at') as $follower)
                    <div class="flex w-full">
                        <div class="flex flex-1 items-center">
                            <a href="{{ route('profile.show', $follower) }}"
                                class="flex items-center space-x-2 px-2 py-1">
                                <x-profile-img :isSmall="true" :user="$follower" />
                                <div class="flex flex-col">
                                    <span class="text-xs font-semibold sm:text-sm">{{ $follower->username }}</span>
                                    <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                                </div>
                            </a>
                        </div>
                        @if ($user->id === auth()->user()->id)
                            <form action="{{ route('unfollow', $follower) }}" method="POST" class="flex-none">
                                @csrf
                                <button
                                    class="m-1 mr-2 rounded-sm bg-gray-200 px-1 py-0.5 text-xs text-gray-600 hover:bg-gray-300 sm:text-sm">remove</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            @if ($name === 'following')
                <div class="flex min-h-20 w-full flex-col items-center space-y-2.5 p-5">
                    <x-icon icon="empty" format="png" size="w-10 h-10" />
                    <h6 class='text-gray-600'>You aren't following anyone.</h6>
                    <p class="text-xs text-gray-500 sm:text-sm">Don't be shy, follow someone!</p>
                </div>
            @else
                <div class="flex min-h-20 w-full flex-col items-center space-y-2.5 p-5">
                    <x-icon icon="empty" format="png" size="w-10 h-10" />
                    <h6 class='text-gray-600'>You don't have any followers yet</h6>
                    <p class="text-xs text-gray-500 sm:text-sm">Don't be shy, follow someone!</p>
                </div>
            @endif
        @endif
    </div>
</div>
