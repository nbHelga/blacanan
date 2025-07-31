<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kependudukan;

class KependudukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Total Penduduk', 'jumlah' => 2281],
            ['nama' => 'Perempuan', 'jumlah' => 1138],
            ['nama' => 'Laki-laki', 'jumlah' => 1143],
            ['nama' => 'Jumlah Stunting', 'jumlah' => 11],
            // Berdasarkan Umur
            ['nama' => 'Balita', 'jumlah' => 31],
            ['nama' => 'Kanak-kanak', 'jumlah' => 277],
            ['nama' => 'Remaja', 'jumlah' => 484],
            ['nama' => 'Dewasa', 'jumlah' => 515],
            ['nama' => 'Lansia', 'jumlah' => 592],
            // Berdasarkan Pendidikan
            ['nama' => 'Tidak sekolah/belum tamat SD', 'jumlah' => 165],
            ['nama' => 'Tamat SD/sederajat', 'jumlah' => 652],
            ['nama' => 'Tamat SLTP/sederajat', 'jumlah' => 304],
            ['nama' => 'Tamat SLTA/sederajat', 'jumlah' => 164],
            ['nama' => 'Tamat S-1/sederajat', 'jumlah' => 14],
            // Berdasarkan Mata Pencaharian
            ['nama' => 'Pelajar', 'jumlah' => 165],
            ['nama' => 'Ibu Rumah Tangga', 'jumlah' => 652],
            ['nama' => 'Buruh Harian Lepas', 'jumlah' => 304],
            ['nama' => 'Belum Bekerja', 'jumlah' => 164],
            ['nama' => 'Buruh Tani', 'jumlah' => 14],
            ['nama' => 'Lainnya', 'jumlah' => 20],
        ];

        foreach ($data as $item) {
            Kependudukan::create($item);
        }
    }
}
