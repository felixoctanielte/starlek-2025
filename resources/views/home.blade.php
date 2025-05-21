@include('includes.navbar')

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

    </style>
</head>
<body class="text-white bg-no-repeat bg-cover bg-center" style="background-image: url('assets/images/backgrounds.png');">

<!-- Carousel Stacked Card Style -->
<section class="relative w-full h-[600px] flex items-center justify-center overflow-hidden">
  <div id="carousel-stack" class="relative w-[300px] h-[450px] cursor-pointer">

    <!-- Card Template (3 Cards) -->
    <div class="carousel-card absolute top-0 left-[-160px] w-[250px] h-[375px] rounded-2xl border border-cyan-200/30 bg-white/5 backdrop-blur-md
                shadow-xl rotate-[-5deg] z-10 transition-all duration-700 opacity-60 scale-[0.95]">
      <img src="{{ asset('assets/images/card1.jpeg') }}" class="w-full h-full object-cover rounded-2xl" />
    </div>

    <div class="carousel-card absolute top-0 left-0 w-[300px] h-[450px] rounded-2xl border-2 border-cyan-300 bg-white/10 backdrop-blur-md
                shadow-2xl z-30 transition-all duration-700 scale-100">
      <img src="{{ asset('assets/images/card2.jpeg') }}" class="w-full h-full object-cover rounded-2xl" />
      <div class="absolute inset-0 bg-gradient-to-br from-white/10 via-cyan-100/10 to-white/0 pointer-events-none"></div>
    </div>

    <div class="carousel-card absolute top-0 right-[-160px] w-[250px] h-[375px] rounded-2xl border border-cyan-200/30 bg-white/5 backdrop-blur-md
                shadow-xl rotate-[5deg] z-10 transition-all duration-700 opacity-60 scale-[0.95]">
      <img src="{{ asset('assets/images/card3.jpeg') }}" class="w-full h-full object-cover rounded-2xl" />
    </div>

  </div>
</section>

<!-- Carousel Animation -->
<script>
  const carousel = document.getElementById('carousel-stack');
  let cards = Array.from(carousel.querySelectorAll('.carousel-card'));

  const resetClasses = (card) => {
    card.classList.remove(
      'left-0', 'left-[-160px]', 'right-[-160px]',
      'rotate-[-5deg]', 'rotate-[5deg]',
      'scale-100', 'scale-[0.95]',
      'opacity-60',
      'z-30', 'z-20', 'z-10'
    );
  };

  function rotateCards() {
    const first = cards.shift(); // geser depan ke belakang
    cards.push(first);

    cards.forEach((card, index) => {
      resetClasses(card); // hapus semua class positioning lama

      // Set ulang posisi dan gaya sesuai urutan
      if (index === 0) {
        card.classList.add(
          'absolute', 'top-0', 'left-[-160px]',
          'w-[250px]', 'h-[375px]',
          'rotate-[-5deg]', 'scale-[0.95]', 'opacity-60', 'z-10'
        );
      } else if (index === 1) {
        card.classList.add(
          'absolute', 'top-0', 'left-0',
          'w-[300px]', 'h-[450px]',
          'scale-100', 'z-30'
        );
      } else if (index === 2) {
        card.classList.add(
          'absolute', 'top-0', 'right-[-160px]',
          'w-[250px]', 'h-[375px]',
          'rotate-[5deg]', 'scale-[0.95]', 'opacity-60', 'z-10'
        );
      }
    });
  }

  // Auto-rotate
  let autoRotate = setInterval(rotateCards, 3000);

  // Click buat rotate manual
  carousel.addEventListener('click', () => {
    rotateCards();
    clearInterval(autoRotate);
    autoRotate = setInterval(rotateCards, 3000);
  });
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
   <section class="flex flex-col items-center justify-center fade-in">
       <div class="about-us text-center py-12">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-2 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                    About Us
                </h1>
                <div class="w-full flex justify-center overflow-visible mt-20 mb-10 ">
                    <img src="{{ asset('assets/images/textstarlight.png') }}"
                        alt="event logo"
                        class="max-h-[200px]  object-contain" />
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
         <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
                <br>  Starlight 2025 <br><br>
            </h1>
             <div class="w-full flex justify-center overflow-visible">
                  <img src="{{ asset('assets/images/sl_glow.png') }}"
                    alt="event logo"
                     class="w-[30rem] max-w-none h-auto object-contain" />
            </div>
    </div>

    </div>

   <!-- Concept Section -->
   <section class="flex flex-col items-center justify-center text-center px-4 fade-in">
<div class="flex justify-center  px-4 py-12">
    <div class="w-full md:w-3/4 lg:w-2/3 px-6 text-center flex flex-col items-center justify-center">
        <h1 class="text-3xl font-bold text-white mb-4 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">CONCEPT</h1>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            Awaken The Magic Within
        </h1>
        <p class="text-lg font-normal font-sans text-slate-200 mt-4 max-w-3xl mx-auto shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)]">
            Bakat digambarkan sebagai kristal magis yang terhubung dengan elemen alam dan kekuatan dalam diri.
            Di mana peserta diajak untuk menyadari potensi luar biasa dalam diri mereka dan memperlihatkan "keajaiban" itu kepada dunia.
            Perjalanan peserta layaknya menjelajahi misteri, menemukan harmoni, dan membangkitkan kekuatan sejati mereka.
        </p>
    </div>
</div>



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