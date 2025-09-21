<x-layouts.home>
    <div class="flex h-full w-full flex-1 items-center justify-center px-6 lg:px-8">
        <div class="text-center">
            <h1
                class="text-shadow-lg text-shadow-black/30 sm:mt-25 mt-15 text-balance text-5xl font-semibold leading-snug tracking-tight text-white sm:text-7xl">
                {{ __('home.headline') }}</h1>
            <p class="mt-8 text-pretty text-lg font-medium text-gray-200 sm:text-xl/8">{{ __('home.sub-headline') }}</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('login') }}" wire:navigate class="must-btn-primary">
                    {{ __('home.cta-primary') }}
                </a>
                <a href="{{ route('register') }}" wire:navigate class="must-btn-secondary">
                    {{ __('home.cta-secondary') }}
                </a>
            </div>
        </div>
    </div>
</x-layouts.home>
