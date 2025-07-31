@extends('layouts.layout')
@section('page_title', 'Detail SOD')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-3xl font-bold mb-4">{{ $sod->nama }}</h1>
    <div class="flex items-center text-gray-500 mb-2">
        <span class="mr-4">Jabatan: {{ $sod->jabatan }}</span>
        <span class="mr-4">Tanggal: {{ $sod->created_at->format('d M Y') }}</span>
    </div>
    <div class="w-full h-64 bg-gray-200 rounded mb-6 overflow-hidden flex items-center justify-center">
        @if($sod->gambar)
            <img src="{{ asset('storage/'.$sod->gambar) }}" alt="{{ $sod->nama }}" class="object-cover w-full h-full">
        @else
            <div class="text-gray-500">Tidak ada foto</div>
        @endif
    </div>
    <div class="text-gray-700">{!! $sod->deskripsi !!}</div>
</div>
@endsection
