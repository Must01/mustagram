@props(['post','width' => 'md:w-3/4' ])

<div id="custom-carousel" class="relative group {{ $width }} aspect-square overflow-hidden mx-auto rounded-lg">
    <!-- Images wrapper -->
    <div id="slider" class="flex h-full transition-transform duration-500">
        @foreach ($post->image_path as $index => $image)
            <div class="group carousel-item absolute inset-0 transition-transform duration-500 ease-in-out" data-index="{{ $index }}">
                <img src="{{ asset('storage/' . $image) }}"  
                    class="w-full h-full object-cover rounded-lg" 
                    alt="Post image {{ $index }}"
                >
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button id="prev-btn" class="absolute opacity-0 group-hover:opacity-100 cursor-pointer top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 z-10">
        <img class="w-4 md:w-4 sm:w-3" src="https://img.icons8.com/?size=100&id=SpaFeIlj4LuG&format=png&color=000000" />
    </button>
    <button id="next-btn" class="absolute opacity-0 group-hover:opacity-100 cursor-pointer top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 z-10">
        <img class="w-4 md:w-4 sm:w-3" src="https://img.icons8.com/?size=100&id=vJwzkEyUPBmE&format=png&color=000000" />
    </button>
</div>
