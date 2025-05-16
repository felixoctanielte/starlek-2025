@include('includes.navbar')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        html, body {
            overflow-x: hidden;
        }

        .section-bg {
        background-color: rgba(0, 0, 0, 0.5); /* semi-transparan */
        padding: 3rem 1rem;
        border-radius: 1rem;
        margin: 2rem auto;
        max-width: 1200px;
        }

        @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
        }

        .animate-marquee {
        animation: marquee 30s linear infinite;
        }

        .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in.show {
        opacity: 1;
        transform: translateY(0);
        }

    </style>
</head>
<body class="text-white bg-no-repeat bg-cover bg-center" style="background-image: url('assets/images/backgrounds.png');">
<section class="flex flex-col items-center justify-center bg-cover bg-center relative">
<div>
<!-- Sponsored by Section -->
<div class="h-screen scroll-mt-20 relative w-full h-[700px] overflow-hidden">

    <!-- Background Image -->
    <img src="{{ asset('assets/images/contoh.jpg') }}"
         alt="Sponsor Background"
         class="absolute inset-0 w-full h-full object-cover z-0" />

    <!-- Overlay Content Full Height with content at bottom -->
    <div class="relative z-10 h-full flex flex-col px-4">

        <!-- Title & Subtitle -->
        <div class="text-center z-10 fade-in">
            <h1 class="text-4xl font-bold drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">DOCUMENTATION</h1>
        </div>

        <!-- Carousel: Sticky to bottom -->
<div class="mt-auto w-full overflow-hidden">
    <div class="carousel-container mx-auto max-w-screen-xl px-4">
        <div class="carousel-track flex gap-6 w-max animate-marquee">
            @php
                $sponsors = [
                    'umnlogobiru.png',
                    'umnlogobiru.png',
                    'umnlogobiru.png',
                    'umnlogobiru.png'
                ];
            @endphp

            @foreach ($sponsors as $index => $sponsor)
            <div class="carousel-item w-[200px] aspect-[4/3] flex-shrink-0 overflow-hidden rounded-lg shadow-md
                        {{ $loop->index === 1 ? 'simulate-hover' : '' }}">
                <img src="{{ asset('assets/images/' . $sponsor) }}" alt="Sponsor"
                    class="w-full h-full object-cover transition-transform duration-500 ease-in-out transform scale-110 filter blur-sm hover:scale-100 hover:blur-none">
            </div>
        @endforeach

            {{-- Duplicate for infinite scroll --}}
            @foreach ($sponsors as $sponsor)
                <div class="carousel-item w-[200px] aspect-[4/3] flex-shrink-0 overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('assets/images/' . $sponsor) }}" alt="Sponsor Duplicate"
                         class="w-full h-full object-cover transition-transform duration-500 ease-in-out transform scale-110 filter blur-sm hover:scale-100 hover:blur-none">
                </div>
            @endforeach
        </div>
    </div>
</div>
</section>

   <!-- About Us Section -->
   <section class="flex flex-col items-center justify-center fade-in">
       <div class="about-us text-center py-12">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mt-10 mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                About Us
            </h1>
            <div class="w-full flex justify-center overflow-visible mt-10 mb-10">
                <img src="{{ asset('assets/images/textstarlight.png') }}"
                    alt="event logo"
                    class="max-h-[200px] object-contain" />
            </div>

            <h2 class="text-3xl font-bold text-white  mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                What is Starlight?
            </h2>
            <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                Starlight adalah salah satu kegiatan mahasiswa yang dinaungi Badan Eksekutif Mahasiswa (BEM)
                Universitas Multimedia Nusantara untuk mewadahi serta menyalurkan minat dan bakat individu.
                Kegiatan Mahasiswa Starlight mengupayakan dorongan bagi masyarakat untuk percaya akan
                perkembangan bakat mereka masing masing.
            </p>
        </div>
        </section>

<!-- Vision & Mission Section -->
<section class="flex flex-col items-center justify-center fade-in">
    <div class="flex flex-col md:flex-row justify-center items-center gap-8 px-4 py-12">
        <!-- Vision -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center px-4">
            <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                VISION
            </h1>
            <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-md shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                Menciptakan lingkungan Starlight yang positif dan mendukung sehingga
                dapat menjadi tempat bagi panitia dan peserta untuk menggali potensi
                dan mengembangkan diri sebaik mungkin.
            </p>
        </div>

        <!-- Mission -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center px-4">
            <h1 class="text-3xl font-bold text-white mt-10 mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                MISSION
            </h1>
            <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-md shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                Memberikan wadah bagi setiap individu di UMN dan
                di luar UMN yang ingin menunjukan bakat terbaik mereka.
            </p>
        </div>
    </div>
