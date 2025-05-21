@include('includes.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'shake': 'shake 0.5s ease',
                        'shake-slow': 'shake 0.8s ease infinite',
                        'ping': 'ping 1s cubic-bezier(0, 0, 0.2, 1) infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'fade-out': 'fadeOut 1s ease forwards',
                        'fly-up': 'flyUp 1s ease forwards',
                        'scale-in': 'scaleIn 0.5s ease forwards',
                        'scale-out': 'scaleOut 0.5s ease forwards',
                        'pulse-bright': 'pulseBright 2s ease infinite',
                    },
                    keyframes: {
                        shake: {
                            '0%, 100%': { transform: 'translateX(0) rotate(0deg)' },
                            '20%': { transform: 'translateX(-5px) rotate(-2deg)' },
                            '40%': { transform: 'translateX(5px) rotate(2deg)' },
                            '60%': { transform: 'translateX(-5px) rotate(-1deg)' },
                            '80%': { transform: 'translateX(5px) rotate(1deg)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeOut: {
                            '0%': { opacity: '1' },
                            '100%': { opacity: '0', visibility: 'hidden' },
                        },
                        flyUp: {
                            '0%': { transform: 'translateY(0) scale(1)', opacity: '1' },
                            '100%': { transform: 'translateY(-30px) scale(1.2)', opacity: '0' },
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        scaleOut: {
                            '0%': { transform: 'scale(1)', opacity: '1' },
                            '100%': { transform: 'scale(1.5)', opacity: '0' },
                        },
                        ping: {
                            '75%, 100%': { transform: 'scale(2)', opacity: '0' },
                        },
                        pulseBright: {
                            '0%, 100%': { filter: 'brightness(1)' },
                            '50%': { filter: 'brightness(1.3)' },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        /* CSS buat animasi gembok & chain */
        .card-container {
            perspective: 1000px;
        }
        
        .stage-card {
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }
        
        .stage-card.locked:hover {
            transform: scale(1.05) translateZ(20px);
        }
        
        .stage-card.unlocked:hover {
            transform: scale(1.05) translateZ(20px);
        }
        
        .title-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
            transform-origin: center;
        }
        
        .chain-image {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 10;
            object-fit: contain;
            transition: all 0.3s ease;
        }
        
        .lock-image {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 20;
            object-fit: contain;
            transition: all 0.3s ease;
        }
        
        .unlock-effect {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
            z-index: 25;
            opacity: 0;
            pointer-events: none;
        }
        
        .unlocking .unlock-effect {
            animation: scaleIn 0.2s ease-out forwards, scaleOut 1s ease-in 0.4s forwards;
        }
        
        .chain-image.crack, .lock-image.crack {
            opacity: 0;
        }
        
        .shake-animation {
            animation: shake 0.5s ease;
        }
        
        .fade-out-animation {
            animation: fadeOut 1s ease forwards;
        }
        
        .fly-up-animation {
            animation: flyUp 1s ease forwards;
        }
        
        /* Audio controls */
        .audio-controls {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            align-items: center;
            background: rgba(0,0,0,0.5);
            padding: 8px 12px;
            border-radius: 50px;
            gap: 8px;
        }
        
        .audio-controls button {
            background: none;
            border: none;
            cursor: pointer;
            color: white;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .audio-controls button:hover {
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>


<?php
// Calculate timestamp buat buka stage
$unlockPreEvent = strtotime('2025-05-15 10:00:00'); // Pre-event unlocked
$unlockStage1 = strtotime('2025-05-15 10:00:00'); // Stage 1 unlocked buat testing dlu
$unlockStage2 = strtotime('2025-06-22 10:00:00'); // recent unlock buat tes animasi
$unlockStage3 = strtotime('2025-06-25 10:00:00'); // locked
$now = time();

$isPreEventUnlocked = $now >= $unlockPreEvent;
$isStage1Unlocked = $now >= $unlockStage1;
$isStage2Unlocked = $now >= $unlockStage2;
$isStage3Unlocked = $now >= $unlockStage3;

// cek stagenya baru di unlock/udh lama (24 jam trkhir)
// mastiin tiap unlock ada animasi
$justUnlockedPreEvent = $now - $unlockPreEvent < 86400 && $now >= $unlockPreEvent;
$justUnlockedStage1 = $now - $unlockStage1 < 86400 && $now >= $unlockStage1;
$justUnlockedStage2 = $now - $unlockStage2 < 86400 && $now >= $unlockStage2;
$justUnlockedStage3 = $now - $unlockStage3 < 86400 && $now >= $unlockStage3;

// Pre-event stage
$preEvent = array(
    'title_unlocked' => 'luminous_crystal',
    'title_locked' => 'luminous_crystal_locked',
    'chain' => 'luminous_crystal_chain',
    'lock' => 'luminous_crystal_lock',
    'chain_crack' => 'luminous_crystal_chain_crack',
    'lock_crack' => 'luminous_crystal_lock_crack',
    'unlocked' => $isPreEventUnlocked, 
    'just' => $justUnlockedPreEvent, 
    'link' => '/luminous-crystal'
);

// Main stages
$stages = array(
    array(
        'title_unlocked' => 'nivara',
        'title_locked' => 'nivara_locked',
        'chain' => 'nivara_chain',
        'lock' => 'nivara_lock',
        'chain_crack' => 'nivara_chain_crack',
        'lock_crack' => 'nivara_lock_crack',
        'unlocked' => $isStage1Unlocked, 
        'just' => $justUnlockedStage1, 
        'link' => '/stages/nivara'
    ),
    array(
        'title_unlocked' => 'lumora',
        'title_locked' => 'lumora_locked',
        'chain' => 'lumora_chain',
        'lock' => 'lumora_lock',
        'chain_crack' => 'lumora_chain_crack',
        'lock_crack' => 'lumora_lock_crack',
        'unlocked' => $isStage2Unlocked, 
        'just' => $justUnlockedStage2, 
        'link' => '/lumora'
    ),
    array(
        'title_unlocked' => 'ascendance',
        'title_locked' => 'ascendance_locked',
        'chain' => 'ascendance_chain',
        'lock' => 'ascendance_lock',
        'chain_crack' => 'ascendance_chain_crack',
        'lock_crack' => 'ascendance_lock_crack',
        'unlocked' => $isStage3Unlocked, 
        'just' => $justUnlockedStage3, 
        'link' => '/ascendance'
    ),
);

    // buat trigger sound tiap unlock
    $hasNewlyUnlockedStage = $justUnlockedPreEvent || $justUnlockedStage1 || $justUnlockedStage2 || $justUnlockedStage3;
    ?>
<body class="text-white bg-no-repeat bg-cover bg-center" style="background-image: url('assets/images/backgrounds.png');">
    
    <!-- Audio controls -->
    <div class="audio-controls">
        <button id="toggleSound" title="Toggle Sound">
            <svg id="soundOnIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
            </svg>
            <svg id="soundOffIcon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                <line x1="23" y1="9" x2="17" y2="15"></line>
                <line x1="17" y1="9" x2="23" y2="15"></line>
            </svg>
        </button>
    </div>


    <!-- PRE-EVENT SECTION -->
    <section class="container mx-auto px-4 mb-20 mt-20">
        <h2 class="text-3xl md:text-4xl font-bold text-white drop-shadow-lg text-center mb-6">
            Pre-Event
        </h2>
        
        <div class="flex justify-center">
            <div class="card-container w-full max-w-md h-60">
                <div class="stage-card w-full h-full rounded-xl overflow-hidden relative
                    <?php echo $preEvent['unlocked'] ? 'unlocked' : 'locked'; ?>
                    <?php echo $preEvent['just'] ? 'unlocking' : ''; ?>">
                    
                    <a href="<?php echo $preEvent['unlocked'] ? $preEvent['link'] : '#'; ?>" 
                       <?php if(!$preEvent['unlocked']): ?> onclick="return false;" <?php endif; ?> 
                       class="block w-full h-full relative group">
                        
                        <!-- Title image -->
                        <img src="/images/<?php echo $preEvent['unlocked'] ? $preEvent['title_unlocked'] : $preEvent['title_locked']; ?>.png" 
                             alt="Luminous Crystal" 
                             class="title-image <?php echo !$preEvent['unlocked'] ? 'group-hover:animate-shake' : 'group-hover:scale-110'; ?> transition-all duration-500">
                        
                        <!-- Chain image -->
                        <?php if(!$preEvent['unlocked']): ?>
                            <img src="/images/<?php echo $preEvent['chain']; ?>.png" 
                                 alt="Chain" 
                                 class="chain-image original group-hover:animate-shake">
                        <?php elseif($preEvent['just']): ?>
                            <img src="/images/<?php echo $preEvent['chain']; ?>.png" 
                                 alt="Chain" 
                                 class="chain-image original">
                                 
                            <img src="/images/<?php echo $preEvent['chain_crack']; ?>.png" 
                                 alt="Chain Crack" 
                                 class="chain-image crack hidden">
                        <?php endif; ?>
                        
                        <!-- Lock image -->
                        <?php if(!$preEvent['unlocked']): ?>
                            <img src="/images/<?php echo $preEvent['lock']; ?>.png" 
                                 alt="Lock" 
                                 class="lock-image original group-hover:animate-shake">
                        <?php elseif($preEvent['just']): ?>
                            <img src="/images/<?php echo $preEvent['lock']; ?>.png" 
                                 alt="Lock" 
                                 class="lock-image original">
                                 
                            <img src="/images/<?php echo $preEvent['lock_crack']; ?>.png" 
                                 alt="Lock Crack" 
                                 class="lock-image crack hidden">
                        <?php endif; ?>
                        
                        <!-- Unlock effect for animation -->
                        <?php if($preEvent['just']): ?>
                            <div class="unlock-effect"></div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Separator 
    <div class="container mx-auto px-4">
        <hr class="border-white/20 mb-16">
    </div> -->

    <!-- MAIN STAGES SECTION -->
    <section class="container mx-auto px-4 mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white drop-shadow-lg text-center mb-6">
            Main Stages
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($stages as $index => $stage): ?>
                <div class="flex justify-center">
                    <div class="card-container w-full max-w-sm h-56">
                        <div class="stage-card w-full h-full rounded-xl overflow-hidden relative
                            <?php echo $stage['unlocked'] ? 'unlocked' : 'locked'; ?>
                            <?php echo $stage['just'] ? 'unlocking' : ''; ?>">
                            
                            <a href="<?php echo $stage['unlocked'] ? $stage['link'] : '#'; ?>" 
                               <?php if(!$stage['unlocked']): ?> onclick="return false;" <?php endif; ?> 
                               class="block w-full h-full relative group">
                                
                                <!-- Title image -->
                                <img src="/images/<?php echo $stage['unlocked'] ? $stage['title_unlocked'] : $stage['title_locked']; ?>.png" 
                                     alt="<?php echo ucfirst($stage['title_unlocked']); ?>" 
                                     class="title-image <?php echo !$stage['unlocked'] ? 'group-hover:animate-shake' : 'group-hover:scale-110'; ?> transition-all duration-500">
                                
                                <!-- Chain image -->
                                <?php if(!$stage['unlocked']): ?>
                                    <img src="/images/<?php echo $stage['chain']; ?>.png" 
                                         alt="Chain" 
                                         class="chain-image original group-hover:animate-shake">
                                <?php elseif($stage['just']): ?>
                                    <img src="/images/<?php echo $stage['chain']; ?>.png" 
                                         alt="Chain" 
                                         class="chain-image original">
                                         
                                    <img src="/images/<?php echo $stage['chain_crack']; ?>.png" 
                                         alt="Chain Crack" 
                                         class="chain-image crack hidden">
                                <?php endif; ?>
                                
                                <!-- Lock image -->
                                <?php if(!$stage['unlocked']): ?>
                                    <img src="/images/<?php echo $stage['lock']; ?>.png" 
                                         alt="Lock" 
                                         class="lock-image original group-hover:animate-shake">
                                <?php elseif($stage['just']): ?>
                                    <img src="/images/<?php echo $stage['lock']; ?>.png" 
                                         alt="Lock" 
                                         class="lock-image original">
                                         
                                    <img src="/images/<?php echo $stage['lock_crack']; ?>.png" 
                                         alt="Lock Crack" 
                                         class="lock-image crack hidden">
                                <?php endif; ?>
                                
                                <!-- Unlock effect for animation -->
                                <?php if($stage['just']): ?>
                                    <div class="unlock-effect"></div>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

  

    <script>
        // Sound settings
        let soundEnabled = true;
        let hasPlayedSound = false;
        
        let lastHoverSoundTime = 0;
        
        // Play sound function
        function playSound(audioId, options = {}) {
            if (!soundEnabled) return;
            
            const audioElement = document.getElementById(audioId);
            if (!audioElement) return;
            
            // Set default
            const defaults = {
                volume: 1.0,
                loop: false,
                reset: true
            };
            
            const settings = {...defaults, ...options};
            
            audioElement.volume = settings.volume;
            audioElement.loop = settings.loop;
            
            if (settings.reset) {
                audioElement.currentTime = 0;
            }
            
            try {
                const playPromise = audioElement.play();
                
                if (playPromise !== undefined) {
                    playPromise.catch(error => {
                        console.error("Audio play failed:", error);
                    });
                }
            } catch (e) {
                console.error("Error playing audio:", e);
            }
        }
        
        // Toggle sound
        function toggleSound() {
            soundEnabled = !soundEnabled;
            
            // Update icon
            document.getElementById('soundOnIcon').classList.toggle('hidden', !soundEnabled);
            document.getElementById('soundOffIcon').classList.toggle('hidden', soundEnabled);
            
            if (!soundEnabled) {
                const audioElements = document.querySelectorAll('audio');
                audioElements.forEach(audio => audio.pause());
            }
        }
        
        // Unlock animation
        function runUnlockAnimation(stageElement) {
            if (!stageElement) return;
            
            const originalChain = stageElement.querySelector('.chain-image.original');
            const originalLock = stageElement.querySelector('.lock-image.original');
            const crackedChain = stageElement.querySelector('.chain-image.crack');
            const crackedLock = stageElement.querySelector('.lock-image.crack');
            const unlockEffect = stageElement.querySelector('.unlock-effect');
            const titleImage = stageElement.querySelector('.title-image');
            
            // Phase 1: Bergetar ea (0-500ms)
            setTimeout(() => {
                playSound('crackSound');
                
                if (originalChain) originalChain.classList.add('shake-animation');
                if (originalLock) originalLock.classList.add('shake-animation');
                
                // Phase 2: Pecah gitu (500-1000ms)
                setTimeout(() => {
                    // Glow biar tau klo enih baru unlocked
                    if (unlockEffect) unlockEffect.style.opacity = '1';
                    
                    // Transisi ke image yg pecah
                    if (crackedChain) {
                        crackedChain.classList.remove('hidden');
                        originalChain.style.opacity = '0';
                    }
                    
                    if (crackedLock) {
                        crackedLock.classList.remove('hidden');
                        originalLock.style.opacity = '0';
                    }
                    
                    // Phase 3: Fade out (1000-2000ms)
                    setTimeout(() => {
                        if (crackedChain) crackedChain.classList.add('fly-up-animation');
                        if (crackedLock) crackedLock.classList.add('fly-up-animation');
                        
                        // Phase 4: pdum pdum (2000ms+)
                        setTimeout(() => {
                            if (titleImage) {
                                titleImage.classList.add('animate-pulse-bright');
                                
                                setTimeout(() => {
                                    titleImage.classList.remove('animate-pulse-bright');
                                    
                                    if (originalChain) originalChain.style.display = 'none';
                                    if (originalLock) originalLock.style.display = 'none';
                                    if (crackedChain) crackedChain.style.display = 'none';
                                    if (crackedLock) crackedLock.style.display = 'none';
                                }, 2000);
                            }
                        }, 1000);
                    }, 500);
                }, 500);
            }, 100);
        }
        
        // Hover sounds (yg eni masi mw di bnerin soalnya masi kaga jelas aja itu yah, dan keknya gajdi dipake aja)
        function setupHoverSound() {
            const stageCards = document.querySelectorAll('.stage-card.locked');
            
            stageCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    const now = Date.now();
                    // biar sound ke play kalo udah 500ms dari trakhir kali bunyi
                    if (now - lastHoverSoundTime > 500) {
                        playSound('hoverSound', { volume: 0.3 });
                        lastHoverSoundTime = now;
                    }
                });
            });
        }
        
        // Unlock effects buat yg baru di unlocked stagenya
        function setupUnlockEffects() {
            const newlyUnlockedStages = document.querySelectorAll(".unlocking");
            
            if (newlyUnlockedStages.length > 0) {
                newlyUnlockedStages.forEach(stage => {
                    runUnlockAnimation(stage);
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('toggleSound').addEventListener('click', toggleSound);
            
            setupHoverSound();
            
            setupUnlockEffects();
            
            <?php if($hasNewlyUnlockedStage): ?>
            setTimeout(() => playSound('crackSound'), 300);
            
            const handleInteraction = () => {
                playSound('crackSound');
                ['click', 'touchstart'].forEach(event => {
                    document.removeEventListener(event, handleInteraction);
                });
            };
            
            ['click', 'touchstart'].forEach(event => {
                document.addEventListener(event, handleInteraction, { once: true });
            });
            <?php endif; ?>
        });
    </script>

     {{-- Footer --}}
    @include('includes.footer')
</body>
</html>