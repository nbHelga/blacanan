<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SOD;
use Illuminate\Support\Facades\DB;

class SODSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Khusaeni', 'jabatan' => 'Kepala Desa', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Taufik Wiluyo, S.Pd', 'jabatan' => 'Sekretaris', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Arifan Dian Gustaf, S.Pd', 'jabatan' => 'Kaur Keuangan', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Aliyah, S.Pd', 'jabatan' => 'Kaur umum & perencanaan', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Menik Harnani, S.Pd', 'jabatan' => 'Kasi Pemerintahan', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Eko Pamuji', 'jabatan' => 'Kasi Kesejahteraan & Pelayanan', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => '-', 'jabatan' => 'Kadus keburan I', 'deskripsi' => 'Meninggal', 'gambar' => null],
            ['nama' => 'Imam Cipto Adi', 'jabatan' => 'Kadus keburan II', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'Tarjono', 'jabatan' => 'Kadus Blacanan I', 'deskripsi' => '-', 'gambar' => null],
            ['nama' => 'H. Tarkuat', 'jabatan' => 'Kadus Blacanan II', 'deskripsi' => '-', 'gambar' => null],
        ];

        foreach ($data as $item) {
            DB::table('sods')->insert([
                'nama' => $item['nama'],
                'jabatan' => $item['jabatan'],
                'deskripsi' => $item['deskripsi'],
                'gambar' => $item['gambar'],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
