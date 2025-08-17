@props(['name' => 'images', 'post' => null, 'multiple' => true])

<div class="space-y-2">
<!-- Image Upload Input -->
<label 
    class="block text-sm p-5 rounded-lg text-center cursor-pointer hover:bg-gray-100 border-dashed border-2 border-gray-800 font-medium text-gray-700 mb-2" 
    onclick="document.getElementById('{{ $name }}Input').click()">
    Upload Image{{ $multiple ? 's' : '' }}
</label>
<input 
    type="file"
    name="{{ $multiple ? $name . '[]' : $name }}" 
    id="{{ $name }}Input" 
    {{ $multiple ? 'multiple' : '' }} 
    accept="image/*"
    class="mb-4 hidden"
>

<!-- Preview Container -->
<div id="preview-area"  class="flex flex-wrap gap-2 p-4 bg-gray-50 rounded-lg min-h-[100px] border-2 border-dashed border-gray-200">
    @isset($post->image_path)
        @foreach($post->image_path as $image)
            <div id="old-images" class="relative inline-block group m-1" data-image="{{ $image }}">
                <img src="{{ asset('storage/' . $image) }}" 
                    class="w-24 h-24 object-cover rounded-xl shadow-md border-2 border-gray-100 transition-all duration-300 group-hover:shadow-lg group-hover:scale-105">
                <button type="button" 
                        class="absolute cursor-pointer -top-2 -right-2 w-6 h-6 flex items-center justify-center text-white text-xs font-bold bg-red-500 hover:bg-red-600 active:bg-red-700 rounded-full shadow-md transition-all duration-200 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-300 opacity-0 group-hover:opacity-100"
                        onclick="removeOldImage('{{ $image }}')">
                    X
                </button>
                <input type="hidden" name="oldImages[]" value="{{ $image }}">
            </div>
        @endforeach
    @endisset
</div>

<script>
    function removeOldImage($image_path) {
        const el = document.querySelector(`[data-image="${$image_path}"]`);
        if (el) el.remove();
    }
</script>