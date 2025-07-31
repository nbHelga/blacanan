@extends('layouts.layout')
@section('page_title', 'Detail Budaya')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-3xl font-bold mb-4">{{ $budaya->nama ?? $budaya->judul }}</h1>
    <div class="flex items-center text-gray-500 mb-2">
        <span class="mr-4">Kategori: {{ $budaya->kategori ?? $budaya->subjudul }}</span>
        <span class="mr-4">Tanggal: {{ $budaya->created_at->format('d M Y') }}</span>
    </div>
    <div class="w-full h-64 bg-gray-200 rounded mb-6 overflow-hidden flex items-center justify-center">
        @if($budaya->gambar)
            <img src="{{ asset('storage/'.$budaya->gambar) }}" alt="{{ $budaya->nama ?? $budaya->judul }}" class="object-cover w-full h-full">
        @else
            <div class="text-gray-500">Tidak ada gambar</div>
        @endif
    </div>
    <div class="text-gray-700">{!! $budaya->deskripsi !!}</div>
</div>
@endsection