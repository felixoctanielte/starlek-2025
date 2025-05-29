<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Application') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-cover bg-center bg-no-repeat text-gray-900 font-inter antialiased" style="background-image: url('{{ asset('images/bg.png') }}')">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 backdrop-blur-sm">
        <div class="relative w-full max-w-md sm:max-w-lg bg-blue-200/30 backdrop-blur-md rounded-2xl shadow-2xl p-6 sm:p-8 space-y-6 border border-white/20">
            
            <!-- Back Button Icon -->
            <a href="{{ route('home') }}" class="absolute left-4 top-4 text-white hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            
            <div class="text-center">
                <h1 class="text-2xl sm:text-3xl font-bold text-white drop-shadow">
                    @if (Request::is('register'))
                        Register
                    @elseif (Request::is('login'))
                        Login
                    @else
                        My Application
                    @endif
                </h1>
            </div>

            <div class="space-y-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
