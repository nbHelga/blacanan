@extends('admin.layouts.layout')

@section('page_title', 'Form UMKM')

@section('content')
<div x-data="{ showAdd: false }" class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form UMKM</h2>
    <form action="{{ isset($umkm) ? route('admin.umkm.update', $umkm->id) : route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($umkm))
            @method('PUT')
        @endif
        <x-JudulInput
            name="nama"
            label="Nama UMKM"
            :value="$umkm->nama ?? old('nama')"
        />
        <x-JudulInput
            name="kategori"
            label="Kategori"
            :value="$umkm->kategori ?? old('kategori')"
        />
        @component('components.DeskripsiEditor', ['value' => $umkm->deskripsi ?? old('deskripsi')])
        @endcomponent
        <x-GambarUpload :value="isset($umkm) && $umkm->gambar ? 'storage/' . $umkm->gambar : null" />
        <div class="flex justify-end">
            <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" @click="showAdd = false">Batal</button>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="showAdd = true">Simpan</button>
        </div>
        <x-confirm-dialog
            xShow="showAdd"
            type="{{ isset($umkm) ? 'edit' : 'add' }}"
            title="{{ isset($umkm) ? 'Konfirmasi Edit' : 'Konfirmasi Penambahan' }}"
            message="Apakah Anda yakin ingin {{ isset($umkm) ? 'mengedit' : 'menambahkan' }} UMKM ini?"
            onConfirm="document.querySelector('form').submit()"
            onCancel="showAdd = false"
        />
    </form>
</div>
@endsection