<!-- resources/views/partials/footer.blade.php -->
<footer class="mt-12 border-t border-gray-100 bg-gray-50/50">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <!-- Main footer content -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 md:gap-8">

            <!-- Left: About/Credit -->
            <div class="text-center md:text-left">
                <h3 class="mb-2 text-sm font-medium text-gray-900">mustagram</h3>
                <p class="text-sm leading-relaxed text-gray-600">
                    Made with ❤️ by
                    <a href="https://mustaphabouddahr.netlify.app" target="_blank" rel="noopener noreferrer"
                        class="font-medium text-indigo-600 transition-colors hover:text-indigo-500">Mustapha Bouddahr</a>
                </p>
                <p class="mt-1 text-xs text-gray-500">
                    Inspired by <a class="text-indigo-600 transition-colors hover:text-indigo-500"
                        href="https://www.youtube.com/watch?v=VK-2j5CNsvM&list=WL">FreeCodeCamp tutorial</a>
                </p>
            </div>

            <!-- Center: Tech Stack -->
            <div class="text-center">
                <h3 class="mb-2 text-sm font-medium text-gray-900">Built With</h3>
                <div class="flex flex-wrap justify-center gap-2">
                    <span
                        class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-800">
                        Laravel
                    </span>
                    <span
                        class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800">
                        MongoDB
                    </span>
                    <span
                        class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800">
                        Tailwind
                    </span>
                </div>
            </div>

            <!-- Right: Links & Support -->
            <div class="text-center md:text-right">
                <h3 class="mb-3 text-sm font-medium text-gray-900">Connect & Support</h3>

                <!-- Social Links -->
                <div class="mb-3 flex justify-center space-x-4 md:justify-end">
                    <a href="https://github.com/Must01" target="_blank" rel="noopener noreferrer"
                        class="text-gray-400 transition-colors hover:text-gray-600" aria-label="GitHub">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 .5C5.65.5.5 5.65.5 12c0 5.09 3.29 9.4 7.86 10.93.57.1.78-.25.78-.55 0-.27-.01-1-.02-1.96-3.2.7-3.88-1.54-3.88-1.54-.52-1.31-1.27-1.66-1.27-1.66-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.02 1.75 2.68 1.24 3.33.95.1-.74.4-1.24.72-1.53-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.18-3.1-.12-.29-.52-1.48.11-3.08 0 0 .97-.31 3.18 1.18A11.04 11.04 0 0112 6.8c.98.004 1.97.13 2.9.38 2.2-1.5 3.17-1.18 3.17-1.18.64 1.6.24 2.79.12 3.08.74.81 1.18 1.84 1.18 3.1 0 4.44-2.69 5.41-5.25 5.69.41.36.77 1.07.77 2.16 0 1.56-.01 2.82-.01 3.2 0 .3.21.66.79.55A10.52 10.52 0 0023.5 12C23.5 5.65 18.35.5 12 .5z" />
                        </svg>
                    </a>
                    <a href="mailto:mustaphabouddahr.dev@gmail.com"
                        class="text-gray-400 transition-colors hover:text-gray-600" aria-label="Email">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-400 transition-colors hover:text-gray-600"
                        aria-label="About">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                        </svg>
                    </a>
                </div>

                <!-- Support Buttons -->
                <div
                    class="flex flex-col justify-center space-y-2 sm:flex-row sm:space-x-2 sm:space-y-0 md:justify-end">
                    <a href="https://ko-fi.com/YOUR_KOFI_USERNAME" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center space-x-1 rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white shadow-sm transition-colors hover:bg-indigo-700">
                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.017 2.467-2.545 2.467-2.545s.027-3.93.027-7.083h1.173c1.679 0 2.182-1.022 2.182-1.022s.637-2.96-.542-6z" />
                        </svg>
                        <span>Ko-fi</span>
                    </a>
                    <a href="https://www.paypal.com/donate/?hosted_button_id=YOUR_PAYPAL_BUTTON_ID" target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center space-x-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white shadow-sm transition-colors hover:bg-blue-700">
                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.3.3 0 0 0-.32-.07c-.99.26-2.016.39-3.06.39h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H18.4a.641.641 0 0 0 .633-.74l1.193-7.586z" />
                        </svg>
                        <span>PayPal</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-6 border-t border-gray-200 pt-4 text-center">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} Mustapha Bouddahr. All rights reserved.
            </p>
        </div>
    </div>
</footer>
