@extends('admin.layouts.layout')

@section('page_title', 'Detail Konten')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{ showEdit: false, showDelete: false, showToggle: false }">

    {{-- Tombol Aksi --}}
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.content.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
            <h2 class="text-2xl font-bold text-blue-700">Preview Konten</h2>
        </div>
        <div class="flex space-x-2">
            {{-- Toggle Status --}}
            <form id="form-toggle" action="{{ route('admin.content.toggle', $content->id) }}" method="POST" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button"
                    @click="showToggle = true"
                    class="w-12 h-8 rounded-full flex items-center transition-colors duration-300 focus:outline-none
                        {{ $content->status ? 'bg-green-500' : 'bg-gray-800' }}">
                    <span class="inline-block w-6 h-6 bg-white rounded-full shadow transform ring-1 ring-gray-600
                        {{ $content->status ? 'translate-x-4' : '' }}"></span>
                </button>
            </form>
            {{-- Edit --}}
            <a href="{{ route('admin.content.edit', $content->id) }}"
                class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600 font-semibold border border-yellow-600">Edit</a> 
            {{-- Delete --}}
            <form id="form-delete" action="{{ route('admin.content.delete', $content->id) }}" method="POST" class="inline" onsubmit="return false;">
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
        title="Hapus Konten"
        message="Apakah Anda yakin ingin menghapus konten ini?"
        onConfirm="document.querySelector('#form-delete').submit()"
        onCancel="showDelete = false"
    />

    {{-- <x-confirm-dialog
        xShow="showEdit"
        type="edit"
        title="Edit Konten"
        message="Apakah Anda ingin mengedit konten ini?"
        onConfirm="window.location.href='{{ route('admin.content.edit', $content->id) }}'"
        onCancel="showEdit = false"
    /> --}}

    <x-confirm-dialog
        xShow="showToggle"
        type="toggle"
        title="Ubah Status Konten"
        message="Apakah Anda yakin ingin mengubah status konten ini?"
        onConfirm="document.querySelector('#form-toggle').submit()"
        onCancel="showToggle = false"
    />

    {{-- Isi Konten --}}
    <h1 class="text-3xl font-bold mb-4">{{ $content->judul }}</h1>
    <div class="flex items-center text-gray-500 mb-2 space-x-4">
        <span>Tanggal: {{ $content->created_at->format('d M Y') }}</span>
        <span>Status: 
            <span class="font-semibold {{ $content->status ? 'text-green-600' : 'text-gray-400' }}">
                {{ $content->status ? 'Tampil di Home' : 'Tidak Tampil di Home' }}
            </span>
        </span>
    </div>
    <div class="relative w-full flex items-center justify-center overflow-hidden rounded mb-6">
        @if($content->gambar)
            <img src="{{ asset('storage/'.$content->gambar) }}" alt="{{ $content->nama }}" class="object-cover object-center w-auto h-48 max-h-60 rounded">
        @endif
        @if($content->video)
            <video src="{{ asset('storage/'.$content->video) }}" controls class="w-auto h-48 max-h-60 rounded"></video>
        @endif
    </div>
    <div class="text-gray-700">{!! $content->deskripsi !!}</div>
</div>
@endsection
