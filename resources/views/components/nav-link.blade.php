@props(['active' => false, 'isMobile' => false, 'icon' => ''])

@if ($isMobile)
    @if ($active)
        <a aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }} class="rounded-xl bg-indigo-100 p-1">
            <x-icon size="w-8 h-8" format="png" icon="{{ 'indigo-' . $icon }}" />
        </a>
    @else
        <a aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
            <x-icon size="w-8 h-8" format="png" icon="{{ 'black-' . $icon }}" />
        </a>
    @endif
@else
    <a class="{{ $active ? 'hover:bg-indigo-400 bg-indigo-500 px-2 py-1 rounded-md p-1 text-white font-bold' : 'text-gray-900  hover:text-indigo-800' }} flex items-center justify-center text-sm"
        aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
        <span>{{ $slot }}</span>
    </a>
@endif
