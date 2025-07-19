<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mutasi;

class MutasiSeeder extends Seeder
{
    public function run()
    {
        $mutasiData = [
            ['wilayah' => 'Desa', 'pindah_laki' => 1, 'pindah_perempuan' => 1, 'datang_laki' => 1, 'datang_perempuan' => 1, 'urutan' => 1],
            ['wilayah' => 'Kecamatan', 'pindah_laki' => 3, 'pindah_perempuan' => 2, 'datang_laki' => 1, 'datang_perempuan' => 0, 'urutan' => 2],
            ['wilayah' => 'Kabupaten', 'pindah_laki' => 6, 'pindah_perempuan' => 5, 'datang_laki' => 1, 'datang_perempuan' => 0, 'urutan' => 3],
            ['wilayah' => 'Provinsi', 'pindah_laki' => 10, 'pindah_perempuan' => 8, 'datang_laki' => 1, 'datang_perempuan' => 0, 'urutan' => 4],
            ['wilayah' => 'Negara', 'pindah_laki' => 0, 'pindah_perempuan' => 0, 'datang_laki' => 0, 'datang_perempuan' => 0, 'urutan' => 5],
        ];

        foreach ($mutasiData as $data) {
            Mutasi::create($data);
        }
    }
}
