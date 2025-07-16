<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Budaya;

class BudayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Budaya::create([
            'judul' => 'Sedekah Laut',
            'subjudul' => 'Tradisi Syukuran Laut',
            'deskripsi' => 'Sedekah Laut merupakan bentuk rasa syukur nelayan Desa Blacanan atas hasil laut yang melimpah.',
            'gambar' => 'sedekah-laut.jpg',
            'status' => false,
        ]);

        Budaya::create([
            'judul' => 'Grebeg Maulud',
            'subjudul' => 'Perayaan Maulid Nabi',
            'deskripsi' => 'Grebeg Maulud adalah acara tradisional yang diselenggarakan masyarakat Blacanan untuk memperingati kelahiran Nabi Muhammad SAW.',
            'gambar' => 'grebeg-maulud.jpg',
            'status' => true,
        ]);

        Budaya::create([
            'judul' => 'Pengajian Akbar',
            'subjudul' => 'Wujud Keharmonisan Warga',
            'deskripsi' => 'Pengajian akbar rutin dilakukan setiap tahun sebagai sarana silaturahmi dan dakwah masyarakat desa.',
            'gambar' => 'pengajian.jpg',
            'status' => true,
        ]);

        Budaya::create([
            'judul' => 'Lomba Perahu Hias',
            'subjudul' => 'Kreativitas Nelayan',
            'deskripsi' => 'Lomba perahu hias menjadi ajang kreativitas para nelayan yang menghias perahu untuk festival laut.',
            'gambar' => 'perahu-hias.jpg',
            'status' => true,
        ]);

        Budaya::create([
            'judul' => 'Wayang Kulit',
            'subjudul' => 'Seni Tradisi Jawa',
            'deskripsi' => 'Pementasan wayang kulit digelar saat hari besar desa dan menjadi warisan budaya yang masih lestari.',
            'gambar' => 'wayang-kulit.jpg',
            'status' => true,
        ]);
    }
}
