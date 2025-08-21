@props(['name' => 'images', 'user' => null, 'post' => null, 'multiple' => true])

<div class="space-y-2">
    <!-- Image Upload Input -->
    <label
        class="mb-2 block cursor-pointer rounded-lg border-2 border-dashed border-gray-800 p-5 text-center text-sm font-medium text-gray-700 hover:bg-gray-100"
        onclick="document.getElementById('{{ $name }}Input').click()">
        Upload Image{{ $multiple ? 's' : '' }}
    </label>
    <input type="file" name="{{ $multiple ? $name . '[]' : $name }}" id="{{ $name }}Input"
        {{ $multiple ? 'multiple' : '' }} accept="image/*" class="mb-4 hidden">

    <!-- Preview Container -->
    <div id="preview-area"
        class="{{ $multiple ? 'flex-wrap gap-2' : 'justify-center items-center' }} flex min-h-[100px] rounded-lg border-2 border-dashed border-gray-200 bg-gray-50 p-4">
        {{-- for post images --}}
        @isset($post->image_path)
            @foreach ($post->image_path as $image)
                <div id="old-images" class="group relative m-1 inline-block" data-image="{{ $image }}">
                    <img src="{{ Storage::disk('cloudinfary')->url($image) }}"
                        class="h-24 w-24 rounded-xl border-2 border-gray-100 object-cover shadow-md transition-all duration-300 group-hover:scale-105 group-hover:shadow-lg">
                    <button type="button"
                        class="absolute -right-2 -top-2 flex h-6 w-6 transform cursor-pointer items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white opacity-0 shadow-md transition-all duration-200 hover:scale-110 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 active:bg-red-700 group-hover:opacity-100"
                        onclick="removeOldImage('{{ $image }}')">

                    </button>
                    <input type="hidden" name="oldImages[]" value="{{ $image }}">
                </div>
            @endforeach
        @endisset
        {{-- for profile images --}}
        @isset($user->profile_img)
            <div id="old-images" class="group relative m-1 inline-block" data-image="{{ $user->profile_img }}">
                <img src="{{ Storage::disk('cloudinary')->url($user->profile_img) }}"
                    class="aspect-square h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg ring-2 ring-gray-200 transition-all duration-300 group-hover:ring-blue-300">
                <button type="button"
                    class="absolute -right-2 -top-2 flex h-8 w-8 transform cursor-pointer items-center justify-center rounded-full bg-red-500 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:scale-110 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 active:bg-red-700"
                    onclick="removeOldImage('{{ $user->profile_img }}')">
                    X
                </button>
                <input type="hidden" name="oldImages[]" value="{{ $user->profile_img }}">
            </div>
        @endisset
    </div>

    <script>
        function removeOldImage($image_path) {
            const el = document.querySelector(`[data-image="${$image_path}"]`);
            if (el) el.remove();
        }
    </script>
