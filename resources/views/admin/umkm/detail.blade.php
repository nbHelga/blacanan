@extends('admin.layouts.layout')

@section('page_title', 'Detail UMKM')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{ showEdit: false, showDelete: false, showToggle: false }">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Preview UMKM</h2>
        <div class="flex space-x-2">
            <form id="form-toggle" action="{{ route('admin.umkm.toggle', $umkm->id) }}" method="POST" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button"
                    @click="showToggle = true"
                    class="w-12 h-8 rounded-full flex items-center transition-colors duration-300 focus:outline-none
                        {{ $umkm->status ? 'bg-green-500' : 'bg-gray-500' }}">
                    <span class="inline-block w-6 h-6 bg-white rounded-full shadow transform ring-1 ring-gray-600
                        {{ $umkm->status ? 'translate-x-4' : '' }}"></span>
                </button>
            </form>
            <a href="{{ route('admin.umkm.edit', $umkm->id) }}"
                class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600 font-semibold border border-yellow-600">Edit</a>
            <form id="form-delete" action="{{ route('admin.umkm.delete', $umkm->id) }}" method="POST" class="inline" onsubmit="return false;">
                @csrf
                @method('DELETE')
                <button type="button" @click="showDelete = true"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 font-semibold">Delete</button>
            </form>
        </div>
    </div>

    <x-confirm-dialog
        xShow="showDelete"
        type="delete"
        title="Hapus UMKM"
        message="Apakah Anda yakin ingin menghapus UMKM ini?"
        onConfirm="document.querySelector('#form-delete').submit()"
        onCancel="showDelete = false"
    />
    <x-confirm-dialog
        xShow="showToggle"
        type="toggle"
        title="Ubah Status UMKM"
        message="Apakah Anda yakin ingin mengubah status UMKM ini?"
        onConfirm="document.querySelector('#form-toggle').submit()"
        onCancel="showToggle = false"
    />

    <h1 class="text-3xl font-bold mb-4">{{ $umkm->nama }}</h1>
    <div class="flex items-center text-gray-500 mb-2 space-x-4">
        <span>Kategori: {{ $umkm->kategori }}</span>
        <span>Tanggal: {{ $umkm->created_at->format('d M Y') }}</span>
        <span>Status: 
            <span class="font-semibold {{ $umkm->status ? 'text-green-600' : 'text-gray-400' }}">
                {{ $umkm->status ? 'Tampil di Home' : 'Tidak Tampil di Home' }}
            </span>
        </span>
    </div>
    <div class="relative w-full flex items-center justify-center overflow-hidden rounded mb-6">
            @if($umkm->gambar)
                <img src="{{ asset('storage/'.$umkm->gambar) }}" alt="{{ $umkm->nama }}" class="object-cover object-center w-auto h-48 max-h-60 rounded">
            @endif
        </div>
    <div class="text-gray-700">{!! $umkm->deskripsi !!}</div>
</div>
@endsection