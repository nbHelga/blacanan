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
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000!2d109.6!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" class="w-full h-32 mb-2 rounded-lg border-0" allowfullscreen="" loading="lazy"></iframe>',
            'maps_link' => 'https://maps.google.com/maps?q=-6.9,109.6',
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
