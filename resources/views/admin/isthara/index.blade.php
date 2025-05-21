<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kandidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS (pastikan ini tersedia jika tidak pakai Vite/Laravel Mix) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Data Kandidat</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.isthara.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition mb-4 inline-block">+ Tambah Kandidat</a>

        <table class="w-full table-auto border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2">Vote</th>
                    <th class="border px-4 py-2">Gambar</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($istharas as $kandidat)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $kandidat->name }}</td>
                    <td class="border px-4 py-2">{{ $kandidat->description }}</td>
                    <td class="border px-4 py-2">{{ $kandidat->vote_count }}</td>
                    <td class="border px-4 py-2">
                        @if($kandidat->image)
                            <img src="{{ asset('storage/' . $kandidat->image) }}" alt="Foto" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('admin.isthara.edit', $kandidat->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.isthara.destroy', $kandidat->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus kandidat ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