</section>

    <!-- Event Name and Logo -->
    <section class="flex flex-col items-center justify-center fade-in">
    <div class="event text-center py-12">
         <h1 class="text-3xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mt-10 mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                <br>Starlight 2025<br><br>
            </h1>
             <div class="w-full flex justify-center overflow-visible">
                  <img src="{{ asset('assets/images/sl_glow.png') }}"
                    alt="event logo"
                    class="w-[20rem] max-w-none h-auto object-contain" />
            </div>
    </div>
    </section>

   <!-- Concept Section -->
   <section class="flex flex-col items-center justify-center text-center px-4 fade-in">
<div class="flex justify-center  px-4 py-12">
    <div class="w-full md:w-3/4 lg:w-2/3 px-6 text-center flex flex-col items-center justify-center">
        <h3 class="text-2xl font-normal text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            CONCEPT
        </h3>
        <h1 class="text-3xl sm:text-3xl md:text-4xl font-semibold text-white mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            Awaken The Magic Within
        </h1>
        <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            Bakat digambarkan sebagai kristal magis yang terhubung dengan elemen alam dan kekuatan dalam diri.
            Di mana peserta diajak untuk menyadari potensi luar biasa dalam diri mereka dan memperlihatkan "keajaiban" itu kepada dunia.
            Perjalanan peserta layaknya menjelajahi misteri, menemukan harmoni, dan membangkitkan kekuatan sejati mereka.
        </p>
    </div>
</div>
</section>


<!-- Theme & Tagline Section -->
<section class="flex flex-col md:flex-row justify-between items-center gap-8 px-4 py-12 fade-in">
    <!-- Theme -->
    <div class="w-full md:w-1/2 flex flex-col px-6 items-center text-center md:text-left">
        <h3 class="text-2xl font-normal text-white mt-10 mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            THEME
        </h3>
        <h1 class="text-3xl sm:text-3xl md:text-4xl font-semibold text-white mt-2 mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            MYSTICAL CRYSTAL
        </h1>
        <div class="flex-grow flex items-start w-full">
            <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                Mystical Crystal adalah sebuah tempat pencari bakat mistik yang menggambarkan bakat individu
                    dalam diri mereka layaknya kristal. Setiap kristal memiliki potensi unik yang menunggu untuk
                    ditemukan, diasah, dan bersinar terang. Tema ini bertujuan untuk menggali potensi terbaik
                    dari setiap peserta, memberikan mereka kesempatan untuk berkembang, dan memukau dunia dengan keunikan mereka.
            </p>
        </div>
    </div>

    <!-- Tagline -->
    <div class="w-full md:w-1/2 flex flex-col px-6 items-center text-center md:text-right">
        <h3 class="text-2xl font-normal text-white mt-4 mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            TAGLINE
        </h3>
        <h1 class="text-3xl sm:text-3xl md:text-4xl font-semibold text-white mt-2 mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            IGNITE YOUR SPIRIT, SHOW ITS RADIANCE
        </h1>
        <div class="flex-grow flex items-start w-full">
            <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                Tagline ini mengajak setiap orang untuk membangkitkan semangat, potensi,
                dan energi dalam diri mereka. Berani mencoba membuat percikan. Walaupun
                percikan itu kecil, nantinya dari percikan tersebut akan bersinar terang
                dan mereka bisa menunjukkan “terang” tersebut ke dunia.
            </p>
        </div>
    </div>
</section>

 <!-- Sponsored by Section -->
 <section class="flex flex-col items-center justify-center text-center px-4 fade-in">
<div class="flex flex-col justify-center items-center gap-8 px-4 py-12">
    
    <!-- Title & Description -->
    <div class="w-full px-6 flex flex-col items-center justify-center text-center">
        <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            SPONSORED BY
        </h1>
        <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto">
            Berikut adalah sponsor yang mendukung kegiatan Starlight 2025.
        </p>
    </div>

    <!-- Sponsor Logos -->
    <div class="flex flex-wrap justify-center items-center gap-6 mt-6">
        <img src="sponsor1.png" alt="Sponsor 1" class="h-10">
        <img src="sponsor2.png" alt="Sponsor 2" class="h-10">
        <img src="sponsor3.png" alt="Sponsor 3" class="h-10">
        <img src="sponsor4.png" alt="Sponsor 4" class="h-10">
        <img src="sponsor5.png" alt="Sponsor 5" class="h-10">
    </div>
</div>
</section>

    <script>
        let carouselItems = document.querySelectorAll('.carousel-item');
        let index = 0;

        setInterval(() => {
            index = (index + 1) % carouselItems.length;
            carouselItems.forEach((item, i) => {
                item.classList.remove('scale-110', 'blur-sm');
                if (i === index) {
                    item.classList.add('scale-110', 'blur-none');
                }
            });
        }, 3000);

        // JavaScript buat deteksi viewport
        const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
            entry.target.classList.add('show');
            }
        });
        }, {
        threshold: 0.1,
        });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    </script>

    {{-- Footer --}}
    @include('includes.footer')

</div> <!-- Penutup wrapper -->

</body>
</html>
