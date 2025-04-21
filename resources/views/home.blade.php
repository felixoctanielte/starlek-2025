@extends('layouts.navbar')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        html, body {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="overflow-x-hidden bg-cover bg-center" style="background-image: url('/build/assets/images/web-bg.png');">
    
        <!-- Main Image (Statis) -->
        <div class="w-full h-96 bg-cover bg-center" style="background-image: url('/build/assets/images/web-bg.png');"></div>

        <!-- Carousel Section (Documentation Images) -->
        <div class="relative py-12 overflow-hidden">
            <div class="carousel-container mx-auto px-4 max-w-screen-xl">
                <!-- Carousel Flex Container -->
                <div class="carousel flex animate-[slide_10s_infinite_linear] w-max"> <!-- Ganti w-full jadi w-max -->
                    <!-- Carousel Items -->
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="carousel-item aspect-[4/3] w-[250px] flex-shrink-0 overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('/build/assets/images/doc' . $i . '.jpeg') }}" alt="Image" class="w-full h-full object-cover transition-transform duration-500 ease-in-out transform scale-110 filter blur-sm hover:scale-100 hover:blur-none">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        
        <!-- About Us Section -->
        <div class="about-us" style="text-align: center; padding-top: 3rem; padding-bottom: 3rem;">
            <h1 class="section-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937;">About Us</h1>
            <div class="about-us-logo mt-6 flex justify-center">
                <img src="{{ asset('/build/assets/images/logo-text.png') }}" alt="logo" class="w-80 h-80 object-cover">
            </div>
            <h2 class="section-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937; margin-top: 2rem;">What is Starlight?</h2>
            <p class="about-us-desc" style="font-size: 1.125rem; color: #4b5563; margin-top: 1rem; max-width: 48rem; margin-left: auto; margin-right: auto;">Starlight adalah salah satu kegiatan mahasiswa yang dinaungi Badan Eksekutif Mahasiswa (BEM) 
Universitas Multimedia Nusantara untuk mewadahi serta menyalurkan minat dan bakat individu. 
Kegiatan Mahasiswa Starlight mengupayakan dorongan bagi masyarakat untuk percaya akan 
perkembangan bakat mereka masing masing.
</p>
        </div>

        <!-- Visi Misi Section -->
        <div class="visi-misi" style="display: flex; justify-content: space-between; padding-top: 3rem; padding-bottom: 3rem;">
            <div class="visi" style="width: 50%; padding: 0 1.5rem; text-align: center;">
                <h2 class="section-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937;">Vision</h2>
                <p class="section-desc" style="font-size: 1.125rem; color: #4b5563;">Menciptakan lingkungan Starlight yang positif dan mendukung sehingga dapat menjadi tempat bagi panitia dan peserta untuk menggali potensi dan mengembangkan diri sebaik mungkin.</p>
            </div>
            <div class="misi" style="width: 50%; padding: 0 1.5rem; text-align: center;">
                <h2 class="section-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937;">Mission</h2>
                <p class="section-desc" style="font-size: 1.125rem; color: #4b5563;">Memberikan wadah bagi setiap individu di UMN dan diluar UMN yang ingin menunjukan bakat terbaik mereka.</p>
            </div>
        </div>

        <!-- Event Name and Logo -->
        <div class="event" style="text-align: center; padding-top: 3rem; padding-bottom: 3rem;">
            <h1 class="section-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937;">Starlight 2025</h1>
            <div class="about-us-logo mt-6 flex justify-center">
                <img src="{{ asset('/build/assets/images/logo-star.png') }}" alt="event logo" class="w-80 h-80 object-cover">
            </div>
        </div>

        <!-- Concept Section -->
        <div class="concept-wrapper" style="text-align: center; padding-top: 3rem; padding-bottom: 3rem;">
            <div class="concept">
                <h2 class="section-subtitle" style="font-size: 1.25rem; font-weight: 600; color: #1f2937;">Concept</h2>
                <h1 class="section-title" style="font-size: 1.875rem; font-weight: 700; color: #1f2937; margin-top: 1rem;">Awaken The Magic Within</h1>
                <p class="concept-desc" style="font-size: 1.125rem; color: #4b5563; margin-top: 1rem; max-width: 48rem; margin-left: auto; margin-right: auto;">Bakat digambarkan sebagai kristal magis yang terhubung dengan elemen alam dan kekuatan dalam diri. Dimana peserta diajak untuk menyadari potensi luar biasa dalam diri mereka dan memperlihatkan "keajaiban" itu kepada dunia. Perjalanan peserta layaknya menjelajahi misteri, menemukan harmoni, dan membangkitkan kekuatan sejati mereka.</p>
            </div>
        </div>

        <!-- Theme-Tagline Section -->
        <div class="theme-tagline" style="display: flex; justify-content: space-between; align-items: flex-start; width: 100%; padding: 0 1rem; margin-top: 3rem;">
            <div class="theme" style="width: 33%; padding: 0 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                <h2 class="section-subtitle" style="font-size: 1.25rem; font-weight: 600; color: #1f2937;">Theme</h2>
                <h1 class="section-title" style="font-size: 1.875rem; font-weight: 700; color: #1f2937; margin-top: 1rem;">Mystical Crystal</h1>
                <p class="section-desc" style="font-size: 1.125rem; color: #4b5563; margin-top: 1rem; max-width: 48rem; margin-left: auto; margin-right: auto;">Mystical Crystal adalah sebuah tempat pencari bakat mistik yang menggambarkan bakat individu dalam diri mereka layaknya kristal. Setiap kristal memiliki potensi unik yang menunggu untuk ditemukan, diasah, dan bersinar terang. Tema ini bertujuan untuk menggali potensi terbaik dari setiap peserta, memberikan mereka kesempatan untuk berkembang, dan memukau dunia dengan keunikan mereka.</p>
            </div>
            <div class="tagline" style="width: 33%; padding: 0 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                <h2 class="section-subtitle" style="font-size: 1.25rem; font-weight: 600; color: #1f2937;">Tagline</h2>
                <h1 class="section-title" style="font-size: 1.875rem; font-weight: 700; color: #1f2937; margin-top: 1rem;">Ignite Your Spirit, Show Its Radiance</h1>
                <p class="section-desc" style="font-size: 1.125rem; color: #4b5563; margin-top: 1rem; max-width: 48rem; margin-left: auto; margin-right: auto;">Tagline ini mengajak setiap orang untuk membangkitkan semangat, potensi, dan energi dalam diri mereka. berani mencoba membuat percikan. Walaupun percikan itu kecil, nantinya dari percikan tersebut, akan terpantul sinar yang besar dari diri mereka yang akan bersinar terang dan mereka bisa menunjukkan “terang” tersebut ke dunia</p>
            </div>
        </div>

        <!-- Sponsored by Section -->
        <div class="sponsored" style="text-align: center; padding-top: 3rem; padding-bottom: 3rem; background-color: #f9f9f9;">
            <h2 class="sponsored-title" style="font-size: 1.875rem; font-weight: 600; color: #1f2937; margin-bottom: 1.5rem;">Sponsored by</h2>
            <div class="sponsor-logos" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
                <img src="sponsor1.png" alt="Sponsor 1" class="sponsor-logo" style="height: 2.5rem;">
                <img src="sponsor2.png" alt="Sponsor 2" class="sponsor-logo" style="height: 2.5rem;">
                <img src="sponsor3.png" alt="Sponsor 3" class="sponsor-logo" style="height: 2.5rem;">
                <img src="sponsor4.png" alt="Sponsor 4" class="sponsor-logo" style="height: 2.5rem;">
                <img src="sponsor5.png" alt="Sponsor 5" class="sponsor-logo" style="height: 2.5rem;">
            </div>
        </div>

    <script>
        let carouselItems = document.querySelectorAll('.carousel-item');
        let index = 0;

        setInterval(() => {
            // Update carousel to show the next image every 3 seconds
            index = (index + 1) % carouselItems.length;
            carouselItems.forEach((item, i) => {
                item.classList.remove('scale-110', 'blur-sm');
                if (i === index) {
                    item.classList.add('scale-110', 'blur-none');
                }
            });
        }, 3000); // Change image every 3 seconds
    </script>

</body>
</html>