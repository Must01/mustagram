@props(['user' => auth()->user(), 'isSmall'])

@if ($user->profile_img)
    <img src="{{ Storage::disk('cloudinary')->url($user->profile_img) }}"
        class="{{ $isSmall ? 'w-8 h-8' : 'h-32 w-32 md:h-40 md:w-40 ' }} rounded-full">
@else
    <span
        class="{{ $isSmall ? 'w-8 h-8 text-sm sm:text-xl' : 'h-32 w-32 md:h-40 md:w-40 text-7xl' }} flex cursor-pointer items-center justify-center rounded-full bg-indigo-300 font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
    </a>
@endif
