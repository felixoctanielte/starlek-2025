<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  @vite('resources/css/app.css')
  <style>
    body {
      background: linear-gradient(to bottom, #0f0f0f, #1a1a1a); /* Optional background gradient */
    }
  </style>
</head>
<body class="flex items-center justify-center h-screen relative overflow-hidden text-white">

  <!-- Konten Utama -->
  <div class="text-center z-10">
    <h1 class="text-3xl font-bold mb-4">LOGO SL 25 (3D)</h1>
    
    <model-viewer 
      src="/models/logo3d.glb" 
      alt="3D Logo"
      auto-rotate 
      camera-controls 
      environment-image="neutral"
      exposure="1"
      shadow-intensity="1"
      style="width: 300px; height: 300px; margin: auto; background-color: transparent;">
    </model-viewer>

    <a href="/home" class="block bg-gray-800 px-6 py-2 mt-4 rounded hover:bg-gray-600">Explore</a>
    <div class="mt-4 bg-gray-800 px-6 py-2 rounded">Sponsor</div>
  </div>
</body>
</html>
