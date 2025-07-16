<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'judul' => 'Beranda Blacanan',
            'deskripsi' => 'Selamat datang di website resmi Desa Blacanan.',
            'gambar' => 'banner.jpg',
            'status' => true,
        ]);
        Content::create([
            'judul' => 'Selamat Hari Lahir Pancasila',
            'deskripsi' => 'Hari ini adalah hari lahir Pancasila, hari yang sangat penting bagi bangsa Indonesia.',
            'gambar' => 'pancasila.jpg',
            'status' => true,
        ]);
        Content::create([
            'judul' => 'Pengembangan Desa Blacanan',
            'deskripsi' => 'Pengembangan Desa Blacanan adalah prioritas utama dalam pembangunan.',
            'gambar' => 'pengembangan.jpg',
            'status' => true,
        ]);
    }
}
