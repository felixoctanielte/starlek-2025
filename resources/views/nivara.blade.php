<?php
// Stage information for Nivara page
$stage = array(
    'title' => 'nivara',
    'tagline' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', // Placeholder YouTube URL
    'video_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, 
                           nisl eget aliquam ultricies, nunc nisl ultricies nunc, vitae ultricies nisl
                           nisl eget aliquam ultricies. Nullam euismod, nisl eget aliquam ultricies, 
                           nunc nisl ultricies nunc, vitae ultricies nisl nisl eget aliquam ultricies.',
    'gallery_images' => [
        '/images/documentation/nivara/photo1.jpg',
        '/images/documentation/nivara/photo2.jpg',
        '/images/documentation/nivara/photo3.jpg',
        '/images/documentation/nivara/photo4.jpg',
        '/images/documentation/nivara/photo5.jpg',
        '/images/documentation/nivara/photo6.jpg',
        '/images/documentation/nivara/photo7.jpg',
        '/images/documentation/nivara/photo8.jpg',
    ]
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivara Stage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        /* Custom styles for the gallery */
        .gallery-container {
            perspective: 1000px;
        }
        
        .gallery-card {
            transition: all 0.5s ease;
            transform-style: preserve-3d;
        }
        
        .gallery-card:hover {
            transform: translateZ(20px);
            z-index: 10;
        }
        
        .gallery-card.active {
            z-index: 20;
            transform: translateZ(30px) scale(1.05);
        }
        
        /* YouTube aspect ratio container */
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-fixed min-h-screen text-white" style="background-image: url('/images/bg-stage.png')">
    <!-- HEADER / NAVIGATION -->
    <nav class="p-4 bg-transparent-500 text-white flex flex-wrap justify-center gap-6 text-lg">
        <a href="/home" class="hover:underline">Home</a>
        <a href="/division" class="hover:underline">Divisi</a>
        <a href="/stages" class="hover:underline">Stages</a>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-8">
        <!-- Stage Title Section -->
        <section class="mb-12 mt-8 text-center">
            <div class="mx-auto max-w-3xl">
                <img src="/images/<?php echo $stage['title']; ?>.png" 
                     alt="<?php echo ucfirst($stage['title']); ?>"
                     class="mx-auto w-full max-w-lg animate-float">
                
                <h2 class="text-xl md:text-2xl mt-6 italic font-light">
                    <?php echo $stage['tagline']; ?>
                </h2>
            </div>
        </section>
        
        <!-- Video Section -->
        <section class="mb-16">
            <div class="mx-auto max-w-4xl bg-black/30 p-4 md:p-6 rounded-xl backdrop-blur-sm">
                <!-- YouTube Video -->
                <div class="video-container mb-6">
                    <iframe 
                        src="<?php echo $stage['video_url']; ?>"
                        title="<?php echo ucfirst($stage['title']); ?> Video"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                
                <!-- Video Description -->
                <div class="text-lg text-gray-200">
                    <p><?php echo $stage['video_description']; ?></p>
                </div>
            </div>
        </section>
        
        <!-- Gallery Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Documentation Gallery</h2>
            
            <div class="gallery-container">
                <!-- Gallery Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php foreach ($stage['gallery_images'] as $index => $image): ?>
                        <div class="gallery-card rounded-xl overflow-hidden shadow-lg <?php echo $index === 0 ? 'active' : ''; ?>"
                             data-index="<?php echo $index; ?>">
                            <img src="<?php echo $image; ?>" 
                                 alt="Documentation Photo <?php echo $index + 1; ?>"
                                 class="w-full h-64 object-cover cursor-pointer transform transition-all duration-300 hover:scale-105"
                                 onerror="this.src='/api/placeholder/400/300'">
                            
                            <div class="p-4 bg-black/60 backdrop-blur-sm">
                                <h3 class="text-lg font-bold">Photo <?php echo $index + 1; ?></h3>
                                <p class="text-sm text-gray-300">Click to view larger</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Image Preview Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center hidden p-4">
        <div class="max-w-5xl w-full">
            <!-- Close button -->
            <div class="flex justify-end mb-2">
                <button id="closeModal" class="text-white hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Image container -->
            <div class="relative">
                <img id="modalImage" src="" alt="Large preview" class="w-full h-auto max-h-[80vh] object-contain">
                
                <!-- Navigation buttons -->
                <button id="prevImage" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/50 p-2 rounded-r-lg hover:bg-black/70">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextImage" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/50 p-2 rounded-l-lg hover:bg-black/70">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            
            <!-- Caption -->
            <div class="mt-4 text-center text-white">
                <h3 id="modalCaption" class="text-xl font-bold">Jdul (keknya egk ush dh)</h3>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="p-4 bg-white/70 text-center text-sm text-gray-800">
        Footer dsini ngikut yg homepage aj
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Gallery interaction
            const galleryCards = document.querySelectorAll('.gallery-card');
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalCaption = document.getElementById('modalCaption');
            const closeModal = document.getElementById('closeModal');
            const prevImage = document.getElementById('prevImage');
            const nextImage = document.getElementById('nextImage');
            
            let currentImageIndex = 0;
            const images = <?php echo json_encode($stage['gallery_images']); ?>;
            
            // Modal kebuka klo click image
            galleryCards.forEach(card => {
                card.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    openModal(index);
                });
            });
            
            // Close modal
            closeModal.addEventListener('click', function() {
                imageModal.classList.add('hidden');
            });
            
            // klik area luar buat close
            imageModal.addEventListener('click', function(event) {
                if (event.target === imageModal) {
                    imageModal.classList.add('hidden');
                }
            });
            
            // Navigasi antar foto
            prevImage.addEventListener('click', function() {
                navigateImage(-1);
            });
            
            nextImage.addEventListener('click', function() {
                navigateImage(1);
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', function(event) {
                if (imageModal.classList.contains('hidden')) return;
                
                if (event.key === 'Escape') {
                    imageModal.classList.add('hidden');
                } else if (event.key === 'ArrowLeft') {
                    navigateImage(-1);
                } else if (event.key === 'ArrowRight') {
                    navigateImage(1);
                }
            });
            
            function openModal(index) {
                currentImageIndex = index;
                updateModalContent();
                imageModal.classList.remove('hidden');
            }
            
            function navigateImage(direction) {
                currentImageIndex = (currentImageIndex + direction + images.length) % images.length;
                updateModalContent();
            }
            
            function updateModalContent() {
                modalImage.src = images[currentImageIndex];
                modalCaption.textContent = `Photo ${currentImageIndex + 1}`;
                
                galleryCards.forEach(card => {
                    card.classList.remove('active');
                    if (parseInt(card.getAttribute('data-index')) === currentImageIndex) {
                        card.classList.add('active');
                    }
                });
            }
            
            // biar gallery bs di klik
            galleryCards.forEach(card => {
                card.setAttribute('tabindex', '0');
                card.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        const index = parseInt(this.getAttribute('data-index'));
                        openModal(index);
                    }
                });
            });
        });
    </script>
</body>
</html>