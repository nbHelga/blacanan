{{-- filepath: resources/views/profildesa.blade.php --}}
@extends('layouts.layout')
@section('content')
<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-3xl font-bold mb-4">Profil Desa</h1>
    <div class="text-gray-700 mb-4">
        <p>{{ $profil->deskripsi ?? 'Selamat datang di halaman profil desa kami. Di sini, Anda dapat menemukan informasi lengkap tentang desa kami, termasuk sejarah, budaya, dan potensi yang dimiliki.' }}</p>
    </div>
    <div class="w-full bg-gray-200 rounded mb-6 overflow-hidden flex items-center justify-center">
        @if($profil && $profil->peta)
            <img src="{{ asset('storage/'.$profil->peta) }}" alt="Peta" class="max-w-md h-auto mx-auto rounded mb-6">
        @else
            <img src="{{ asset('images/peta-desa.jpg') }}" alt="Peta" class="max-w-md h-auto mx-auto rounded mb-6">
        @endif
    </div>
    <div class="mb-8">
        <h2 class="font-bold text-2xl mb-2">Visi Desa</h2>
        <p class="mb-4">"{{ $profil->visi ?? 'Terwujudnya Desa Blacanan Yang Maju, Aman, Dan Sejahtera melalui pelayanan masyarakat yang bersih dan jujur' }}"</p>
        <h2 class="font-bold text-2xl mb-2">Misi Desa</h2>
        @if($profil && $profil->misi)
            <div class="text-gray-700">{!! nl2br(e($profil->misi)) !!}</div>
        @else
            <ul class="list-disc ml-6 text-gray-700">
                <li>Meningkatkan Kualitas Sumber Daya Manusia (SDM) yang sehat dan berkarakter</li>
                <li>Meningkatkan ketersediaan infrastruktur untuk menunjang pemerintahan, transportasi keagamaan, kesehatan, pendidikan, ekonomi, pertanian, perikanan, budaya, lingkungan hidup dan bidang lain yang menjadi kewenangan desa</li>
                <li>Membangun perekonomian berbasis pertanian, perikanan dan potensi lokal desa lainnya</li>
                <li>Memanfaatkan Sumber Daya Alam (SDA) dan lingkungan Desa Blacanan untuk menunjang pembangunan berkelanjutan</li>
                <li>Meningkatkan tata kelola pemerintahan desa yang baik</li>
                <li>Meningkatkan partisipasi masyarakat dalam perencanaan, pelaksanaan dan evaluasi pembangunan</li>
            </ul>
        @endif
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
                    @if($statistik && count($statistik) > 0)
                        @foreach($statistik as $index => $stat)
                            <tr class="{{ in_array($stat->uraian, ['Jumlah Penduduk Awal', 'Penduduk Akhir Laki-laki', 'Penduduk Akhir Perempuan']) ? 'font-semibold bg-gray-50' : '' }} {{ $stat->uraian == 'Jumlah Penduduk Akhir' ? 'font-bold bg-gray-100' : '' }}">
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">{{ $stat->uraian }}</td>
                                <td class="border p-2">{{ $stat->jumlah == 0 ? '-' : $stat->jumlah }}</td>
                                <td class="border p-2">{{ $stat->satuan }}</td>
                            </tr>
                        @endforeach
                    @else
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
                    @endif
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

        @if($statistik && count($statistik) > 0)
            // Dynamic data from database
            const statistikData = @json($statistik);
            const labels = statistikData.map(item => item.uraian);
            const data = statistikData.map(item => item.jumlah);
        @else
            // Fallback static data
            const labels = ['Penduduk Awal', 'Lahir', 'Mati', 'Datang', 'Pindah', 'Penduduk Akhir'];
            const data = [2281, 0, 21, 7, 38, 2282];
        @endif

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: data,
                    backgroundColor: [
                        '#60A5FA',
                        '#34D399',
                        '#F87171',
                        '#FBBF24',
                        '#A78BFA',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#06B6D4'
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
                    @if($mutasi && count($mutasi) > 0)
                        @foreach($mutasi as $index => $mut)
                            <tr>
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">{{ $mut->wilayah }}</td>
                                <td class="border p-2">{{ $mut->pindah_laki == 0 ? '-' : $mut->pindah_laki }}</td>
                                <td class="border p-2">{{ $mut->pindah_perempuan == 0 ? '-' : $mut->pindah_perempuan }}</td>
                                <td class="border p-2">{{ $mut->pindah_laki + $mut->pindah_perempuan == 0 ? '-' : $mut->pindah_laki + $mut->pindah_perempuan }}</td>
                                <td class="border p-2">{{ $mut->datang_laki == 0 ? '-' : $mut->datang_laki }}</td>
                                <td class="border p-2">{{ $mut->datang_perempuan == 0 ? '-' : $mut->datang_perempuan }}</td>
                                <td class="border p-2">{{ $mut->datang_laki + $mut->datang_perempuan == 0 ? '-' : $mut->datang_laki + $mut->datang_perempuan }}</td>
                            </tr>
                        @endforeach
                        <tr class="font-semibold">
                            <td class="border p-2">Jumlah</td>
                            <td class="border p-2"></td>
                            <td class="border p-2">{{ $mutasi->sum('pindah_laki') }}</td>
                            <td class="border p-2">{{ $mutasi->sum('pindah_perempuan') }}</td>
                            <td class="border p-2">{{ $mutasi->sum('pindah_laki') + $mutasi->sum('pindah_perempuan') }}</td>
                            <td class="border p-2">{{ $mutasi->sum('datang_laki') }}</td>
                            <td class="border p-2">{{ $mutasi->sum('datang_perempuan') }}</td>
                            <td class="border p-2">{{ $mutasi->sum('datang_laki') + $mutasi->sum('datang_perempuan') }}</td>
                        </tr>
                    @else
                        <tr><td class="border p-2">1</td><td class="border p-2">Desa</td><td class="border p-2">2</td><td class="border p-2">-</td><td class="border p-2">2</td><td class="border p-2">2</td><td class="border p-2">-</td><td class="border p-2">2</td></tr>
                        <tr><td class="border p-2">2</td><td class="border p-2">Kecamatan</td><td class="border p-2">4</td><td class="border p-2">1</td><td class="border p-2">5</td><td class="border p-2">-</td><td class="border p-2">1</td><td class="border p-2">1</td></tr>
                        <tr><td class="border p-2">3</td><td class="border p-2">Kabupaten</td><td class="border p-2">5</td><td class="border p-2">6</td><td class="border p-2">11</td><td class="border p-2">1</td><td class="border p-2">-</td><td class="border p-2">1</td></tr>
                        <tr><td class="border p-2">4</td><td class="border p-2">Provinsi</td><td class="border p-2">10</td><td class="border p-2">8</td><td class="border p-2">18</td><td class="border p-2">1</td><td class="border p-2">-</td><td class="border p-2">1</td></tr>
                        <tr><td class="border p-2">5</td><td class="border p-2">Negara</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td><td class="border p-2">-</td></tr>
                        <tr class="font-semibold"><td class="border p-2">Jumlah</td><td class="border p-2"></td><td class="border p-2">21</td><td class="border p-2">15</td><td class="border p-2">36</td><td class="border p-2">4</td><td class="border p-2">1</td><td class="border p-2">5</td></tr>
                    @endif
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

        @if($mutasi && count($mutasi) > 0)
            // Dynamic data from database
            const mutasiData = @json($mutasi);
            const mutasiLabels = mutasiData.map(item => item.wilayah);
            const pindahData = mutasiData.map(item => item.pindah_laki + item.pindah_perempuan);
            const datangData = mutasiData.map(item => item.datang_laki + item.datang_perempuan);
        @else
            // Fallback static data
            const mutasiLabels = ['Desa', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Negara'];
            const pindahData = [2, 5, 11, 18, 0];
            const datangData = [2, 1, 1, 1, 0];
        @endif

        new Chart(ctxMutasi, {
            type: 'bar',
            data: {
                labels: mutasiLabels,
                datasets: [
                    {
                        label: 'Pindah L+P',
                        data: pindahData,
                        backgroundColor: '#F87171'
                    },
                    {
                        label: 'Datang L+P',
                        data: datangData,
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
        <h1 class="text-3xl font-bold mb-4">Batas Wilayah Desa</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                {{-- <h2 class="font-bold text-xl mb-2">Batas Desa:</h2> --}}
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
                <img src="{{ asset('dataStartup/_DESA_Backup_of_PETA DESA BLACANAN COREL OK_Preview.png') }}" alt="Peta Desa" class="w-full h-auto rounded shadow">
            </div>
        </div>
    </div>
</div>
@endsection