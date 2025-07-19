<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistik;

class StatistikSeeder extends Seeder
{
    public function run()
    {
        $statistikData = [
            ['uraian' => 'Penduduk Awal Laki-laki', 'jumlah' => 1143, 'satuan' => 'Orang', 'urutan' => 1],
            ['uraian' => 'Penduduk Awal Perempuan', 'jumlah' => 1138, 'satuan' => 'Orang', 'urutan' => 2],
            ['uraian' => 'Jumlah Penduduk Awal', 'jumlah' => 2281, 'satuan' => 'Orang', 'urutan' => 3],
            ['uraian' => 'Lahir Laki-laki', 'jumlah' => 0, 'satuan' => 'Orang', 'urutan' => 4],
            ['uraian' => 'Lahir Perempuan', 'jumlah' => 0, 'satuan' => 'Orang', 'urutan' => 5],
            ['uraian' => 'Mati Laki-laki', 'jumlah' => 11, 'satuan' => 'Orang', 'urutan' => 6],
            ['uraian' => 'Mati Perempuan', 'jumlah' => 10, 'satuan' => 'Orang', 'urutan' => 7],
            ['uraian' => 'Datang Laki-laki', 'jumlah' => 4, 'satuan' => 'Orang', 'urutan' => 8],
            ['uraian' => 'Datang Perempuan', 'jumlah' => 1, 'satuan' => 'Orang', 'urutan' => 9],
            ['uraian' => 'Pindah Laki-laki', 'jumlah' => 21, 'satuan' => 'Orang', 'urutan' => 10],
            ['uraian' => 'Pindah Perempuan', 'jumlah' => 15, 'satuan' => 'Orang', 'urutan' => 11],
            ['uraian' => 'Penduduk Akhir Laki-laki', 'jumlah' => 1143, 'satuan' => 'Orang', 'urutan' => 12],
            ['uraian' => 'Penduduk Akhir Perempuan', 'jumlah' => 1138, 'satuan' => 'Orang', 'urutan' => 13],
            ['uraian' => 'Jumlah Penduduk Akhir', 'jumlah' => 2281, 'satuan' => 'Orang', 'urutan' => 14],
        ];

        foreach ($statistikData as $data) {
            Statistik::create($data);
        }
    }
}
