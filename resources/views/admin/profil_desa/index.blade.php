{{-- resources/views/admin/profil_desa/index.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
@if(!$profil)
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
        Data profil desa belum tersedia. <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600 underline">Tambah Data</a>
    </div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Deskripsi</h3>
        <div>{{ $profil->deskripsi }}</div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Visi</h3>
        <div>{{ $profil->visi }}</div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Misi</h3>
        <div>{!! nl2br(e($profil->misi)) !!}</div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Statistik Kependudukan</h3>
        <div class="space-y-1 text-sm">
            @foreach($statistik as $stat)
                <div>{{ $stat->uraian }}: {{ $stat->jumlah }} {{ $stat->satuan }}</div>
            @endforeach
        </div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Mutasi Antar Wilayah</h3>
        <div class="space-y-1 text-sm">
            @foreach($mutasi as $mut)
                <div>{{ $mut->wilayah }}: Pindah L/P: {{ $mut->pindah_laki }}/{{ $mut->pindah_perempuan }}, Datang L/P: {{ $mut->datang_laki }}/{{ $mut->datang_perempuan }}</div>
            @endforeach
        </div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Peta & Batas Wilayah</h3>
        <img src="{{ $profil->peta ? asset('storage/'.$profil->peta) : '' }}" class="w-40 mb-2">
        <div>Batas: {{ json_encode($profil->batas) }}</div>
        <div>Luas: {{ $profil->luas }}</div>
        <div>Koordinat: {{ $profil->koordinat }}</div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div>
</div>
@endif
@endsection