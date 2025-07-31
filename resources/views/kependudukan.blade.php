@extends('layouts.layout')
@section('content')

<div class="max-w-6xl mx-auto">
    {{-- Deskripsi Kependudukan --}}
    {{-- <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="flex-1">
                <h1 class="text-3xl font-bold mb-4 text-red-600">DEMOGRAFI PENDUDUK</h1>
                <p class="text-gray-700 mb-4">
                    Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
                </p>
            </div>
            <img src="{{ asset('infografis.png') }}" alt="Demografi" class="w-64 h-auto rounded shadow ml-8">
        </div>
    </div> --}}

    {{-- Deskripsi Kependudukan --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="flex-1">
                <h1 class="text-3xl font-bold mb-4 text-red-600">DEMOGRAFI PENDUDUK</h1>
                <p class="text-gray-700 mb-4">
                    Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
                </p>
            </div>
            <img src="{{ asset('infografis.png') }}" alt="Demografi" class="w-64 h-auto rounded shadow ml-8">
        </div>
    </div>

    {{-- Div 1: Jumlah Penduduk (ID 1-4) --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-3xl font-bold mb-6 text-red-600">Kependudukan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($kependudukans->whereBetween('id', [1, 4]) as $data)
            <div class="flex items-center bg-white rounded-lg shadow p-6">
                <img src="{{ asset( Str::slug($data->nama) . '.png') }}" alt="{{ $data->nama }}" class="w-16 h-16 mr-4">
                <div>
                    <div class="font-bold text-lg mb-1">{{ strtoupper($data->nama) }}</div>
                    <div class="text-2xl font-bold text-red-600 mb-1">{{ number_format($data->jumlah) }} {{ $data->nama == 'Jumlah Stunting' ? 'anak' : 'Jiwa' }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Div 2: Berdasarkan Umur (ID 5-9) --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Berdasarkan Umur</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($kependudukans->whereBetween('id', [5, 9]) as $data)
            <div class="flex items-center bg-white rounded-lg shadow p-6">
                <img src="{{ asset(Str::slug($data->nama) . '.png') }}" alt="{{ $data->nama }}" class="w-16 h-16 mr-4">
                <div>
                    <div class="font-bold text-lg mb-1">{{ $data->nama }}</div>
                    <div class="text-2xl font-bold text-red-600 mb-1">{{ number_format($data->jumlah) }} Jiwa</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Div 3: Berdasarkan Tingkat Pendidikan Akhir (ID 10-14) --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Berdasarkan Tingkat Pendidikan Akhir</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($kependudukans->whereBetween('id', [10, 14]) as $data)
            <div class="flex items-center bg-white rounded-lg shadow p-6">
                <img src="{{ asset( Str::slug($data->id) . '.png') }}" alt="{{ $data->nama }}" class="w-16 h-16 mr-4">
                <div>
                    <div class="font-bold text-lg mb-1">{{ $data->nama }}</div>
                    <div class="text-2xl font-bold text-red-600 mb-1">{{ number_format($data->jumlah) }} Jiwa</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Div 4: Berdasarkan Mata Pencaharian (ID 15-20) --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Berdasarkan Mata Pencaharian</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($kependudukans->whereBetween('id', [15, 20]) as $data)
            <div class="flex items-center bg-white rounded-lg shadow p-6">
                <img src="{{ asset(Str::slug($data->nama) . '.png') }}" alt="{{ $data->nama }}" class="w-16 h-16 mr-4">
                <div>
                    <div class="font-bold text-lg mb-1">{{ $data->nama }}</div>
                    <div class="text-2xl font-bold text-red-600 mb-1">{{ number_format($data->jumlah) }} Jiwa</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Statistik & Mutasi --}}
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold mb-4 text-red-600">Statistik Kependudukan</h2>
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
                    @foreach($statistik as $index => $stat)
                        <tr>
                            <td class="border p-2">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $stat->uraian }}</td>
                            <td class="border p-2">{{ $stat->jumlah == 0 ? '-' : $stat->jumlah }}</td>
                            <td class="border p-2">{{ $stat->satuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold mb-4 text-red-600">Mutasi Penduduk Antar Wilayah</h2>
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
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection