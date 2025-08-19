@props(['user' => auth()->user(), 'isSmall'])

@if ($user->profile_img)
    <img src="{{ Storage::disk('cloudinary')->url($user->profile_img) }}"
        class="{{ $isSmall ? 'w-8 h-8' : 'h-32 w-32 md:h-40 md:w-40' }} rounded-full">
@else
    <span
        class="{{ $isSmall ? 'w-8 h-8' : 'h-32 w-32 md:h-40 md:w-40' }} flex cursor-pointer items-center justify-center rounded-full bg-gray-500 text-6xl font-bold text-gray-900">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
@endif
