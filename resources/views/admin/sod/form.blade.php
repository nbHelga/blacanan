@extends('admin.layouts.layout')

@section('page_title', 'Form Konten')

@section('content')
<div x-data="{ showAdd: false }" class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form Konten</h2>
    <form action="{{ isset($sod) ? route('admin.sod.update', $sod->id) : route('admin.sod.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($sod))
            @method('PUT')
        @endif
        <x-JudulInput
            name="nama"
            label="Nama"
            :value="$sod->nama ?? ''"
        />
        <x-JudulInput
            name="jabatan"
            label="Jabatan"
            :value="$sod->jabatan ?? ''"
        />
        @component('components.DeskripsiEditor', ['value' => $sod->deskripsi ?? old('deskripsi')])
        @endcomponent
        @component('components.GambarUpload', [
            'value' => isset($sod) && $sod->gambar ? 'storage/' . $sod->gambar : null
        ])
        @endcomponent
        <div class="flex justify-end">
            <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" @click="showAdd = false">Batal</button>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="showAdd = true">Simpan</button>
        </div>
        <x-confirm-dialog
            xShow="showAdd"
            type="{{ isset($sod) ? 'edit' : 'add' }}"
            title="{{ isset($sod) ? 'Konfirmasi Edit' : 'Konfirmasi Penambahan' }}"
            message="Apakah Anda yakin ingin {{ isset($sod) ? 'mengedit' : 'menambahkan' }} perangkat desa ini?"
            onConfirm="document.querySelector('form').submit()"
            onCancel="showAdd = false"
        />
    </form>
    <button type="button" @click="showAdd = true" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah</button>
    <x-confirm-dialog 
        :show="(bool) false"
        type="add"
        title="Konfirmasi Penambahan"
        message="Apakah Anda yakin untuk menambahkan Konten?"
        onConfirm="document.querySelector('form').submit()"
        onCancel="showAdd = false"
    />
    
</div>
@endsection