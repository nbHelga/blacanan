<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'kategori' => 'Edukasi',
            'judul' => 'Pentingnya UMKM Digital',
            'deskripsi' => 'Artikel ini membahas manfaat digitalisasi UMKM.',
            'gambar' => null,
            'status' => true,
        ]);
        Blog::create([
            'kategori' => 'Perikanan',
            'judul' => 'Pengembangan Perikanan di Desa Blacanan',
            'deskripsi' => 'Artikel ini membahas pengembangan perikanan di Desa Blacanan.',
            'gambar' => null,
            'status' => true,
        ]);
        Blog::create([
            'kategori' => 'Pertanian',
            'judul' => 'Pengembangan Pertanian di Desa Blacanan',
            'deskripsi' => 'Artikel ini membahas pengembangan pertanian di Desa Blacanan.',
            'gambar' => null,
            'status' => true,
        ]);
        Blog::create([
            'kategori' => 'Kesehatan',
            'judul' => 'Pengembangan Kesehatan di Desa Blacanan',
            'deskripsi' => 'Artikel ini membahas pengembangan kesehatan di Desa Blacanan.',
            'gambar' => 'kesehatan.jpg',
            'status' => true,
        ]);
        Blog::create([
            'kategori' => 'Pendidikan',
            'judul' => 'Pengembangan Pendidikan di Desa Blacanan',
            'deskripsi' => 'Artikel ini membahas pengembangan pendidikan di Desa Blacanan.',
            'gambar' => 'pendidikan.jpg',
            'status' => false,
        ]);
        Blog::create([
            'kategori' => 'Kondisi Wilayah',
            'judul' => 'Kondisi Wilayah Desa Blacanan',
            'deskripsi' => 'Artikel ini membahas kondisi wilayah desa Blacanan.',
            'gambar' => 'wilayah.jpg',
            'status' => true,
        ]);
    }
}
