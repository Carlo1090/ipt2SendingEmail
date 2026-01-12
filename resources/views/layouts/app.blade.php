<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CarShop') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">

<!-- ✅ CarShop Navbar -->
<nav class="bg-gradient-to-b from-slate-900 to-slate-800 border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            <!-- Left -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="flex items-center space-x-2 text-white font-semibold text-lg">
                    🚗 <span>CarShop</span>
                </a>

                @php
                    $active = 'border-b-2 border-blue-500 text-white';
                    $inactive = 'text-slate-300 hover:text-white';
                @endphp

                <a href="{{ route('cars.index') }}"
                   class="h-16 flex items-center {{ request()->routeIs('cars.*') ? $active : $inactive }}">
                    Cars
                </a>

                <a href="{{ route('customers.index') }}"
                   class="h-16 flex items-center {{ request()->routeIs('customers.*') ? $active : $inactive }}">
                    Customers
                </a>

                <a href="{{ route('announcements.index') }}"
                   class="h-16 flex items-center {{ request()->routeIs('announcements.*') ? $active : $inactive }}">
                    Announcements
                </a>
            </div>

            <!-- Right -->
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}"
                       class="text-slate-300 hover:text-white text-sm">
                        Log in
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-medium rounded-md">
                        Register
                    </a>
                @else
                    <span class="text-slate-300 text-sm">
                        {{ Auth::user()->name }}
                    </span>
                @endguest
            </div>

        </div>
    </div>
</nav>


<!-- ✅ Page Content -->
<main class="py-8">
    @yield('content')
</main>

</body>
</html>
