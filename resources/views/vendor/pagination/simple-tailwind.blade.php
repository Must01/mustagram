@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex cursor-default items-center rounded-md border border-indigo-300 bg-indigo-100 px-4 py-2 text-sm font-medium leading-5 text-indigo-500">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center rounded-md border border-indigo-300 bg-indigo-300 px-4 py-2 text-sm font-medium leading-5 text-indigo-700 ring-indigo-300 transition duration-150 ease-in-out hover:text-indigo-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-indigo-100 active:text-indigo-700">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center rounded-md border border-indigo-300 bg-indigo-300 px-4 py-2 text-sm font-medium leading-5 text-indigo-700 ring-indigo-300 transition duration-150 ease-in-out hover:text-indigo-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-indigo-100 active:text-indigo-700">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex cursor-default items-center rounded-md border border-indigo-300 bg-indigo-100 px-4 py-2 text-sm font-medium leading-5 text-indigo-500">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
