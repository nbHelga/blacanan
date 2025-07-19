@extends('layouts.layout')
@section('content')
<div class="px-6 pt-4 md:px-12 lg:px-20">
    <h1 class="text-3xl font-bold mb-4 pt-4">Struktur Organisasi Desa</h1>
    <h2 class="text-[16px] font-medium mb-6">Berikut adalah informasi mengenai struktur organisasi desa</h2>
    <div class="flex justify-center mb-8">
        <img src="{{ asset('bagan.jpg') }}" alt="Bagan Struktur Organisasi" class="max-w-6xl w-full rounded shadow">
    </div>
    <h2 class="text-2xl font-medium mb-6">Perangkat Desa</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($sods as $sod)
        <div class="bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center border border-green-400">
            <div class="w-36 h-36 rounded-full bg-white flex items-center justify-center mb-4 overflow-hidden border-4 border-green-400">
                <img src="{{ 'storage/'.$sod->gambar }}" alt="{{ $sod->nama }}" class="object-cover w-25 h-25 rounded-full">
            </div>
            {{-- <p class="text-gray-300 text-center mb-4"> {{ limit_words($umkm->deskripsi, 50) }}</p> --}}
            <div class="font-bold text-white text-lg">{{ $sod->nama }}</div>
            <div class="text-green-400 text-sm font-semibold">{{ $sod->jabatan }}</div>
        </div>
        @endforeach
    </div>
</div>
@endsection