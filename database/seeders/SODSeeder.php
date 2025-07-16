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
            ['nama' => 'Khusaeni', 'jabatan' => 'Kepala Desa', 'deskripsi' => '-', 'gambar' => 'dataStartup/KHUSAENI.jpg'],
            ['nama' => 'Taufik Wiluyo, S.Pd', 'jabatan' => 'Sekretaris', 'deskripsi' => '-', 'gambar' => 'dataStartup/TAUFIK WILUYO, S.Pd.jpg'],
            ['nama' => 'Arifan Dian Gustaf, S.Pd', 'jabatan' => 'Kaur Keuangan', 'deskripsi' => '-', 'gambar' => 'dataStartup/ARIFAN DIAN GUSTAF, S.Pd.jpg'],
            ['nama' => 'Aliyah, S.Pd', 'jabatan' => 'Kaur umum & perencanaan', 'deskripsi' => '-', 'gambar' => 'dataStartup/ALIYAH, S.Pd.jpg'],
            ['nama' => 'Menik Harnani, S.Pd', 'jabatan' => 'Kasi Pemerintahan', 'deskripsi' => '-', 'gambar' => 'dataStartup/MENIK HARNANI.jpg'],
            ['nama' => 'Eko Pamuji', 'jabatan' => 'Kasi Kesejahteraan & Pelayanan', 'deskripsi' => '-', 'gambar' => 'dataStartup/NUROKHIM.jpg'],
            ['nama' => '-', 'jabatan' => 'Kadus keburan I', 'deskripsi' => 'Meninggal', 'gambar' => 'dataStartup/Kadus keburan I.jpeg'],
            ['nama' => 'Imam Cipto Adi', 'jabatan' => 'Kadus keburan II', 'deskripsi' => '-', 'gambar' => 'dataStartup/IMAM CIPTO ADI.jpg'],
            ['nama' => 'Tarjono', 'jabatan' => 'Kadus Blacanan I', 'deskripsi' => '-', 'gambar' => 'dataStartup/TARJONO.jpg'],
            ['nama' => 'H. Tarkuat', 'jabatan' => 'Kadus Blacanan II', 'deskripsi' => '-', 'gambar' => 'dataStartup/TARKUAT.jpg'],
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
