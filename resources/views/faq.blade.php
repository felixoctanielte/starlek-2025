@include('includes.navbar')

<!DOCTYPE html>
<html lang="en" x-data>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Starlight 2025 faq</title>
  @vite('resources/css/app.css')

  <!-- Link Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">

  <style>
    .mystical-font {
      font-family: 'Cinzel Decorative', serif !important;
      font-weight: 700 !important;
      text-transform: uppercase !important;
      text-shadow: 0 0 8px rgba(173, 216, 230, 0.7), 0 0 16px rgba(135, 206, 250, 0.8);
      letter-spacing: 1px;
    }

    .question-font {
      font-family: serif;
    }

    /* Animasi masuk halaman */
    .page-enter {
      opacity: 0;
      transform: scale(0.95);
    }
    .page-enter-active {
      opacity: 1;
      transform: scale(1);
      transition: all 1s ease;
    }

    /* Animasi buka-tutup FAQ */
    .faq-answer {
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      transition: max-height 0.5s ease, opacity 0.5s ease;
    }
    .faq-answer.open {
      max-height: 1000px; /* cukup besar untuk semua konten */
      opacity: 1;
    }
  </style>
</head>
<body class="bg-no-repeat bg-cover min-h-screen text-white" style="background-image: url('{{ asset('assets/images/bg_panjaang.png') }}'); background-attachment: fixed;">

<style>
  @media (max-width: 640px) {
    body {
      background-size: auto;
      background-repeat: no-repeat;
      background-position: top center;
    }
  }
</style>


  
  <div x-init="$el.classList.add('page-enter'); setTimeout(() => $el.classList.add('page-enter-active'), 50)"
       class="flex flex-col items-center justify-center py-10 px-4 pt-24">

    <!-- Judul -->
     
<h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-6 mystical-font shimmer drop-shadow-[0_0_20px_rgba(0,255,255,0.8)] text-center">
  <br>Frequently Asked Questions<br><br>
</h1>


    <!-- Section FAQ -->
    <div class="bg-white/10 backdrop-blur-md w-full max-w-4xl p-6 rounded-lg shadow-2xl ring-1 ring-cyan-300/40">
      @php
        $faqs = [
          [
            'question' => 'DIMANA LOKASI AUDISI LANGSUNG BERLANGSUNG?',
            'answer' => 'Audisi langsung akan dilaksanakan di rumah orang random, pantengin aja bisa jadi rumah kamu yang jadi Tempat audisi.',
          ],
          [
            'question' => 'BAGAIMANA CARA MENDAFTAR SEBAGAI PESERTA STARLIGHT UMN 2025?',
            'answer' => '<ol class="list-decimal list-inside space-y-1">
                          <li>Buka website resmi Starlight UMN 2025 di www.starlight.umn.ac.id atau klik link di Bio Instagram resmi @starlightumn</li>
                          <li>Mengisi formulir, lalu persiapkan diri kamu untuk mengikuti audisi Starlight UMN 2025</li>
                          <li>Jangan lupa untuk selalu pantengin media sosial Starlight UMN 2025 untuk mengetahui jadwal tahap berikutnya!</li>
                        </ol>',
          ],
          [
            'question' => 'APA KRITERIA DAN SYARAT MENDAFTAR SEBAGAI PESERTA STARLIGHT UMN 2025?',
            'answer' => '<ul class="list-disc list-inside space-y-1">
                          <li>Peserta harus berumur 15+ pada saat mendaftarkan diri atau kelompok</li>
                          <li>Peserta belum pernah mendapatkan gelar dalam kategori apapun (seperti juara 1, 2, 3, favorit, dll) di acara STARLIGHT sebelumnya</li>
                          <li>Peserta mengumpulkan video audisi sesuai deadline dan kriteria yang ditentukan</li>
                        </ul>',
          ],
          [
            'question' => 'APAKAH PENDAFTARAN STARLIGHT UMN 2025 DIPUNGUT BIAYA?',
            'answer' => 'Pendaftaran Starlight sebagai individu maupun kelompok akan dipungut biaya sebesar Rpxx.xxx,xx selama masa pre-sale, dan harga normal sebesar Rpxxx.xx.xx',
          ],
          [
            'question' => 'ADA BERAPA BABAK DI STARLIGHT UMN 2025?',
            'answer' => 'Starlight memiliki 3 babak yang akan diselenggarakan secara offline, mulai dari panggung tertutup sampai ke panggung terbuka dengan audiens yang bertambah setiap babaknya.',
          ],
          [
            'question' => 'APA SAJA KATEGORI YANG DILOMBAKAN?',
            'answer' => '<ul class="list-disc list-inside space-y-1">
                          <li>Makan Kerupuk</li>
                          <li>Memasukkan Paku ke dalam botol</li>
                          <li>Panjat Pinang</li>
                          <li>Lari Karung pakai helm</li>
                          <li>Dan kategori spesial lainnya!</li>
                        </ul>',
          ],
          [
            'question' => 'BAGAIMANA JIKA ADA KENDALA SAAT MENDAFTAR?',
            'answer' => 'Silakan hubungi panitia melalui Instagram @starlightumn.',
          ],
          [
            'question' => 'BISAKAH PESERTA DARI LUAR UMN IKUT SERTA?',
            'answer' => 'Ya, peserta dari luar UMN juga diperbolehkan mengikuti audisi asalkan memenuhi kriteria usia.',
          ],
          [
            'question' => 'APA SAJA YANG HARUS DIBAWA SAAT BABAK AUDISI LANGSUNG?',
            'answer' => 'Peserta wajib membawa kartu identitas, bukti pendaftaran, dan peralatan penunjang sesuai kategori lomba.',
          ],
          [
            'question' => 'BAGAIMANA CARA MENDAPATKAN INFORMASI TERKINI TENTANG STARLIGHT?',
            'answer' => 'Ikuti Instagram resmi kami di @starlightumn dan pantau website kami secara berkala untuk update terbaru.',
          ],
          [
            'question' => 'APA HADIAH UNTUK PEMENANG STARLIGHT UMN 2025?',
            'answer' => 'Hadiah menarik termasuk uang tunai, sertifikat, dan kesempatan tampil di acara besar berikutnya!',
          ],
          [
            'question' => 'APA ITU STARLIGHT UMN?',
            'answer' => 'Starlight UMN adalah ajang pencarian bakat tahunan yang diselenggarakan oleh Universitas Multimedia Nusantara.',
          ],
          [
            'question' => 'KAPAN PENDAFTARAN DIBUKA DAN DITUTUP?',
            'answer' => 'Pendaftaran dibuka mulai 1 Mei hingga 31 Mei 2025. Jangan sampai ketinggalan!',
          ],
        ];
      @endphp

      @foreach($faqs as $faq)
<div x-data="{ open: false }" class="mb-1 border border-cyan-400 rounded-lg overflow-hidden transition-all duration-700 ease-in-out">



          <button @click="open = !open"
                  class="w-full text-left px-4 py-3 font-semibold question-font text-cyan-200 bg-white/10 hover:bg-white/20 focus:outline-none transition-all duration-300 ease-in-out">
            {{ $faq['question'] }}
          </button>
<div x-ref="answer"
     :class="open ? 'faq-answer open' : 'faq-answer'"
     class="p-4 text-white bg-white/10 rounded-b-lg font-normal"
     style="font-family: 'ABeeZee', sans-serif;">


            {!! $faq['answer'] !!}
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Alpine.js -->
  <script src="//unpkg.com/alpinejs" defer></script>

  {{-- Footer --}}
  @include('includes.footer')
</body>
</html>
