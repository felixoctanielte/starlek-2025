<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="navbar">
        <!-- Logo -->
        <div class="navbar-logo">
            <a href="{{ route('home') }}">🌟 Starlight 25</a>
        </div>

        <!-- Menu -->
        <ul class="menu">
            <li><a href="{{ route('home') }}" class="menu-item">Homepage</a></li>
            <li><a href="{{ route('division') }}" class="menu-item">Division</a></li>
            <li><a href="{{ route('register') }}" class="menu-item">Registration</a></li>
            <li><a href="{{ route('mini-gerda') }}" class="menu-item">Mini Gerda</a></li>
            <li><a href="{{ route('faq') }}" class="menu-item">FAQ</a></li>
        </ul>

        <!-- Carousel Section -->
        <div class="carousel-section">
            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-item"></div>
                    <div class="carousel-item"></div>
                    <div class="carousel-item"></div>
                    <div class="carousel-item"></div>
                </div>
            </div>
        </div>

        <!-- About Us Section -->
        <div class="about-us">
            <h1 class="section-title">About Us</h1>
            <div class="about-us-logo">
                <img src="logo.png" alt="Logo" class="about-us-logo">
            </div>
            <h2 class="section-title">What is Starlight?</h2>
            <p class="about-us-desc">Starlight adalah salah satu kegiatan mahasiswa yang dinaungi Badan Eksekutif Mahasiswa (BEM)
                Universitas Multimedia Nusantara untuk mewadahi serta menyalurkan minat dan bakat individu.
                Kegiatan Mahasiswa Starlight mengupayakan dorongan bagi masyarakat
                untuk percaya akan perkembangan bakat mereka masing masing</p>
        </div>

        <!-- Visi Misi Section -->
        <div class="visi-misi">
            <div class="visi">
                <h2 class="section-title">Vision</h2>
                <p class="section-desc">Menciptakan lingkungan Starlight yang positif dan mendukung
                    sehingga dapat menjadi tempat bagi panitia dan peserta
                    untuk menggal potensi dan mengembangkan diri  sebaik mungkin.</p>
            </div>
            <div class="misi">
                <h2 class="section-title">Mision</h2>
                <p class="section-desc">Memberikan wadah bagi setiap individu di UMN
                    dan diluar UMN yang ingin menampilkan bakat terbaik mereka.</p>
            </div>
        </div>

            <!-- Event Name and Logo -->
        <div class="event">
            <h1 class="section-title">Starlight 2025</h1>
            <div class="event-logo">
                <img src="event-logo.png" alt="Event Logo" class="event-logo-img">
            </div>
        </div>

        <!-- Concept Section -->
        <div class="concept">
            <h2 class="section-subtitle">Concept</h2>
            <h1 class="concept-title">Concept Name</h1>
            <p class="concept-desc">This is the description of the concept...</p>
        </div>

        <!-- Theme Section -->
        <div class="theme">
            <h2 class="section-subtitle">Theme</h2>
            <h1 class="theme-title">Theme Name</h1>
            <p class="theme-desc">This is the description of the theme...</p>
        </div>

        <!-- Tagline Section -->
        <div class="tagline">
            <h2 class="section-subtitle">Tagline</h2>
            <h1 class="tagline-title">Tagline Text</h1>
            <p class="tagline-desc">This is the description of the tagline...</p>
        </div>

        <!-- Sponsored by Section -->
        <div class="sponsored">
            <h2 class="sponsored-title">Sponsored by</h2>
            <div class="sponsor-logos">
                <img src="sponsor1.png" alt="Sponsor 1" class="sponsor-logo">
                <img src="sponsor2.png" alt="Sponsor 2" class="sponsor-logo">
                <img src="sponsor3.png" alt="Sponsor 3" class="sponsor-logo">
                <img src="sponsor4.png" alt="Sponsor 4" class="sponsor-logo">
                <img src="sponsor5.png" alt="Sponsor 5" class="sponsor-logo">
                <!-- Add more sponsor logos -->
            </div>
        </div>

    </nav>
</body>
</html>