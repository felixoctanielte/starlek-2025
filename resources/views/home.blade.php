@include('includes.navbar')

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

    </style>
</head>
<body class="text-white bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('assets/images/backgrounds.png') }}')">
<div>
<!-- Sponsored by Section -->
<div class="relative w-full h-[700px] overflow-hidden bg-center bg-cover">

    <!-- Dynamic Blur Background -->
    <div id="dynamic-bg"
        class="absolute inset-0 bg-center bg-cover blur-lg transition-all duration-500 z-0"
        style="background-image: url('{{ asset('images/profile1.jpg') }}');">
    </div>

    <!-- Overlay Content Full Height -->
    <div class="relative z-10 h-full flex flex-col items-center justify-center px-4 pt-12">

        <!-- Cards Carousel -->
        <div class="flex justify-center items-center space-x-[-90px] hover:space-x-4 transition-all duration-500">

            <!-- Kartu 1 -->
            <div class="relative w-44 h-60 rounded-xl shadow-xl overflow-hidden transform rotate-[-15deg] hover:rotate-0 transition-all duration-500 group"
                onmouseenter="changeBG('{{ asset('images/profile1.jpg') }}')">
                <img src="{{ asset('images/profile1.jpg') }}" alt="Foto 1" class="object-cover w-full h-full">
            </div>

             <!-- Kartu 2 -->
            <div class="relative w-44 h-60 rounded-xl shadow-xl overflow-hidden transform rotate-[5deg] hover:rotate-0 transition-all duration-500 group z-10"
                onmouseenter="changeBG('{{ asset('images/bg1.jpg') }}')">
                <img src="{{ asset('images/bg1.jpg') }}" alt="Foto 2" class="object-cover w-full h-full">
            </div>


            <!-- Kartu 3 -->
            <div class="relative w-44 h-60 rounded-xl shadow-xl overflow-hidden transform rotate-[25deg] hover:rotate-0 transition-all duration-500 group"
                onmouseenter="changeBG('{{ asset('images/lindworm.png') }}')">
                <img src="{{ asset('images/lindworm.png') }}" alt="Foto 3" class="object-cover w-full h-full">
            </div>
        </div>
        <!-- End Cards Carousel -->

    </div>
</div>
<!-- JS Background Changer -->
<script>
    function changeBG(url) {
        const bg = document.getElementById('dynamic-bg');
        bg.style.backgroundImage = `url('${url}')`;
    }
</script>



<style>
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }

    .animate-marquee {
        animation: marquee 30s linear infinite;
    }

    
</style>


   <!-- About Us Section -->
       <div class="about-us text-center py-12">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                    About Us
                </h1>
                <div class="w-full flex justify-center overflow-visible mt-20 mb-10 ">
                    <img src="{{ asset('assets/images/textstarlight.png') }}"
                        alt="event logo"
                        class="max-h-[200px]  object-contain" />
                </div>
            

            <h2 class="text-3xl font-bold text-white  mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">What is Starlight?</h2>
            <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">Starlight adalah salah satu kegiatan mahasiswa yang dinaungi Badan Eksekutif Mahasiswa (BEM) 
    Universitas Multimedia Nusantara untuk mewadahi serta menyalurkan minat dan bakat individu. 
    Kegiatan Mahasiswa Starlight mengupayakan dorongan bagi masyarakat untuk percaya akan 
    perkembangan bakat mereka masing masing.</p>
        </div>
   <!-- End About Us Section -->
   
    
    <!-- Visi Misi Section -->
    <div class="flex flex-col md:flex-row justify-center items-start gap-8 px-4 py-12">
        <!-- Vision -->
        <div class="visi w-full md:w-1/2 px-6 flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold text-white  mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">VISION</h1>
            <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
                Menciptakan lingkungan Starlight yang positif dan mendukung sehingga dapat menjadi tempat bagi panitia dan peserta untuk menggali potensi dan mengembangkan diri sebaik mungkin.
            </p>
        </div>

        <!-- Mission -->
        <div class="misi w-full md:w-1/2 px-6 mt-8 md:mt-0 flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">MISSION</h1>
            <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
                Memberikan wadah bagi setiap individu di UMN dan diluar UMN yang ingin menunjukan bakat terbaik mereka.
            </p>
        </div>
    </div>
    <!-- End Visi Misi Section -->
            


    <!-- Event Name and Logo -->
    <div class="event text-center py-12">
         <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                <br>  Starlight 2025 <br><br>
            </h1>
             <div class="w-full flex justify-center overflow-visible">
                  <img src="{{ asset('assets/images/sl_glow.png') }}"
                    alt="event logo"
                     class="w-[30rem] max-w-none h-auto object-contain" />
            </div>
    </div>
    <!-- End Event Name and Logo -->
    </div>

   <!-- Concept Section -->
