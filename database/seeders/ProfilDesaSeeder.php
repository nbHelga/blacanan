<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilDesaSeeder extends Seeder
{
    public function run()
    {
        // Insert profil_desa
        $profilId = DB::table('profil_desa')->insertGetId([
            'deskripsi' => 'Desa Blacanan, Kecamatan Siwalan, terus berinovasi untuk menghadirkan pelayanan publik yang modern, cepat, dan transparan.',
            'visi' => 'Terwujudnya Desa Blacanan Yang Maju, Aman, Dan Sejahtera melalui pelayanan masyarakat yang bersih dan jujur',
            'misi' => "Meningkatkan Kualitas SDM yang sehat dan berkarakter\nMeningkatkan infrastruktur\nMembangun perekonomian berbasis potensi lokal\nMemanfaatkan SDA dan lingkungan\nMeningkatkan tata kelola pemerintahan\nMeningkatkan partisipasi masyarakat",
            'batas' => json_encode([
                'utara' => 'Pantai',
                'selatan' => 'Desa Yosorejo',
                'timur' => 'Desa Depok',
                'barat' => 'Desa Tasikrejo',
            ]),
            'luas' => '226 Ha',
            'koordinat' => '109.5863 BT / -6.859873 LS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert sarana_desa
        DB::table('sarana_desa')->insert([
            'profil_desa_id' => $profilId,
            'sekolah_formal' => json_encode([
                'jumlah' => 3,
                'daftar' => [
                    'TK Puspa Bangsa',
                    'SD Negeri 1 Blacanan',
                    'SD Negeri 2 Blacanan',
                ],
            ]),
            'tempat_ibadah' => json_encode([
                'Masjid' => 1,
                'Mushola' => 6,
            ]),
            'prasarana_kesehatan' => json_encode([
                'Polindes' => 1,
            ]),
            'sarana_kesehatan' => json_encode([
                'Dukun bersalin terlatih' => 1,
                'Bidan' => 1,
            ]),
            'jumlah_stunting' => 11,
            'pamsimas' => json_encode([
                'jumlah' => 3,
                'daftar' => [
                    'Keburan 1',
                    'Blacanan 1',
                    'Blacanan 2',
                ],
            ]),
            'bumdes' => json_encode([
                'jumlah' => 1,
                'nama' => 'Bumdes Sumber Harapan',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
