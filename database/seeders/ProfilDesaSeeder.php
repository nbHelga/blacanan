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
            'statistik' => json_encode([
                ['uraian' => 'Penduduk Awal Laki-laki', 'jumlah' => 1143, 'satuan' => 'Orang'],
                ['uraian' => 'Penduduk Awal Perempuan', 'jumlah' => 1138, 'satuan' => 'Orang'],
                ['uraian' => 'Jumlah Penduduk Awal', 'jumlah' => 2281, 'satuan' => 'Orang'],
                ['uraian' => 'Mati Laki-laki', 'jumlah' => 11, 'satuan' => 'Orang'],
                ['uraian' => 'Mati Perempuan', 'jumlah' => 10, 'satuan' => 'Orang'],
                ['uraian' => 'Jumlah Mati', 'jumlah' => 21, 'satuan' => 'Orang'],
                ['uraian' => 'Datang Laki-laki', 'jumlah' => 4, 'satuan' => 'Orang'],
                ['uraian' => 'Datang Perempuan', 'jumlah' => 1, 'satuan' => 'Orang'],
                ['uraian' => 'Jumlah Datang', 'jumlah' => 5, 'satuan' => 'Orang'],
                ['uraian' => 'Pindah Laki-laki', 'jumlah' => 21, 'satuan' => 'Orang'],
                ['uraian' => 'Pindah Perempuan', 'jumlah' => 15, 'satuan' => 'Orang'],
                ['uraian' => 'Jumlah Pindah', 'jumlah' => 36, 'satuan' => 'Orang'],
                ['uraian' => 'Penduduk Akhir Laki-laki', 'jumlah' => 1143, 'satuan' => 'Orang'],
                ['uraian' => 'Penduduk Akhir Perempuan', 'jumlah' => 1138, 'satuan' => 'Orang'],
                ['uraian' => 'Jumlah Penduduk Akhir', 'jumlah' => 2282, 'satuan' => 'Orang'],
            ]),
            'mutasi' => json_encode([
                ['mutasi' => 'Desa', 'pindah_l' => 2, 'pindah_p' => 0, 'pindah_lp' => 2, 'datang_l' => 2, 'datang_p' => 0, 'datang_lp' => 2],
                ['mutasi' => 'Kecamatan', 'pindah_l' => 4, 'pindah_p' => 1, 'pindah_lp' => 5, 'datang_l' => 0, 'datang_p' => 1, 'datang_lp' => 1],
                ['mutasi' => 'Kabupaten', 'pindah_l' => 5, 'pindah_p' => 6, 'pindah_lp' => 11, 'datang_l' => 1, 'datang_p' => 0, 'datang_lp' => 1],
                ['mutasi' => 'Provinsi', 'pindah_l' => 10, 'pindah_p' => 8, 'pindah_lp' => 18, 'datang_l' => 1, 'datang_p' => 0, 'datang_lp' => 1],
                ['mutasi' => 'Negara', 'pindah_l' => 0, 'pindah_p' => 0, 'pindah_lp' => 0, 'datang_l' => 0, 'datang_p' => 0, 'datang_lp' => 0],
            ]),
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
