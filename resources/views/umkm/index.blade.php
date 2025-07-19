@extends('layouts.layout')
@section('content')
<div class="px-6 pt-4 md:px-12 lg:px-20"> {{-- Tambahkan wrapper dengan padding horizontal --}}
    <h1 class="text-3xl font-bold mt-4 mb-8">Daftar UMKM</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($umkms as $umkm)
        <a href="{{ url('umkm/detail/'.$umkm->id) }}" class="flex bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
            <div class="w-48 h-65 flex-shrink-0 bg-gray-200 flex items-center justify-center">
                <img src="{{ asset('storage/'. $umkm->gambar) }}" alt="{{ $umkm->judul }}" class="object-cover w-full h-full">
            </div>
            <div class="p-6 flex flex-col justify-between">
                <div>
                    <div class="text-sm text-gray-500 mb-1">Kategori: {{ $umkm->kategori}}</div>
                    <div class="text-xl font-bold text-gray-900 mb-2">{{ $umkm->nama }}</div>
                    <div class="text-gray-600 line-clamp-3">{{ Str::limit(strip_tags($umkm->deskripsi), 120, '...') }}</div>
                </div>
                <div class="text-xs text-gray-400 mt-4">Tanggal: {{ $umkm->created_at->format('d M Y') }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
