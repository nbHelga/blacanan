{{-- resources/views/admin/profil_desa/index.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
@if(!$profil)
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
        Data profil desa belum tersedia.
        <a href="{{ route('admin.profil_desa.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Data
        </a>
    </div>
@else
<div class="mb-6">
    <a href="{{ route('admin.profil_desa.edit') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors shadow-md">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        Edit Profil Desa
    </a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Deskripsi</h3>
        <div>{{ $profil->deskripsi }}</div>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Visi</h3>
        <div>{{ $profil->visi }}</div>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Misi</h3>
        <div>{!! nl2br(e($profil->misi)) !!}</div>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Statistik Kependudukan</h3>
        <div class="space-y-1 text-sm">
            @foreach($statistik as $stat)
                <div>{{ $stat->uraian }}: {{ $stat->jumlah }} {{ $stat->satuan }}</div>
            @endforeach
        </div>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Mutasi Antar Wilayah</h3>
        <div class="space-y-1 text-sm">
            @foreach($mutasi as $mut)
                <div>{{ $mut->wilayah }}: Pindah L/P: {{ $mut->pindah_laki }}/{{ $mut->pindah_perempuan }}, Datang L/P: {{ $mut->datang_laki }}/{{ $mut->datang_perempuan }}</div>
            @endforeach
        </div>
    </div>
    {{-- <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold mb-2">Peta & Batas Wilayah</h3>
        <img src="{{ $profil->peta ? asset('storage/'.$profil->peta) : '' }}" class="w-40 mb-2">
        <div>Batas: {{ json_encode($profil->batas) }}</div>
        <div>Luas: {{ $profil->luas }}</div>
        <div>Koordinat: {{ $profil->koordinat }}</div>
        <a href="{{ route('admin.profil_desa.edit') }}" class="text-blue-600">Edit</a>
    </div> --}}
</div>
@endif
@endsection