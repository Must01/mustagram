<!-- resources/views/partials/footer.blade.php -->
<footer class="mt-12 border-t border-gray-200 bg-gray-50/50">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <!-- Main footer content -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 md:gap-8">

            <!-- Left: About/Credit -->
            <div class="text-center md:text-left">
                <h3 class="mb-2 font-[playwrite] text-sm font-medium text-gray-900">mustagram</h3>
                <p class="text-sm leading-relaxed text-gray-600">
                    Built with ❤️ by
                    <a href="https://mustaphabouddahr.netlify.app" target="_blank" rel="noopener noreferrer"
                        class="font-medium text-indigo-600 transition-colors hover:text-indigo-500">Mustapha Bouddahr</a>
                </p>
                <p class="mt-1 text-xs text-gray-500">
                    Inspired by
                    <a href="https://www.youtube.com/watch?v=VK-2j5CNsvM&list=WL"
                        class="text-indigo-600 hover:text-indigo-500">
                        FreeCodeCamp
                    </a>
                </p>
            </div>

            <!-- Center: Tech Stack -->
            <div class="text-center">
                <h3 class="mb-2 text-sm font-medium text-gray-900">Tech Stack</h3>
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="https://laravel.com/" target="_blank"
                        class="inline-flex items-center gap-1 rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 transition-colors hover:bg-red-200">
                        <x-icon icon="laravel" size="w-4 h-4" />
                        Laravel
                    </a>
                    <a href="https://www.mongodb.com/" target="_blank"
                        class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 transition-colors hover:bg-green-200">
                        <x-icon icon="mongodb" size="w-4 h-4" />
                        MongoDB
                    </a>
                    <a href="https://tailwindcss.com/" target="_blank"
                        class="inline-flex items-center gap-1 rounded-full bg-cyan-100 px-3 py-1 text-xs font-medium text-cyan-700 transition-colors hover:bg-cyan-200">
                        <x-icon icon="tailwind" size="w-4 h-4" />
                        Tailwind
                    </a>
                    <a href="https://cloudinary.com/" target="_blank"
                        class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 transition-colors hover:bg-blue-200">
                        <x-icon icon="cloudinary" size="w-4 h-4" />
                        Cloudinary
                    </a>
                    <a href="https://vitejs.dev/" target="_blank"
                        class="inline-flex items-center gap-1 rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700 transition-colors hover:bg-purple-200">
                        <x-icon icon="vite" size="w-4 h-4" />
                        Vite
                    </a>
                </div>
            </div>

            <!-- Right: Social & Support -->
            <div class="text-center md:text-right">
                <h3 class="mb-3 text-sm font-medium text-gray-900">Connect & Support</h3>
                <div class="mb-3 flex justify-center space-x-4 md:justify-end">
                    <a href="https://github.com/Must01" target="_blank"
                        class="text-gray-400 transition-colors hover:text-gray-600" aria-label="GitHub Profile">
                        <x-icon icon="github" size="w-4 h-4" />
                    </a>
                    <a href="mailto:mustaphabouddahr.dev@gmail.com"
                        class="text-gray-400 transition-colors hover:text-gray-600" aria-label="Email">
                        <x-icon icon="gmail" size="w-4 h-4" />
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-400 transition-colors hover:text-gray-600"
                        aria-label="About">
                        <x-icon icon="info" format="png" size="w-4 h-4" />
                    </a>
                </div>
                <div class="flex justify-center space-x-2 md:justify-end">
                    <a href="https://ko-fi.com/mustaphabouddahr" target="_blank"
                        class="rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white shadow transition-colors hover:bg-indigo-700">Ko-fi</a>
                    <a href="https://paypal.me/mustaphabouddahr" target="_blank"
                        class="rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white shadow transition-colors hover:bg-blue-700">PayPal</a>
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
