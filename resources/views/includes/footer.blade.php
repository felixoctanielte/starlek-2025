
@vite('resources/css/app.css')

<!-- Google Font untuk judul -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

<style>
  .mystical-font {
    font-family: 'Cinzel Decorative', serif !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    text-shadow: 0 0 8px rgba(173, 216, 230, 0.7), 0 0 16px rgba(135, 206, 250, 0.8);
    letter-spacing: 1px;
  }
</style>

    <!-- Connector -->
    <div class="relative h-[50px] md:h-[65px] lg:h-[75px] z-20 -mb-8">
  <img src="{{ asset('assets/images/connector.png') }}" alt="Connector" class="absolute top-0 left-0 w-full h-auto">
</div>

<footer class="relative bg-[#002155] text-white text-center overflow-hidden" style="background-image: url('{{ asset('assets/images/bg.png') }}'); background-size: cover; background-position: center;">


    <!-- Aurora Background Glow -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-800 via-indigo-700 to-blue-800 opacity-30 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-6xl mx-auto pt-20 pb-12 px-4">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/images/sl_glow.png') }}" alt="Starlight Logo" class="h-36 sm:h-40 md:h-48 animate-pulse-slow">
        </div>

        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold leading-snug sm:leading-tight max-w-[90%] sm:max-w-xl md:max-w-2xl mx-auto mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)] text-center px-2">
    Ignite Your Spirit <br> Show Its Radiance
</h1>

        <!-- Garis pemisah -->
        <div class="border-t border-gray-300 w-1/3 mx-auto my-6"></div>

        <!-- Part Of dan logo -->
        <p class="text-white/70 mb-2 text-sm">Part Of</p>
        <div class="flex justify-center items-center mb-6">
            <div class="bg-white p-2 px-4 rounded-lg flex items-center space-x-4">
                <img src="{{ asset('assets/images/umnlogobiru.png') }}" alt="UMN Logo" class="h-12">
                <img src="{{ asset('assets/images/bemlogo.png') }}" alt="BEM Logo" class="h-12">
            </div>
        </div>

        <!-- Alamat -->
        <p class="text-xs leading-relaxed text-white/70">
            Universitas Multimedia Nusantara<br>
            Jl. Scientia Boulevard, Gading Serpong,<br>
            Tangerang Banten 15811, Indonesia.
        </p>

        <!-- Divider -->
        <div class="border-t border-gray-300 w-1/3 mx-auto my-6"></div>

        <!-- Credit -->
        <p class="text-xs leading-relaxed text-white/70">
            &copy; Starlight UMN 2025 <br>
            Developed and Managed by Lindworm.
        </p>
    </div>
</footer>
