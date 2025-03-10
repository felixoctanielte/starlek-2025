<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md py-4 px-6 flex items-center justify-between">
        <!-- Logo -->
        <div class="text-xl font-bold text-gray-800">
            <a href="{{ route('home') }}">🌟 Starlight 25</a>
        </div>

        <!-- Menu -->
        <ul class="flex space-x-6 text-gray-700 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-blue-500">Homepage</a></li>
            <li><a href="{{ route('division') }}" class="hover:text-blue-500">Division</a></li>
            <li><a href="{{ route('register') }}" class="hover:text-blue-500">Registration</a></li>
            <li><a href="{{ route('mini-gerda') }}" class="hover:text-blue-500">Mini Gerda</a></li>
            <li><a href="{{ route('faq') }}" class="hover:text-blue-500">FAQ</a></li>
        </ul>
    </nav>
</body>
</html>