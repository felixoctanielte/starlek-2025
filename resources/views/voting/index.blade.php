<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Voting</title>
</head>

<body class="text-white bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('assets/images/bg_panjaang.png') }}');">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-8 text-center text-white">Save Your Isthara!</h1>

        @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($istharas as $kandidat)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center p-6">
                @if($kandidat->image)
                <img src="{{ asset('storage/' . $kandidat->image) }}" alt="{{ $kandidat->name }}" class="w-32 h-32 object-cover rounded-full mb-4 shadow-md">
                @else
                <div class="w-32 h-32 bg-gray-200 rounded-full mb-4 flex items-center justify-center text-gray-500">
                    Tidak Ada Gambar
                </div>
                @endif

                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $kandidat->name ?? '' }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $kandidat->description ?? '' }}</p>

                <form action="{{ route('vote', $kandidat->id) }}" method="POST" class="vote-form w-full" data-id="{{ $kandidat->id }}">
                    @csrf
                    <button type="submit"
                        class="vote-btn w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Vote
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="voteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Voting</h2>
            <p class="text-gray-600 mb-6">Yakin ingin memilih kandidat ini?</p>
            <div class="flex justify-end gap-4">
                <button id="cancelVoteBtn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</button>
                <button id="confirmVoteBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Ya, Vote</button>
            </div>
        </div>
    </div>

    <!-- Already Voted Modal -->
    <div id="alreadyVotedModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Sudah Voting</h2>
            <p class="text-gray-600 mb-6">Kamu sudah melakukan voting sebelumnya. Terima kasih!</p>
            <button id="closeAlreadyVotedBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tutup</button>
        </div>
    </div>

</body>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const voteModal = document.getElementById('voteModal');
        const cancelBtn = document.getElementById('cancelVoteBtn');
        const confirmBtn = document.getElementById('confirmVoteBtn');

        const alreadyVotedModal = document.getElementById('alreadyVotedModal');
        const closeAlreadyVotedBtn = document.getElementById('closeAlreadyVotedBtn');

        let currentForm = null;

        document.querySelectorAll('.vote-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                if (localStorage.getItem('hasVoted')) {
                    alreadyVotedModal.classList.remove('hidden');
                    alreadyVotedModal.classList.add('flex');
                    return;
                }

                currentForm = form;
                voteModal.classList.remove('hidden');
                voteModal.classList.add('flex');
            });
        });

        cancelBtn.addEventListener('click', function () {
            voteModal.classList.add('hidden');
            voteModal.classList.remove('flex');
            currentForm = null;
        });

        confirmBtn.addEventListener('click', function () {
            if (!currentForm) return;

            const button = currentForm.querySelector('button');
            button.disabled = true;
            button.innerText = 'Voting...';

            fetch(currentForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            }).then(response => {
                if (response.ok) {
                    localStorage.setItem('hasVoted', true);
                    window.location.href = "{{ route('voting.results') }}";
                } else {
                    button.disabled = false;
                    button.innerText = 'Vote';
                    alert('Gagal vote. Silakan coba lagi.');
                }
            }).catch(() => {
                button.disabled = false;
                button.innerText = 'Vote';
                alert('Gagal vote. Silakan coba lagi.');
            });

            voteModal.classList.add('hidden');
            voteModal.classList.remove('flex');
        });

        closeAlreadyVotedBtn.addEventListener('click', function () {
            alreadyVotedModal.classList.add('hidden');
            alreadyVotedModal.classList.remove('flex');
        });
    });
</script>
