<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kandidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Kandidat</h1>

        <form action="{{ route('admin.isthara.update', $isthara->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow p-6 rounded space-y-4 max-w-xl">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium mb-1">Nama:</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" value="{{ $isthara->name }}" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Deskripsi:</label>
                <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" rows="4">{{ $isthara->description }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Gambar Saat Ini:</label>
                @if($isthara->image)
                    <img src="{{ asset('storage/' . $isthara->image) }}" class="w-32 mb-2 rounded shadow">
                @else
                    <p class="text-gray-500 italic mb-2">Tidak ada gambar</p>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
