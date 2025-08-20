@props(['post'])

{{-- check if the logged in user follow this post user --}}
@if (auth()->user()->id !== $post->user->id)
    @if (auth()->user()->isFollowing($post->user)->exists())
        <form action="{{ route('unfollow', $post->user) }}" method="POST">
            @csrf
            <button
                class="border-1 sm:text-md cursor-pointer rounded-lg border-indigo-500 px-3 py-1 text-xs font-bold text-indigo-500 hover:border-indigo-600 hover:text-indigo-600">
                Unfollow
            </button>
        </form>
    @else
        <form action="{{ route('follow', $post->user) }}" method="POST">
            @csrf
            <button
                class="sm:text-md cursor-pointer rounded-lg bg-indigo-500 px-3 py-1 text-xs text-white hover:bg-indigo-600">
                Follow
            </button>
        </form>
    @endif
@endif
