<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KontakUMKM;

class KontakUMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KontakUMKM::create(
            [
                'umkm_id' => 1,
                'logo' => 'wa.png',
                'jenis' => 'whatsapp',
                'link' => 'https://wa.me/6281234567890',

            ]);
        KontakUMKM::create(
            [
                'umkm_id' => 1,
                'logo' => 'ig.png',
                'jenis' => 'instagram',
                'link' => 'https://instagram.com/umkm1',
            ]);
        KontakUMKM::create(
            [
                'umkm_id' => 2,
                'logo' => 'fb.png',
                'jenis' => 'facebook',
                'link' => 'https://facebook.com/umkm2',
            ]);
        KontakUMKM::create(
            [
                'umkm_id' => 3,
                'logo' => 'tw.png',
                'jenis' => 'twitter', // custom
                'link' => 'https://twitter.com/umkm3',
            ]);
        KontakUMKM::create(
            [
                'umkm_id' => 4,
                'logo' => 'custom.png',
                'jenis' => 'lainnya',
                'link' => 'https://customlink.com/umkm4',
            ]);
    }
}
