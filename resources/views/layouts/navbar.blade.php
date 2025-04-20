<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center text-lg font-bold text-blue-600">
                <a href="{{ route('home') }}" class="flex items-center gap-2 py-2">
                    <img src="{{ asset('/build/assets/images/logo-star.png') }}" alt="event logo" class="w-16 h-116 object-cover">
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 text-sm font-medium text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-500">Homepage</a>
                <a href="{{ route('division') }}" class="hover:text-blue-500">Division</a>
                <a href="{{ route('register') }}" class="hover:text-blue-500">Registration</a>
                <a href="{{ route('mini-gerda') }}" class="hover:text-blue-500">Mini Gerda</a>
                <a href="{{ route('faq') }}" class="hover:text-blue-500">FAQ</a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="hidden absolute top-16 left-0 w-full bg-gray-800 text-white z-50">
        <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-blue-500">Homepage</a>
        <a href="{{ route('division') }}" class="block py-2 text-gray-700 hover:text-blue-500">Division</a>
        <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:text-blue-500">Registration</a>
        <a href="{{ route('mini-gerda') }}" class="block py-2 text-gray-700 hover:text-blue-500">Mini Gerda</a>
        <a href="{{ route('faq') }}" class="block py-2 text-gray-700 hover:text-blue-500">FAQ</a>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>