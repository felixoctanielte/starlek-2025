<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Voting</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-xl w-full text-center">
        <div class="flex flex-col items-center space-y-4">
            <svg class="w-16 h-16 text-yellow-500" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="text-3xl font-bold text-gray-800">Voting Belum Dibuka</h1>
            <p class="text-gray-500">Voting akan dibuka dalam:</p>
            <div id="countdown"
                class="text-2xl font-mono bg-gray-100 text-gray-800 py-3 px-6 rounded-xl border border-gray-300 shadow-inner transition-all duration-300">
                Memuat...
            </div>
        </div>
    </div>
</div>
</body>

<script>
    const startTime = new Date("{{ $startTime }}").getTime();
    const countdownEl = document.getElementById('countdown');

    const interval = setInterval(() => {
        const now = new Date().getTime();
        const distance = startTime - now;

        if (distance < 0) {
            clearInterval(interval);
            window.location.href = "{{ route('voting.index') }}";
        } else {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownEl.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }
    }, 1000);
</script>
</html>
