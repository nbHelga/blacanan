@extends('admin.layouts.layout')

@section('page_title', 'Detail Konten')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{ showEdit: false, showDelete: false, showToggle: false }">

    {{-- Tombol Aksi --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Preview Konten</h2>
        <div class="flex space-x-2">
            {{-- Toggle Status --}}
            <form id="form-toggle" action="{{ route('admin.sod.toggle', $sod->id) }}" method="POST" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button"
                    @click="showToggle = true"
                    class="w-12 h-8 rounded-full flex items-center transition-colors duration-300 focus:outline-none
                        {{ $sod->status ? 'bg-green-500' : 'bg-gray-500' }}">
                    <span class="inline-block w-6 h-6 bg-white rounded-full shadow transform ring-1 ring-gray-600
                        {{ $sod->status ? 'translate-x-4' : '' }}"></span>
                </button>
            </form>
            {{-- Edit --}}
            <a href="{{ route('admin.sod.edit', $sod->id) }}"
                class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600 font-semibold border border-yellow-600">Edit</a> 
            {{-- Delete --}}
            <form id="form-delete" action="{{ route('admin.sod.delete', $sod->id) }}" method="POST" class="inline" onsubmit="return false;">
                @csrf
                @method('DELETE')
                <button type="button" @click="showDelete = true"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 font-semibold">Delete</button>
            </form>
        </div>
    </div>

    {{-- Dialog Konfirmasi --}}
    <x-confirm-dialog
        xShow="showDelete"
        type="delete"
        title="Hapus SOD"
        message="Apakah Anda yakin ingin menghapus perangkat desa ini?"
        onConfirm="document.querySelector('#form-delete').submit()"
        onCancel="showDelete = false"
    />

    {{-- <x-confirm-dialog
        xShow="showEdit"
        type="edit"
        title="Edit SOD"
        message="Apakah Anda ingin mengedit perangkat desa ini?"
        onConfirm="window.location.href='{{ route('admin.sod.edit', $sod->id) }}'"
        onCancel="showEdit = false"
    /> --}}

    <x-confirm-dialog
        xShow="showToggle"
        type="toggle"
        title="Ubah Status Konten"
        message="Apakah Anda yakin ingin mengubah status perangkat desa ini?"
        onConfirm="document.querySelector('#form-toggle').submit()"
        onCancel="showToggle = false"
    />

    {{-- Isi Konten --}}
    <h1 class="text-3xl font-bold mb-4">{{ $sod->judul }}</h1>
    <div class="flex items-center text-gray-500 mb-2 space-x-4">
        <span>Tanggal: {{ $sod->created_at->format('d M Y') }}</span>
        <span>Status: 
            <span class="font-semibold {{ $sod->status ? 'text-green-600' : 'text-gray-400' }}">
                {{ $sod->status ? 'Tampil di Home' : 'Tidak Tampil di Home' }}
            </span>
        </span>
    </div>
    <div class="relative w-full flex items-center justify-center overflow-hidden rounded mb-6">
        @if($sod->gambar)
            <img src="{{ asset('storage/'.$sod->gambar) }}" alt="{{ $sod->nama }}" class="object-cover object-center w-auto h-48 max-h-60 rounded">
        @endif
    </div>
    <div class="text-gray-700">{!! $sod->deskripsi !!}</div>
</div>
@endsection
