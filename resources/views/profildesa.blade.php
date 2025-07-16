{{-- filepath: resources/views/profildesa.blade.php --}}
@extends('layouts.layout')
@section('content')
<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-3xl font-bold mb-4">Profil Desa</h1>
    <div class="text-gray-700 mb-4">
        <p>Selamat datang di halaman profil desa kami. Di sini, Anda dapat menemukan informasi lengkap tentang desa kami, termasuk sejarah, budaya, dan potensi yang dimiliki.</p>
    </div>
    <div class="w-full h-64 bg-gray-200 rounded mb-6 overflow-hidden flex items-center justify-center">
        <img src="{{ asset('images/peta-desa.jpg') }}" alt="Peta" class="max-w-md h-auto mx-auto rounded mb-6">
    </div>
    <div class="mb-8">
        <h2 class="font-bold text-2xl mb-2">Visi Desa</h2>
        <p class="mb-4">"Terwujudnya Desa Blacanan Yang Maju, Aman, Dan Sejahtera melalui pelayanan masyarakat yang bersih dan jujur"</p>
        <h2 class="font-bold text-2xl mb-2">Misi Desa</h2>
        <ul class="list-disc ml-6 text-gray-700">
            <li>Meningkatkan Kualitas Sumber Daya Manusia (SDM) yang sehat dan berkarakter</li>
            <li>Meningkatkan ketersediaan infrastruktur untuk menunjang pemerintahan, transportasi keagamaan, kesehatan, pendidikan, ekonomi, pertanian, perikanan, budaya, lingkungan hidup dan bidang lain yang menjadi kewenangan desa</li>
            <li>Membangun perekonomian berbasis pertanian, perikanan dan potensi lokal desa lainnya</li>
            <li>Memanfaatkan Sumber Daya Alam (SDA) dan lingkungan Desa Blacanan untuk menunjang pembangunan berkelanjutan</li>
            <li>Meningkatkan tata kelola pemerintahan desa yang baik</li>
            <li>Meningkatkan partisipasi masyarakat dalam perencanaan, pelaksanaan dan evaluasi pembangunan</li>
        </ul>
    </div>
    <div class="text-gray-700 mb-8">
        <h2 class="font-semibold mb-2">Statistik Kependudukan</h2>
        <div class="overflow-x-auto rounded border">
            <table class="min-w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No.</th>
                        <th class="border p-2">Uraian</th>
                        <th class="border p-2">Jumlah</th>
                        <th class="border p-2">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="border p-2">1</td><td class="border p-2">Penduduk Awal Laki-laki</td><td class="border p-2">1143</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2"></td><td class="border p-2">Penduduk Awal Perempuan</td><td class="border p-2">1138</td><td class="border p-2">Orang</td></tr>
                    <tr class="font-semibold"><td class="border p-2"></td><td class="border p-2">Jumlah Penduduk Awal</td><td class="border p-2">2281</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2">2</td><td class="border p-2">Lahir Laki-laki</td><td class="border p-2">-</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2"></td><td class="border p-2">Lahir Perempuan</td><td class="border p-2">-</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2">3</td><td class="border p-2">Mati Laki-laki</td><td class="border p-2">11</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2"></td><td class="border p-2">Mati Perempuan</td><td class="border p-2">10</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2">4</td><td class="border p-2">Datang Laki-laki</td><td class="border p-2">4</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2"></td><td class="border p-2">Datang Perempuan</td><td class="border p-2">1</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2">5</td><td class="border p-2">Pindah Laki-laki</td><td class="border p-2">21</td><td class="border p-2">Orang</td></tr>
                    <tr><td class="border p-2"></td><td class="border p-2">Pindah Perempuan</td><td class="border p-2">15</td><td class="border p-2">Orang</td></tr>
                    <tr class="font-semibold bg-gray-50"><td class="border p-2">6</td><td class="border p-2">Penduduk Akhir Laki-laki</td><td class="border p-2">1143</td><td class="border p-2">Orang</td></tr>
                    <tr class="font-semibold bg-gray-50"><td class="border p-2"></td><td class="border p-2">Penduduk Akhir Perempuan</td><td class="border p-2">1138</td><td class="border p-2">Orang</td></tr>
                    <tr class="font-bold bg-gray-100"><td class="border p-2"></td><td class="border p-2">Jumlah Penduduk Akhir</td><td class="border p-2">2282</td><td class="border p-2">Orang</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-gray-700 mb-8">
        <h2 class="font-semibold mb-2">Visualisasi Statistik Penduduk</h2>
        <canvas id="pendudukChart" height="100"></canvas>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pendudukChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Penduduk Awal', 'Lahir', 'Mati', 'Datang', 'Pindah', 'Penduduk Akhir'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [2281, 0, 21, 7, 38, 2282],
                    backgroundColor: [
                        '#60A5FA',
                        '#34D399',
                        '#F87171',
                        '#FBBF24',
                        '#A78BFA',
                        '#10B981'
                    ],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { mode: 'index', intersect: false },
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    @endpush

    <div class="text-gray-700 mb-4">
        <h2 class="font-semibold mb-2">Mutasi Penduduk Antar Wilayah</h2>
        <div class="overflow-x-auto rounded border">
            <table class="min-w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No.</th>
                        <th class="border p-2">Mutasi Antar</th>
                        <th class="border p-2">Pindah L</th>
                        <th class="border p-2">Pindah P</th>
                        <th class="border p-2">Pindah L+P</th>
                        <th class="border p-2">Datang L</th>
                        <th class="border p-2">Datang P</th>
                        <th class="border p-2">Datang L+P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="border p-2">1</td><td class="border p-2">Desa</td><td class="border p-2">2</td><td class="border p-2">-</td><td class="border p-2">2</td><td class="border p-2">2</td><td class="border p-2">-</td><td class="border p-2">2</td></tr>
                    <tr><td class="border p-2">2</td><td class="border p-2">Kecamatan</td><td class="border p-2">4</td><td class="border p-2">1</td><td class="border p-2">5</td><td class="border p-2">-</td><td class="border p-2">1</td><td class="border p-2">1</td></tr>
                    <tr><td class="border p-2">3</td><td class="border p-2">Kabupaten</td><td class="border p-2">5</td><td class="border p-2">6</td><td class="border p-2">11</td><td class="border p-2">1</td><td class="border p-2">-</td><td class="border p-2">1</td></tr>
                    <tr><td class="border p-2">4</td><td class="border p-2">Provinsi</td><td class="border p-2">10</td><td class="border p-2">8</td><td class="border p-2">18</td><td class="border p-2">1</td><td class="border p-2">-</td><td class="border p-2">1</td></tr>
                    <tr><td class="border p-2">5</td><td class="border p-2">Negara</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td></tr>
                    <tr class="font-semibold"><td class="border p-2">Jumlah</td><td class="border p-2"></td><td class="border p-2">21</td><td class="border p-2">15</td><td class="border p-2">36</td><td class="border p-2">4</td><td class="border p-2">1</td><td class="border p-2">5</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-gray-700 mb-8">
        <h2 class="font-semibold mb-2">Visualisasi Mutasi Antar Wilayah</h2>
        <canvas id="mutasiChart" height="100"></canvas>
    </div>

    @push('scripts')
    <script>
        const ctxMutasi = document.getElementById('mutasiChart').getContext('2d');
        new Chart(ctxMutasi, {
            type: 'bar',
            data: {
                labels: ['Desa', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Negara'],
                datasets: [
                    {
                        label: 'Pindah L+P',
                        data: [2, 5, 11, 18, 0],
                        backgroundColor: '#F87171'
                    },
                    {
                        label: 'Datang L+P',
                        data: [2, 1, 1, 1, 0],
                        backgroundColor: '#60A5FA'
                    },
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: { mode: 'index', intersect: false },
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    @endpush

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
        <h1 class="text-3xl font-bold mb-4">Profil Desa</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-xl mb-2">Batas Desa:</h2>
                <ul>
                    <li>Utara: Pantai</li>
                    <li>Selatan: Desa Yosorejo</li>
                    <li>Timur: Desa Depok</li>
                    <li>Barat: Desa Tasikrejo</li>
                </ul>
                <div class="mt-4">
                    <b>Luas Desa:</b> 226 Ha<br>
                    <b>Koordinat:</b> 109.5863 BT / -6.859873 LS
                </div>
            </div>
            <div>
                <img src="{{ asset('images/peta-desa.jpg') }}" alt="Peta Desa" class="w-full h-auto rounded shadow">
            </div>
        </div>
    </div>
</div>
@endsection