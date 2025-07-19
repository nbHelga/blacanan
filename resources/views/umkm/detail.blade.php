@extends('layouts.layout')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-3xl font-bold mb-4">{{ $umkm->nama }}</h1>
    <div class="flex items-center text-gray-500 mb-2">
        <span class="mr-4">Kategori: {{ $umkm->kategori }}</span>
        <span class="mr-4">Tanggal: {{ $umkm->created_at->format('d M Y') }}</span>
    </div>
    <div class="w-full h-full bg-gray-200 rounded mb-6 overflow-hidden flex items-center justify-center">
        <img src="{{ asset('storage/'.$umkm->gambar) }}" alt="{{ $umkm->nama }}" class="object-cover w-full h-full">
    </div>
    <div class="text-gray-700">{!! $umkm->deskripsi !!}</div>
    <div class="pt-8">
        <h3 class="font-semibold mb-2">Kontak UMKM:</h3>
        @if($umkm->kontak)
            @foreach(json_decode($umkm->kontak, true) as $kontak)
                <div class="mb-1">
                    <a href="{{ $kontak }}" target="_blank" class="text-blue-600 hover:underline">{{ $kontak }}</a>
                </div>
            @endforeach
        @else
            <span class="text-gray-400">Tidak ada kontak.</span>
        @endif
    </div>
</div>
@endsection