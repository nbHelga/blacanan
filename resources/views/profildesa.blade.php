@extends('layouts.layout')
@section('content')

{{-- Gambar 1: Visi & Misi --}}
<div class="bg-gray-50 py-10">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">Visi</h2>
        <div class="bg-white rounded-lg shadow p-6 mb-8 text-center text-xl font-semibold">
            "{{ $profil->visi }}"
        </div>
        <h2 class="text-3xl font-bold text-center mb-6">Misi</h2>
        <div class="bg-white rounded-lg shadow p-6 text-lg">
            @if($profil && $profil->misi)
                <ol class="list-decimal ml-6 text-gray-700">
                    @foreach(explode("\n", $profil->misi) as $misi)
                        @if(trim($misi) !== '')
                            <li>{{ $misi }}</li>
                        @endif
                    @endforeach
                </ol>
            @else
                <ol class="list-decimal ml-6 text-gray-700">
                    <li>Meningkatkan Kualitas Sumber Daya Manusia (SDM) yang sehat dan berkarakter</li>
                    <li>Meningkatkan ketersediaan infrastruktur ...</li>
                    <li>Membangun perekonomian berbasis pertanian ...</li>
                    <li>Memanfaatkan Sumber Daya Alam ...</li>
                    <li>Meningkatkan tata kelola pemerintahan desa yang baik</li>
                    <li>Meningkatkan partisipasi masyarakat ...</li>
                </ol>
            @endif
        </div>
    </div>
</div>

{{-- Gambar 2: Sejarah Desa --}}
<div class="bg-gray-100 py-10">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold mb-6">Sejarah Desa Blacanan</h2>
        <div class="bg-white rounded-lg shadow p-6 text-lg">
            {!! $profil->deskripsi ?? '<div class="text-gray-400">Belum ada sejarah Desa</div>' !!}
        </div>
    </div>
</div>

{{-- Gambar 3: Peta Lokasi Desa --}}
<div class="bg-gray-50 py-10">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-4">Peta Lokasi Desa</h2>
            <div class="bg-white rounded-lg shadow p-6 mb-4">
                <div class="mb-2"><b>Luas Desa:</b> 226 Ha</div>
                <div class="mb-2"><b>Koordinat:</b> 109.5863 BT / -6.859873 LS</div>
                <div class="mb-2"><b>Tipologi:</b> pesisir</div>
                <div class="mb-2"><b>Batas Wilayah:</b>
                    <ul class="list-disc ml-6">
                        <li>Utara: Pantai</li>
                        <li>Selatan: Desa Yosorejo</li>
                        <li>Timur: Desa Depok</li>
                        <li>Barat: Desa Tasikrejo</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            @if($profil && $profil->peta)
                <img src="{{ asset('storage/'.$profil->peta) }}" alt="Peta Desa" class="w-full h-auto rounded shadow">
            @else
                <img src="{{ asset('images/peta-desa.jpg') }}" alt="Peta Desa" class="w-full h-auto rounded shadow">
            @endif
        </div>
    </div>
</div>

{{-- Gambar 6: Informasi Tambahan --}}
<div class="bg-white py-10">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- Sekolah Formal --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('sekolah.png') }}" alt="Sekolah" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Jumlah Sekolah Formal</div>
                {{-- <div class="text-2xl font-bold text-blue-600 mb-1">3</div> --}}
                <ul class="list-disc ml-4 text-sm text-gray-600">
                    <li>TK Puspa Bangsa</li>
                    <li>SD Negeri 1 Blacanan</li>
                    <li>SD Negeri 2 Blacanan</li>
                </ul>
            </div>
        </div>
        {{-- Tempat Ibadah --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('masjid.webp') }}" alt="Ibadah" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Tempat Ibadah</div>
                {{-- <div class="text-2xl font-bold text-gray-600 mb-1">Masjid: 1, Mushola: 6</div> --}}
                <ul class="list-disc ml-4 text-sm text-gray-600">
                    <li>Masjid: 1</li>
                    <li>Mushola: 6</li>
                </ul>
            </div>
        </div>
        {{-- Prasarana Kesehatan --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('polindes.png') }}" alt="Polindes" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Prasarana Kesehatan</div>
                {{-- <div class="text-2xl font-bold text-blue-600 mb-1">Polindes: 1</div> --}}
                <ul class="list-disc ml-4 text-sm text-gray-600">
                    <li>Polindes: 1</li>
                </ul>
            </div>
        </div>
        {{-- Sarana Kesehatan --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('bidan.png') }}" alt="Bidan" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Sarana Kesehatan</div>
                {{-- <div class="text-gray-600 font-bold">Dukun bersalin terlatih: 1, Bidan: 1</div> --}}
                <ul class="list-disc ml-4 text-sm text-gray-600">
                    <li>Dukun bersalin terlatih: 1</li>
                    <li>Bidan: 1</li>
                </ul>
            </div>
        </div>
        {{-- Stunting --}}
        {{-- <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('stunting.png') }}" alt="Stunting" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Jumlah Stunting</div>
                <div class="text-1xl font-bold text-indigo-600 mb-1">11 anak</div>
            </div>
        </div> --}}
        {{-- Pamsimas --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('pamsimas.png') }}" alt="Pamsimas" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Jumlah Pamsimas</div>
                {{-- <div class="text-2xl font-bold text-blue-600 mb-1">3</div> --}}
                <ul class="list-disc ml-4 text-sm text-gray-600">
                    <li>Keburan 1</li>
                    <li>Blacanan 1</li>
                    <li>Blacanan 2</li>
                </ul>
            </div>
        </div>
        {{-- Bumdes --}}
        <div class="flex items-center bg-white rounded-lg shadow p-6">
            <img src="{{ asset('bumdes.png') }}" alt="Bumdes" class="w-16 h-16 mr-4">
            <div>
                <div class="font-bold text-lg mb-1">Badan Usaha Milik Desa</div>
                <div class="text-1xl font-bold text-indigo-600 mb-1">Bumdes Sumber Harapan</div>
            </div>
        </div>
    </div>
</div>
@endsection