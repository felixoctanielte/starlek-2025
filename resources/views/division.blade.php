@include('includes.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mt-6">DIVISION</h1>
    <p class="mt-2 text-center">Menampilkan wajah anggota tiap divisi dengan efek animasi</p>
    <div class="w-full h-40 bg-blue-200 mt-4 flex items-center justify-center">
        <p class="text-lg font-semibold">Motion & Animasi Ornamen</p>
    </div>
    

    {{-- Footer --}}
    @include('includes.footer')

</body>
</html>
