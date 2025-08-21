@props(['icon', 'size' => 'w-6 h-6', 'format' => 'svg'])
<img src="{{ asset('icons/' . $icon . '.' . $format) }}" alt="{{ $icon }}" class="{{ $size }}" />
