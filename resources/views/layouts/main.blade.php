<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CarShop') }} - @yield('title', 'Home')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <a href="/" class="flex items-center space-x-2">
                            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                            </svg>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">CarShop</span>
                        </a>

                        <!-- Main Navigation -->
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ route('cars.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('cars.*') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:border-gray-300 dark:hover:border-gray-600' }}">
                                Cars
                            </a>
                            <a href="{{ route('customers.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('customers.*') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:border-gray-300 dark:hover:border-gray-600' }}">
                                Customers
                            </a>
                             <a href="{{ route('announcements.index') }}"
                               class="inline-flex items-center px-1 pt-1 text-sm font-medium
                               {{ request()->routeIs('announcements.*')
                              ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400'
                           : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:border-gray-300 dark:hover:border-gray-600' }}">
                           Announcements
                            </a>
                        </div>
                    </div>

                    <!-- Auth Links -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->

        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider">About</h3>
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                            Your trusted partner in finding the perfect vehicle. Quality cars, exceptional service.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider">Quick Links</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('cars.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Browse Cars</a></li>
                            <li><a href="{{ route('customers.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Customer Portal</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider">Contact</h3>
                        <ul class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li>Phone: (555) 123-4567</li>
                            <li>Email: info@carshop.com</li>
                            <li>Hours: Mon-Sat 9AM-6PM</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-8">
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                        © {{ date('Y') }} CarShop. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
