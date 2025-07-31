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
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1980.5950878695953!2d109.5866462!3d-6.8678009!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7027eb7a6c776f%3A0xc26e9c41117d7f79!2sKantor%20Kepala%20Desa%20Blacanan!5e0!3m2!1sen!2sid!4v1753048410555!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
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
