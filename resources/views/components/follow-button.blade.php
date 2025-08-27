@props(['post', 'type' => 'post'])

@if ($type === 'post')
    @if (auth()->user()->id !== $post->user->id)
        @if (auth()->user()->isFollowing($post->user))
            <form action="{{ route('unfollow', $post->user) }}" method="POST">
                @csrf
                <button
                    class="border-1 cursor-pointer rounded-md border-indigo-500 px-3 py-1 text-xs font-bold text-indigo-500 hover:border-indigo-600 hover:text-indigo-600 sm:text-sm">
                    Unfollow
                </button>
            </form>
        @else
            <form action="{{ route('follow', $post->user) }}" method="POST">
                @csrf
                <button
                    class="cursor-pointer rounded-md bg-indigo-500 px-3 py-1 text-xs text-white hover:bg-indigo-600 sm:text-sm">
                    Follow
                </button>
            </form>
        @endif
    @endif
@elseif($type === 'like')
    @if (auth()->user()->id !== $post->id)
        @if (auth()->user()->isFollowing($post))
            <form action="{{ route('unfollow', $post) }}" method="POST">
                @csrf
                <button
                    class="border-1 cursor-pointer rounded-md border-indigo-500 px-3 py-1 text-xs font-bold text-indigo-500 hover:border-indigo-600 hover:text-indigo-600 sm:text-sm">
                    Unfollow
                </button>
            </form>
        @else
            <form action="{{ route('follow', $post) }}" method="POST">
                @csrf
                <button
                    class="cursor-pointer rounded-md bg-indigo-500 px-3 py-1 text-xs text-white hover:bg-indigo-600 sm:text-sm">
                    Follow
                </button>
            </form>
        @endif
    @endif
@endif
