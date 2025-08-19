@props(['post', 'width' => 'md:w-3/5'])

@php
    $carouselId = 'carousel-' . $post->id;
@endphp

<div id="{{ $carouselId }}" class="{{ $width }} group relative mx-auto aspect-square overflow-hidden rounded-lg">
    <!-- Images wrapper -->
    <div class="h-full transition-transform duration-500">
        @foreach ($post->image_path as $index => $image)
            <div class="carousel-item group absolute inset-0 transition-transform duration-500 ease-in-out"
                data-index="{{ $index }}">
                <img src="{{ Storage::disk('cloudinary')->url($image) }}" class="h-full w-full rounded-lg object-cover"
                    alt="Post image {{ $index }}">
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button
        class="prev-btn absolute left-4 top-1/2 z-10 -translate-y-1/2 cursor-pointer rounded-full bg-white p-2 opacity-0 shadow-md hover:bg-gray-200 group-hover:opacity-100">
        <img class="w-4 sm:w-3 md:w-4" src="https://img.icons8.com/?size=100&id=SpaFeIlj4LuG&format=png&color=000000" />
    </button>
    <button
        class="next-btn absolute right-4 top-1/2 z-10 -translate-y-1/2 cursor-pointer rounded-full bg-white p-2 opacity-0 shadow-md hover:bg-gray-200 group-hover:opacity-100">
        <img class="w-4 sm:w-3 md:w-4" src="https://img.icons8.com/?size=100&id=vJwzkEyUPBmE&format=png&color=000000" />
    </button>
</div>
