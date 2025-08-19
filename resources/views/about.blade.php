@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-4xl">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="mb-4 text-3xl font-bold text-gray-900">
                About <span class="font-[playwrite] text-indigo-600">mustagram</span>
            </h1>
            <p class="mx-auto max-w-2xl text-lg leading-relaxed text-gray-600">
                A modern Instagram-like social platform built with Laravel and MongoDB,
                created for learning and demonstrating full-stack development skills.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Main Content -->
            <div class="space-y-8 lg:col-span-2">
                <!-- Project Info -->
                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-indigo-100 p-2">
                            <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">Project Overview</h2>
                    </div>
                    <p class="leading-relaxed text-gray-700">
                        mustagram was developed by
                        <a href="https://mustaphabouddahr.netlify.app"
                            class="font-medium text-indigo-600 transition-colors hover:text-indigo-500">Mustapha
                            Bouddahr</a>
                        as a learning project inspired by a
                        <a href="https://www.youtube.com/watch?v=VK-2j5CNsvM&list=WL"
                            class="font-medium text-indigo-600 transition-colors hover:text-indigo-500">FreeCodeCamp
                            tutorial</a>.
                        It showcases modern web development practices and serves as a portfolio piece demonstrating
                        full-stack capabilities.
                    </p>
                </div>

                <!-- Technologies -->
                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-green-100 p-2">
                            <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">Technologies Used</h2>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3 rounded-lg border border-red-100 bg-red-50 p-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-500">
                                    <span class="text-sm font-bold text-white">L</span>
                                </div>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Laravel</p>
                                <p class="text-sm text-gray-500">PHP Framework</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 rounded-lg border border-green-100 bg-green-50 p-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-600">
                                    <span class="text-sm font-bold text-white">M</span>
                                </div>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">MongoDB</p>
                                <p class="text-sm text-gray-500">NoSQL Database</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 rounded-lg border border-blue-100 bg-blue-50 p-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-500">
                                    <span class="text-sm font-bold text-white">T</span>
                                </div>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Tailwind CSS</p>
                                <p class="text-sm text-gray-500">Utility-first CSS</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 rounded-lg border border-purple-100 bg-purple-50 p-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-600">
                                    <span class="text-sm font-bold text-white">V</span>
                                </div>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Vite</p>
                                <p class="text-sm text-gray-500">Build Tool</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Card -->
                <div class="rounded-xl border border-indigo-100 bg-gradient-to-br from-indigo-50 to-blue-50 p-6">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-indigo-600 p-2">
                            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Get in Touch</h3>
                    </div>
                    <div class="space-y-3">
                        <a href="https://mustaphabouddahr.netlify.app" target="_blank"
                            class="flex items-center space-x-3 text-gray-700 transition-colors hover:text-indigo-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9" />
                            </svg>
                            <span class="text-sm">Portfolio Website</span>
                        </a>
                        <a href="https://github.com/Must01" target="_blank"
                            class="flex items-center space-x-3 text-gray-700 transition-colors hover:text-indigo-600">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 .5C5.65.5.5 5.65.5 12c0 5.09 3.29 9.4 7.86 10.93.57.1.78-.25.78-.55 0-.27-.01-1-.02-1.96-3.2.7-3.88-1.54-3.88-1.54-.52-1.31-1.27-1.66-1.27-1.66-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.02 1.75 2.68 1.24 3.33.95.1-.74.4-1.24.72-1.53-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.18-3.1-.12-.29-.52-1.48.11-3.08 0 0 .97-.31 3.18 1.18A11.04 11.04 0 0112 6.8c.98.004 1.97.13 2.9.38 2.2-1.5 3.17-1.18 3.17-1.18.64 1.6.24 2.79.12 3.08.74.81 1.18 1.84 1.18 3.1 0 4.44-2.69 5.41-5.25 5.69.41.36.77 1.07.77 2.16 0 1.56-.01 2.82-.01 3.2 0 .3.21.66.79.55A10.52 10.52 0 0023.5 12C23.5 5.65 18.35.5 12 .5z" />
                            </svg>
                            <span class="text-sm">GitHub Profile</span>
                        </a>
                        <a href="mailto:mustaphabouddahr.dev@gmail.com"
                            class="flex items-center space-x-3 text-gray-700 transition-colors hover:text-indigo-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm">Send Email</span>
                        </a>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="rounded-xl border border-yellow-200 bg-gradient-to-br from-yellow-50 to-orange-50 p-6">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-yellow-500 p-2">
                            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Support My Work</h3>
                    </div>
                    <p class="mb-4 text-sm leading-relaxed text-gray-700">
                        Enjoying mustagram? Your support helps me continue building open-source projects and creating
                        educational content! ☕
                    </p>

                    <div class="space-y-3">
                        <a href="https://ko-fi.com/mustaphabouddahr" target="_blank" rel="noopener noreferrer"
                            class="flex w-full items-center justify-center space-x-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors hover:bg-indigo-700">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.017 2.467-2.545 2.467-2.545s.027-3.93.027-7.083h1.173c1.679 0 2.182-1.022 2.182-1.022s.637-2.96-.542-6z" />
                            </svg>
                            <span>Support on Ko-fi</span>
                        </a>

                        <a href="https://www.paypal.me/mustaphabouddahr" target="_blank" rel="noopener noreferrer"
                            class="flex w-full items-center justify-center space-x-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.3.3 0 0 0-.32-.07c-.99.26-2.016.39-3.06.39h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H18.4a.641.641 0 0 0 .633-.74l1.193-7.586z" />
                            </svg>
                            <span>Donate via PayPal</span>
                        </a>
                    </div>

                    <p class="mt-4 text-center text-xs text-gray-600">
                        Every contribution is appreciated! 🙏
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container rounded-lg bg-white p-5">
        <h1 class="mb-4 text-center text-2xl font-semibold text-gray-900">About <span
                class="font-[playwrite] text-indigo-600">mustagram</span></h1>

        <p class="mb-4 mt-10 text-gray-700">
            mustagram is a small Instagram-like project built with Laravel and MongoDB — created by
            <a href="https://mustaphabouddahr.netlify.app" class="text-indigo-600 hover:underline">Mustapha Bouddahr</a>.
            This project was built for learning and to demonstrate full-stack skills inspired by a FreeCodeCamp tutorial.
        </p>

        <h2 class="mb-2 mt-6 text-lg font-medium text-gray-900">Technologies</h2>
        <ul class="list-inside list-disc text-gray-700">
            <li>Laravel (PHP)</li>
            <li>MongoDB (database)</li>
            <li>Tailwind CSS</li>
            <li>Vite for assets</li>
        </ul>

        <h2 class="mb-2 mt-6 text-lg font-medium text-gray-900">Contact & Links</h2>
        <p class="text-gray-700">Portfolio: <a href="https://mustaphabouddahr.netlify.app"
                class="text-indigo-600 hover:underline" target="_blank">mustaphabouddahr.netlify.app</a></p>
        <p class="text-gray-700">GitHub: <a href="https://github.com/Must01" class="text-indigo-600 hover:underline"
                target="_blank">github.com/Must01</a></p>
        <p class="mt-4 text-gray-700">If you want to contact me: <a href="mailto:mustaphabouddahr.dev@gmail.com"
                class="text-indigo-600 hover:underline">mustaphabouddahr.dev@gmail.com</a></p>

        <!-- Support Section -->
        <h2 class="mb-4 mt-8 text-lg font-medium text-gray-900">Support My Work</h2>
        <div class="rounded-lg bg-gray-50 p-4">
            <p class="mb-4 text-gray-700">
                If you enjoy mustagram and want to support my development work, you can buy me a coffee or make a small
                donation.
                Your support helps me continue building open-source projects and sharing knowledge with the community! ☕
            </p>

            <div class="flex flex-wrap gap-3">
                <!-- Ko-fi Button -->
                <a href="https://ko-fi.com/YOUR_KOFI_USERNAME" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center space-x-2 rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.017 2.467-2.545 2.467-2.545s.027-3.93.027-7.083h1.173c1.679 0 2.182-1.022 2.182-1.022s.637-2.96-.542-6z" />
                    </svg>
                    <span>Support me on Ko-fi</span>
                </a>

                <!-- PayPal Button -->
                <a href="https://www.paypal.com/donate/?hosted_button_id=YOUR_PAYPAL_BUTTON_ID" target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center space-x-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.3.3 0 0 0-.32-.07c-.99.26-2.016.39-3.06.39h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H18.4a.641.641 0 0 0 .633-.74l1.193-7.586z" />
                    </svg>
                    <span>Donate via PayPal</span>
                </a>
            </div>

            <p class="mt-3 text-sm text-gray-600">
                Every contribution is appreciated and helps me dedicate more time to creating useful projects and tutorials!
                🙏
            </p>
        </div>
    </div>
@endsection
