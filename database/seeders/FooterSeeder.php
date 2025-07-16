<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footerId = DB::table('footer')->insertGetId([
            'deskripsi' => 'Desa Blacanan, Kecamatan Siwalan, terus berinovasi untuk menghadirkan pelayanan publik yang modern, cepat, dan transparan.',
            'alamat' => 'Jl. Raya Blacanan No. 1, Siwalan, Pekalongan',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." class="w-full h-32 mb-2 rounded-lg border-0" allowfullscreen="" loading="lazy"></iframe>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('footer_kontak')->insert([
            [
                'footer_id' => $footerId,
                'tipe' => 'email',
                'label' => 'Email',
                'value' => 'desa_blacanan@yahoo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'footer_id' => $footerId,
                'tipe' => 'email',
                'label' => 'Email Administrasi Kependudukan',
                'value' => 'ppaddesablacanan@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'footer_id' => $footerId,
                'tipe' => 'phone',
                'label' => 'No. HP',
                'value' => '0858 7000 0941',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'footer_id' => $footerId,
                'tipe' => 'facebook',
                'label' => 'Facebook',
                'value' => 'https://facebook.com/blacanan.kecsiwalan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'footer_id' => $footerId,
                'tipe' => 'instagram',
                'label' => 'Instagram',
                'value' => 'https://instagram.com/desablacanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
