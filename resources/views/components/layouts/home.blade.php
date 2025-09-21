<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

    <head>
        @include('partials.head')
    </head>

    <body dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="min-h-screen w-full">

        <div class="absolute inset-0 z-0">
            <div class="h-full w-full bg-cover bg-fixed bg-bottom sm:bg-bottom"
                style="background-image: url('https://images.pexels.com/photos/13465291/pexels-photo-13465291.jpeg');">
            </div>
            <div class="absolute inset-0 bg-indigo-50/15 dark:bg-indigo-900/10">
            </div>
        </div>
        <div class="relative z-10">
            <flux:header container class="">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                <flux:spacer class="lg:hidden" />


                <flux:brand name="{{ __('home.app-name') }}" href="/" logo="{{ asset('light.mustagram.svg') }}"
                    class="hidden dark:flex" />
                <flux:brand name="{{ __('home.app-name') }}" href="/" logo="{{ asset('dark.mustagram.svg') }}"
                    class="flex dark:hidden" />


                <flux:spacer class="hidden lg:flex" />

                <div class="hidden items-center justify-center gap-x-6 lg:flex">

                    <a href="{{ route('login') }}" class="must-btn-secondary" wire:navigate>
                        {{ __('home.login') }}
                    </a>
                    <a href="{{ route('register') }}" class="must-btn-primary" wire:navigate>
                        {{ __('home.cta-secondary') }}
                    </a>
                    <flux:dropdown>
                        <flux:button icon="ellipsis-horizontal" variant="filled"></flux:button>

                        <flux:menu>
                            <flux:menu.item>
                                <flux:switch x-data x-model="$flux.dark" label="{{ __('home.dark-mode') }}" />
                            </flux:menu.item>

                            <flux:menu.separator />

                            <flux:menu.submenu heading="{{ __('home.lang') }}">
                                {{-- show a check mark if selected --}}
                                <flux:menu.item href="{{ route('lang', ['lang' => 'ar']) }}"
                                    class="flex justify-between">
                                    <span
                                        class="{{ session('lang') == 'ar' ? 'text-indigo-300 ' : 'text-inherit' }}">العربية</span>
                                </flux:menu.item>

                                <flux:menu.item href="{{ route('lang', ['lang' => 'en']) }}"
                                    class="flex justify-between">
                                    <span
                                        class="{{ session('lang') == 'en' ? 'text-indigo-300 ' : 'text-inherit' }}">English</span>
                                </flux:menu.item>
                            </flux:menu.submenu>
                        </flux:menu>
                    </flux:dropdown>
                </div>

            </flux:header>

            <flux:sidebar sticky collapsible="mobile"
                class="border-r border-zinc-200 bg-zinc-50 lg:hidden dark:border-zinc-700 dark:bg-zinc-900">
                <flux:sidebar.header>
                    <flux:sidebar.brand href="#" logo="{{ asset('dark.mustagram.svg') }}"
                        logo:dark="{{ asset('light.mustagram.svg') }}" name="mustagram" />
                    <flux:sidebar.collapse
                        class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
                </flux:sidebar.header>

                <flux:sidebar.nav>
                    <flux:sidebar.group expandable heading="{{ __('home.lang') }}">
                        <flux:sidebar.item href="{{ route('lang', ['lang' => 'ar']) }}">
                            <span
                                class="{{ session('lang') == 'ar' ? 'text-indigo-300 ' : 'text-inherit' }}">العربية</span>
                        </flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('lang', ['lang' => 'en']) }}">
                            <span
                                class="{{ session('lang') == 'en' ? 'text-indigo-300 ' : 'text-inherit' }}">English</span>
                        </flux:sidebar.item>
                    </flux:sidebar.group>
                </flux:sidebar.nav>

                <flux:sidebar.spacer />

                <flux:sidebar.nav>
                    <flux:sidebar.item>
                        <flux:switch x-data x-model="$flux.dark" label="{{ __('home.dark-mode') }}" />
                    </flux:sidebar.item>
                    <flux:sidebar.item href="{{ route('login') }}" wire:navigate>{{ __('home.login') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item color="indigo" href="{{ route('register') }}" class="must-btn-primary!"
                        wire:navigate>
                        {{ __('home.cta-secondary') }}
                    </flux:sidebar.item>
                </flux:sidebar.nav>
            </flux:sidebar>

            <flux:main class="h-full w-full" container>
                {{ $slot }}
            </flux:main>
        </div>
        @fluxScripts
        @livewireScripts
    </body>

</html>
