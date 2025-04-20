@vite('resources/css/app.css')
  <!-- Google Font (Mystical Crystal Style) -->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
  <style>
    .mystical-font {
      font-family: 'Cinzel', serif;
      text-shadow: 0 0 8px rgba(173, 216, 230, 0.7), 0 0 16px rgba(135, 206, 250, 0.8);
    }
  </style>


<!---FONT css link-->
<link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">

<footer class="relative bg-[#002155] text-white text-center py-12 px-4 overflow-hidden">
    <!-- Aurora Background Glow -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-800 via-indigo-700 to-blue-800 opacity-30 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-6xl mx-auto">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
        <img src="{{ asset('assets/images/sl_glow.png') }}" alt="Starlight Logo" class="h-36 sm:h-40 md:h-48 animate-pulse-slow">

        </div>

    <!-- Judul -->
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
    Ignite Your Spirit Show Its Radiance
    </h1>

        <!-- Divider -->
        <div class="border-t border-gray-300 w-1/3 mx-auto my-6"></div>

<!-- Part Of -->
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
