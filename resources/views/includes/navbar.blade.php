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

    /* --- NEW STYLE FOR ARROW NAVBAR --- */
    .navbar-arrow {
        position: relative;
    }

    .navbar-arrow::before,
    .navbar-arrow::after {
        content: '';
        position: absolute;
        top: 0;
        width: 60px;
        height: 100%;
        background-color: rgba(36, 66, 174, 0.4);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        clip-path: polygon(100% 0, 0 50%, 100% 100%);
        z-index: -1;
    }

    .navbar-arrow::after {
        right: -60px;
        transform: rotateY(180deg);
    }

    .navbar-arrow::before {
        left: -60px;
    }

    .nav-transparent {
        background-color: rgba(30, 58, 138, 0.5);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        transition: background-color 0.5s ease-in-out, backdrop-filter 0.5s ease-in-out;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .nav-solid {
        background-color: #1E3A8A;
        /* Warna solid biru yang bagus */
        backdrop-filter: none;
        -webkit-backdrop-filter: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Opsional: tambahkan shadow agar menonjol */
        transition: background-color 0.5s ease-in-out, backdrop-filter 0.5s ease-in-out;
    }

    .toogle-click {
        color: #A5F3FC !important;
        transition: color 0.3s ease-in-out;
    }

    @media (max-width: 768px) {

        .navbar-arrow::before,
        .navbar-arrow::after {
            display: none;
        }
    }
</style>

@php
function activeClass($route) {
return request()->routeIs($route) ? 'text-[#A5F3FC] after:scale-x-100' : 'text-white';
}
@endphp

<nav id="main-navbar" class="navbar-arrow fixed top-0 left-0 right-0 z-50 cinzel nav-solid transition-all duration-500">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-22">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/sl_glow.png') }}" alt="Starlight Logo" class="h-16 w-22">
                </a>
            </div>

            <!-- Hamburger Button -->
            <div class="flex lg:hidden">
                <button id="menu-toggle"
                    class="text-white focus:outline-none transition duration-300">
                    <svg class="h-6 w-6 transition duration-300"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div id="menu" class="hidden lg:flex lg:items-center lg:justify-center lg:space-x-6 w-full transition-all duration-300 ease-in-out cinzel">
                @foreach ([
                'home' => 'HOMEPAGE',
                'division' => 'DIVISION',
                'stages' => 'STAGES',
                'mini-gerda' => 'MINI GERDA',
                'faq' => 'FAQ',
                ] as $route => $label)
                <a href="{{ route($route) }}"
                    class=" text-base lg:text-lg relative block px-3 py-2 gradient-text {{ activeClass($route) }}
                            transition duration-300 ease-in-out hover:text-[#A5F3FC]
                            after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-full after:bg-[#A5F3FC]
                            after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                    {{ $label }}
                </a>
                @if (!$loop->last)
                <span class="text-white pointer-events-none select-none">|</span>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden px-4 pb-4 space-y-2 nav-solid shadow-lg cinzel">
        @foreach ([
        'home' => 'HOMEPAGE',
        'division' => 'DIVISION',
        'stages' => 'STAGES',
        'mini-gerda' => 'MINI GERDA',
        'faq' => 'FAQ',
        ] as $route => $label)
        <a href="{{ route($route) }}"
            class="relative block px-3 py-2 rounded-lg gradient-text {{ activeClass($route) }}
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
        menuToggle.classList.toggle('toogle-click');

        // Terapkan kelas sesuai scrollY saat menu dibuka
        if (!mobileMenu.classList.contains('hidden')) {
            if (window.scrollY > 10) {
                mobileMenu.classList.remove('nav-solid');
                mobileMenu.classList.add('nav-transparent');
            } else {
                mobileMenu.classList.remove('nav-transparent');
                mobileMenu.classList.add('nav-solid');
            }
        }
    });

    // Deteksi klik di luar menu dan tombol toggle
    document.addEventListener('click', (event) => {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnToggle = menuToggle.contains(event.target);

        if (!isClickInsideMenu && !isClickOnToggle && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            menuToggle.classList.remove('toogle-click');
        }
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.remove('nav-solid');
            navbar.classList.add('nav-transparent');

            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('nav-solid');
                mobileMenu.classList.add('nav-transparent');
            }
        } else {
            navbar.classList.remove('nav-transparent');
            navbar.classList.add('nav-solid');

            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('nav-transparent');
                mobileMenu.classList.add('nav-solid');
            }
        }
    });
</script>