@props(['name' => 'images', 'multiple' => true])

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
<div id="preview-area" class="flex flex-wrap gap-2 p-4 bg-gray-50 rounded-lg min-h-[100px] border-2 border-dashed border-gray-200"></div>

</div>
