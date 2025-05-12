@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Google Font: Cinzel -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

<style>
    body,
    .cinzel {
        font-family: 'Cinzel', serif;
        font-weight: bold;
        font-size: large;
    }

    .gradient-text {
        background: linear-gradient(90deg, #A5F3FC, #FFFFFF);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        -webkit-text-fill-color: transparent;
    }
</style>

@php
    function activeClass($route) {
        return request()->routeIs($route) ? 'text-[#A5F3FC] after:scale-x-100' : 'text-white';
    }
@endphp

<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 cinzel bg-[#2442AE]/30 backdrop-blur-[12px] saturate-200 shadow-lg border-b border-white/20 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-22">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/sl_glow.png') }}" alt="Starlight Logo" class="h-16 w-22">
                </a>
            </div>

            <!-- Hamburger Button -->
            <div class="flex md:hidden">
                <button id="menu-toggle" class="text-white hover:text-blue-300 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div id="menu" class="hidden md:flex md:items-center md:justify-center md:space-x-6 w-full transition-all duration-300 ease-in-out cinzel">
                @foreach ([
                    'home' => 'HOMEPAGE',
                    'division' => 'DIVISION',
                    'register' => 'REGISTRATION',
                    'mini-gerda' => 'MINI GERDA',
                    'faq' => 'FAQ',
                ] as $route => $label)
                    <a href="{{ route($route) }}"
                        class="relative block px-3 py-2 gradient-text {{ activeClass($route) }}
                        transition duration-300 ease-in-out hover:text-[#A5F3FC]
                        after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-full after:bg-[#A5F3FC]
                        after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                        {{ $label }}
                    </a>
                    @if (!$loop->last)
                        <span class="text-white">|</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-[#2442AE]/30 backdrop-blur-[12px] saturate-200 shadow-md border-t border-white/20">
        @foreach ([
            'home' => 'Homepage',
            'division' => 'Division',
            'register' => 'Registration',
            'mini-gerda' => 'Mini Gerda',
            'faq' => 'FAQ',
        ] as $route => $label)
            <a href="{{ route($route) }}"
                class="relative block px-3 py-2 rounded-md gradient-text {{ activeClass($route) }}
                transition duration-300 ease-in-out hover:text-[#A5F3FC]
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-full after:bg-[#A5F3FC]
                after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                {{ $label }}
            </a>
        @endforeach
    </div>
</nav>

<script>
    // Toggle mobile menu
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Scroll-based blur effect
    const navbar = document.getElementById('main-navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 30) {
            navbar.classList.add('backdrop-blur-[20px]', 'bg-[#2442AE]/20');
        } else {
            navbar.classList.remove('backdrop-blur-[20px]', 'bg-[#2442AE]/20');
        }
    });
</script>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>