@props(['name', 'user' => null])
<div class="modal-overlay fixed inset-0 z-50 hidden items-center justify-center bg-black/20">
    <div class="modal-content relative w-3/4 max-w-sm rounded-lg bg-white pt-3 shadow-lg">
        <div class="flex items-center justify-center border-b-2 border-gray-500">
            <h2 class="mb-4 font-[playwrite] text-sm sm:text-lg">{{ $name }}</h2>
            <button
                class="modal-close-btn absolute right-0 top-0 m-1 flex cursor-pointer items-center justify-center text-white">
                <img src="{{ asset('icons/remove.png') }}" class="h-5 w-5" />
            </button>
        </div>

        @if ($name === 'following')
            {{-- following --}}
            <div class="flex items-center justify-between">
                @foreach ($user->followingUsers()->with('following')->get()->pluck('following') as $follower)
                    <div class="flex items-center space-x-2 px-2 py-1">
                        <x-profile-img :isSmall="true" :user="$follower" />
                        <div class="flex flex-col">
                            <span class="sm:text-md text-xs font-bold">{{ $follower->username }}</span>
                            <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                        </div>
                    </div>
                    @if ($user->id === auth()->user()->id)
                        <form action="{{ route('unfollow', $follower) }}" method="POST">
                            @csrf
                            <button
                                class="m-1 mr-2 rounded-sm bg-gray-200 px-1 py-0.5 text-black hover:bg-gray-300">remove</button>
                        </form>
                    @endif
                @endforeach
            </div>
        @else
            {{-- followers --}}
            <div class="flex items-center justify-between">
                @foreach ($user->followersUsers()->with('follower')->get()->pluck('follower') as $follower)
                    <div class="flex items-center space-x-2 px-2 py-1">
                        <x-profile-img :isSmall="true" :user="$follower" />
                        <div class="flex flex-col">
                            <span class="sm:text-md text-xs font-bold">{{ $follower->username }}</span>
                            <span class="text-xs sm:text-sm">{{ $follower->name }}</span>
                        </div>
                    </div>
                    @if ($user->id === auth()->user()->id)
                        <form action="{{ route('unfollow', $follower) }}" method="POST">
                            @csrf
                            <button
                                class="m-1 mr-2 rounded-sm bg-gray-200 px-1 py-0.5 text-black hover:bg-gray-300">remove</button>
                        </form>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
