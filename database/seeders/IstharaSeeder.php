<?php

namespace Database\Seeders;

use App\Models\Isthara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IstharaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data dummy ke tabel 'isthara'
        Isthara::create([
            'name' => 'Kandidat A',
            'description' => 'Deskripsi Kandidat A',
            'image' => 'path_to_image_A.jpg',  // Sesuaikan dengan path gambar jika ada
            'vote_count' => 0,
        ]);

        Isthara::create([
            'name' => 'Kandidat B',
            'description' => 'Deskripsi Kandidat B',
            'image' => 'path_to_image_B.jpg',  // Sesuaikan dengan path gambar jika ada
            'vote_count' => 0,
        ]);

        Isthara::create([
            'name' => 'Kandidat C',
            'description' => 'Deskripsi Kandidat C',
            'image' => 'path_to_image_C.jpg',  // Sesuaikan dengan path gambar jika ada
            'vote_count' => 0,
        ]);
    }
}
