<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Landing Page</title>

  <!-- Model Viewer -->
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

  @vite(['resources/css/app.css'])

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap');

    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden; /* <- Disable scroll */
    }

    body {
      background-image: url('{{ asset('assets/images/backgrounds.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      font-family: 'Cinzel Decorative', serif;
      color: white;
      display: flex;
      flex-direction: column;
    }

    .about-title {
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 2px;
      text-shadow:
        0 0 5px rgba(255, 255, 255, 0.7),
        0 0 10px rgba(173, 216, 230, 0.8),
        0 0 20px rgba(0, 255, 255, 0.6);
    }
  </style>
</head>
<body>

  <!-- Wrapper Flex Container (Column Layout) -->
  <div class="flex flex-col justify-between items-center h-screen w-full text-white px-4">

    <!-- Konten Tengah -->
    <div class="flex flex-col items-center text-center w-full">
      <!-- Judul di atas logo -->
      <h1 class="about-title text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mb-6 mt-6">
        WELCOME TO STARLIGHT 2025
      </h1>

      <!-- Logo 3D -->
      <model-viewer
        src="/models/logov3.glb"
        alt="3D Logo"
        auto-rotate
        camera-controls
        environment-image="neutral"
        exposure="1"
        shadow-intensity="1"
        style="width: 100%; max-width: 300px; height: 300px; background-color: transparent;">
      </model-viewer>
     <a href="/home" class="relative inline-block px-8 py-3 mt-6 font-semibold text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-700 shadow-lg border border-white/10 backdrop-blur-sm overflow-hidden group">
  <span class="relative z-10">Explore</span>

  <!-- Shine effect -->
  <span class="absolute top-0 left-[-75%] w-[200%] h-full bg-white/20 transform rotate-12 group-hover:left-[125%] transition-all duration-1000 ease-in-out"></span>

  <!-- Pulse ring effect -->
  <span class="absolute inset-0 rounded-lg ring-2 ring-cyan-300 animate-pulse opacity-20"></span>
</a>

      <!-- Title & Description -->
      <div class="w-full px-6 mt-6">
        
        <h2 class="text-3xl font-bold shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
          SPONSORED BY
        </h2>
      </div>

      <!-- Sponsor Logos -->
      <div class="flex flex-wrap justify-center items-center gap-6 mt-4 px-4">
        <img src="sponsor1.png" alt="Sponsor 1" class="sm:h-8 md:h-10 object-contain" />
        <img src="sponsor2.png" alt="Sponsor 2" class="sm:h-8 md:h-10 object-contain" />
        <img src="sponsor3.png" alt="Sponsor 3" class="sm:h-8 md:h-10 object-contain" />
        <img src="sponsor4.png" alt="Sponsor 4" class="sm:h-8 md:h-10 object-contain" />
        <img src="sponsor5.png" alt="Sponsor 5" class="sm:h-8 md:h-10 object-contain" />
      </div>
    </div>

    <!-- Connector selalu di bawah -->
    <div class="w-full">
      <img 
        src="{{ asset('assets/images/connector.png') }}" 
        alt="Connector" 
        class="w-full h-[100px] md:h-[140px] lg:h-[180px] object-cover"
      />
    </div>

  </div>
</body>
</html>
