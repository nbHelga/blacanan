<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UMKM;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UMKM::create(
            [
                'nama' => 'UMKM Konveksi dan Fashion Rumah',
                'kategori' => 'Fashion',
                'deskripsi' => 'UMKM Nafri Fashion yang merupakan andalan Desa Blacanan dalam bidang konveksi rumahan.',
                'gambar' => 'umkm1.jpg',
                'status' => true,
        ]);
        UMKM::create([
                'nama' => 'Olahan Hasil Laut',
                'kategori' => 'Makanan',
                'deskripsi' => 'Inovasi UMKM DNA Crabs yang menghadirkan olahan kepiting bakau dalam kemasan menarik.',
                'gambar' => 'umkm2.jpg',
                'status' => true,
        ]);
        UMKM::create([
                'nama' => 'Pertanian dan Perikanan',
                'kategori' => 'Pertanian',
                'deskripsi' => 'Tanah subur mendukung pertanian padi, sayuran, dan tebu, serta tambak dan budidaya ikan.',
                'gambar' => 'umkm3.jpg',
                'status' => true,
        ]);
        UMKM::create([
                'nama' => 'UMKM Kerajinan',
                'kategori' => 'Kerajinan',
                'deskripsi' => 'Kerajinan tangan khas Blacanan.',
                'gambar' => 'umkm4.jpg',
                'status' => true,
        ]);
        UMKM::create([
                'nama' => 'UMKM Digital',
                'kategori' => 'Digital',
                'deskripsi' => 'UMKM berbasis digital dan teknologi.',
                'gambar' => 'umkm5.jpg',
                'status' => false,
        ]);
    }
}
