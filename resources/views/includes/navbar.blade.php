@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Google Font: Cinzel -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

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
    
    .nav-solid {
        background: linear-gradient(90deg, #1E3A8A 0%, #1D4ED8 30%);
        transition: background-color 0.5s ease-in-out, backdrop-filter 0.5s ease-in-out;
    }

    .nav-transparent {
        background-color: rgba(36, 66, 174, 0.4);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        transition: background-color 0.5s ease-in-out, backdrop-filter 0.5s ease-in-out;
    }
</style>
 

@php
function activeClass($route) {
return request()->routeIs($route) ? 'text-[#A5F3FC] after:scale-x-100' : 'text-white';
}
@endphp

<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 cinzel nav-solid transition-all duration-500">
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
                <button id="menu-toggle" class="text-white hover:text-blue-500 focus:outline-none focus:text-blue-500">
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
                'stages' => 'STAGES',
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
                <span class="text-white pointer-events-none select-none">|</span>
                @endif
              endforeach
            </div>
        </div>
    </div>

             

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-[#2442AE] shadow-md cinzel">
        @foreach ([
        'home' => 'HOMEPAGE',
        'division' => 'DIVISION',
        'stages' => 'STAGES',
        'mini-gerda' => 'MINI GERDA',
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
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const navbar = document.getElementById('main-navbar');
    
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.remove('nav-solid');
            navbar.classList.add('nav-transparent');
        } else {
            navbar.classList.remove('nav-transparent');
            navbar.classList.add('nav-solid');
        }
    });
</script>
