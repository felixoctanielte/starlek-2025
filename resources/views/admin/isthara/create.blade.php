<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kandidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Tambah Kandidat</h1>

        <form action="{{ route('admin.isthara.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow p-6 rounded space-y-4 max-w-xl">
            @csrf
            <div>
                <label class="block font-medium mb-1">Nama:</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label class="block font-medium mb-1">Deskripsi:</label>
                <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" rows="4"></textarea>
            </div>
            <div>
                <label class="block font-medium mb-1">Gambar (opsional):</label>
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
