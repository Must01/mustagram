@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-5xl">
        <!-- Header -->
        <div class="mb-10 text-center">
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
                <!-- Project Overview -->
                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm transition-shadow hover:shadow-md">
                    <div class="mb-4 flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="rounded-lg bg-indigo-100 p-2">
                                <x-icon icon="idea" format="png" />
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Project Overview</h2>
                            <p class="text-sm text-gray-500">Full-stack development showcase</p>
                        </div>
                    </div>
                    <p class="leading-relaxed text-gray-700">
                        <span class="font-[playwrite] text-indigo-600">mustagram</span> was built by
                        <a href="https://mustaphabouddahr.netlify.app" target="_blank"
                            class="font-medium text-indigo-600 transition-colors hover:text-indigo-500 hover:underline">Mustapha
                            Bouddahr</a>,
                        inspired by a
                        <a href="https://www.youtube.com/watch?v=VK-2j5CNsvM&list=WL" target="_blank"
                            class="font-medium text-indigo-600 transition-colors hover:text-indigo-500 hover:underline">FreeCodeCamp
                            tutorial</a>.
                        It demonstrates modern full-stack practices and serves as a comprehensive portfolio project
                        showcasing
                        both backend and frontend development skills.
                    </p>
                </div>

                <!-- Technologies -->
                <div
                    class="rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition-shadow hover:shadow-md sm:p-6">
                    <div class="mb-4 flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="rounded-lg bg-green-100 p-2">
                                <x-icon icon="tech" format="png" />
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Technologies Used</h2>
                            <p class="text-sm text-gray-500">Modern web development stack</p>
                        </div>
                    </div>
                    <div class="sm:grid-3 grid grid-cols-1 gap-2 text-gray-700 sm:grid-cols-2">
                        <a href="https://laravel.com/" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-red-100 bg-red-50 px-4 py-3 text-center transition-colors hover:bg-red-100">
                            <x-icon icon="laravel" />
                            <div>
                                <p class="font-medium text-red-800 group-hover:text-red-900">Laravel</p>
                                <p class="text-xs text-red-600">PHP Framework</p>
                            </div>
                        </a>
                        <a href="https://www.mongodb.com/" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-green-100 bg-green-50 px-4 py-3 text-center transition-colors hover:bg-green-100">
                            <x-icon icon="mongodb" />
                            <div>
                                <p class="font-medium text-green-800 group-hover:text-green-900">MongoDB</p>
                                <p class="text-xs text-green-600">NoSQL Database</p>
                            </div>
                        </a>
                        <a href="https://tailwindcss.com/" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-cyan-100 bg-cyan-50 px-4 py-3 text-center transition-colors hover:bg-cyan-100">
                            <x-icon icon="tailwind" />
                            <div>
                                <p class="font-medium text-cyan-800 group-hover:text-cyan-900">TailwindCSS</p>
                                <p class="text-xs text-cyan-600">Utility-first CSS</p>
                            </div>
                        </a>
                        <a href="https://vitejs.dev/" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-purple-100 bg-purple-50 px-4 py-3 text-center transition-colors hover:bg-purple-100">
                            <x-icon icon="vite" />
                            <div>
                                <p class="font-medium text-purple-800 group-hover:text-purple-900">Vite</p>
                                <p class="text-xs text-purple-600">Build Tool</p>
                            </div>
                        </a>
                        <a href="https://cloudinary.com/" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-center transition-colors hover:bg-blue-100">
                            <x-icon icon="cloudinary" />
                            <div>
                                <p class="font-medium text-blue-800 group-hover:text-blue-900">Cloudinary</p>
                                <p class="text-xs text-blue-600">Image Storage</p>
                            </div>
                        </a>
                        <a href="https://github.com/Must01/mustagram" target="_blank"
                            class="group flex items-center justify-center gap-3 rounded-lg border border-gray-100 bg-gray-50 px-4 py-3 text-center transition-colors hover:bg-gray-100">
                            <x-icon icon="github" />
                            <div>
                                <p class="font-medium text-gray-800 group-hover:text-gray-900">Source Code</p>
                                <p class="text-xs text-gray-600">View on GitHub</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Card -->
                <div class="rounded-xl border border-indigo-100 bg-gradient-to-br from-indigo-50 to-blue-50 p-6 text-start">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-indigo-600 p-2">
                            <x-icon icon="chat" format="png" />
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Get in Touch</h3>
                    </div>
                    <div class="flex flex-col items-start space-y-3">
                        <a href="https://mustaphabouddahr.netlify.app" target="_blank"
                            class="group flex w-full items-center justify-center space-x-3 text-center text-gray-700 transition-colors hover:text-indigo-600">
                            <span class="text-lg">🌐</span>
                            <div class="w-full">
                                <p class="text-sm font-medium group-hover:underline">Portfolio Website</p>
                                <p class="text-xs text-gray-500">mustaphabouddahr.netlify.app</p>
                            </div>
                        </a>
                        <a href="https://github.com/Must01" target="_blank"
                            class="group flex w-full items-center justify-center space-x-3 text-center text-gray-700 transition-colors hover:text-indigo-600">
                            <x-icon icon="github" />
                            <div class="w-full">
                                <p class="text-sm font-medium group-hover:underline">GitHub Profile</p>
                                <p class="text-xs text-gray-500">@Must01</p>
                            </div>
                        </a>
                        <a href="mailto:mustaphabouddahr.dev@gmail.com"
                            class="group flex w-full items-center justify-center space-x-3 text-center text-gray-700 transition-colors hover:text-indigo-600">
                            <x-icon icon="gmail" />
                            <div class="w-full">
                                <p class="text-sm font-medium group-hover:underline">Email</p>
                                <p class="text-xs text-gray-500">mustaphabouddahr.dev@gmail.com</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="rounded-xl border border-yellow-200 bg-gradient-to-br from-yellow-50 to-orange-50 p-6">
                    <div class="mb-4 flex items-center">
                        <div class="rounded-lg bg-yellow-500 p-2">
                            <x-icon icon="budgeting" format="png" />
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Support My Work</h3>
                    </div>
                    <p class="mb-4 text-sm leading-relaxed text-gray-700">
                        If you enjoy <span class="font-[playwrite] text-indigo-600">mustagram</span>, consider supporting
                        my work.
                        Every contribution helps me create more projects & educational content! 🙏
                    </p>
                    <div class="space-y-3">
                        <a href="https://ko-fi.com/mustaphabouddahr" target="_blank"
                            class="flex w-full items-center justify-center space-x-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white shadow transition-colors hover:bg-indigo-700">
                            <x-icon icon="kofi" />
                            <span>Support on Ko-fi</span>
                        </a>
                        <a href="https://paypal.me/mustaphabouddahr" target="_blank"
                            class="flex w-full items-center justify-center space-x-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white shadow transition-colors hover:bg-blue-700">
                            <x-icon icon="paypal" />
                            <span>Donate via PayPal</span>
                        </a>
                    </div>
                    <p class="mt-4 text-center text-xs text-gray-600">
                        Every contribution is appreciated and helps me dedicate more time to open-source projects!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