<div class="flex justify-center  px-4 py-12">
    <div class="w-full md:w-3/4 lg:w-2/3 px-6 text-center flex flex-col items-center justify-center">
        <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">CONCEPT</h1>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            Awaken The Magic Within
        </h2>
        <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
            Bakat digambarkan sebagai kristal magis yang terhubung dengan elemen alam dan kekuatan dalam diri.
            Di mana peserta diajak untuk menyadari potensi luar biasa dalam diri mereka dan memperlihatkan "keajaiban" itu kepada dunia.
            Perjalanan peserta layaknya menjelajahi misteri, menemukan harmoni, dan membangkitkan kekuatan sejati mereka.
        </p>
    </div>
</div>
    <!-- End Concept Section -->


    <!-- Theme & Tagline Section -->
    <div class="flex flex-col md:flex-row justify-center items-stretch gap-8 px-4 py-12">
        <!-- Theme -->
        <div class="w-full md:w-1/2 flex flex-col px-6 items-center text-center">
            <h1 class="text-3xl font-bold text-white  mt-4 mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">THEME</h1>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white  mt-2 mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                MYSTICAL CRYSTAL
            </h2>
            <div class="flex-grow flex items-start w-full">
                <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
                    Mystical Crystal adalah sebuah tempat pencari bakat mistik yang menggambarkan bakat individu dalam diri mereka layaknya kristal.
                    Setiap kristal memiliki potensi unik yang menunggu untuk ditemukan, diasah, dan bersinar terang.
                    Tema ini bertujuan untuk menggali potensi terbaik dari setiap peserta, memberikan mereka kesempatan untuk berkembang, dan memukau dunia dengan keunikan mereka.
                </p>
            </div>
        </div>

        <!-- Tagline -->
        <div class="w-full md:w-1/2 flex flex-col px-6 items-center text-center">
            <h1 class="text-3xl font-bold text-white  mt-4 mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">TAGLINE</h1>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white mt-2 mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                IGNITE YOUR SPIRIT, SHOW ITS RADIANCE
            </h2>
            <div class="flex-grow flex items-start w-full">
                <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
                    Tagline ini mengajak setiap orang untuk membangkitkan semangat, potensi, dan energi dalam diri mereka. Berani mencoba membuat percikan. Walaupun percikan itu kecil, nantinya dari percikan tersebut akan bersinar terang dan mereka bisa menunjukkan “terang” tersebut ke dunia.
                </p>
            </div>
        </div>
    </div>
    <!-- End Theme & Tagline Section -->






 <!-- Sponsored by Section -->
<div class="flex flex-col justify-center items-center gap-8 px-4 py-12">
    
    <!-- Title & Description -->
    <div class="w-full px-6 flex flex-col items-center justify-center text-center">
        <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            SPONSORED BY
        </h1>
        <p class="text-lg font-[Lato] text-slate-200 mt-4 max-w-3xl mx-auto">
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
 <!-- End Sponsored by Section -->


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
    </script>

    {{-- Footer --}}
    @include('includes.footer')

</div> <!-- Penutup wrapper -->

</body>
</html>