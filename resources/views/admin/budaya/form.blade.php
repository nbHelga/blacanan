@extends('admin.layouts.layout')
@section('page_title', isset($budaya) ? 'Edit Budaya' : 'Tambah Budaya')
@section('content')

<div x-data="{ showAdd: false }" class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">{{ isset($budaya) ? 'Edit Budaya' : 'Tambah Budaya' }}</h2>

    <form method="POST" action="{{ isset($budaya) ? route('admin.budaya.update', $budaya->id) : route('admin.budaya.store') }}" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($budaya))
            @method('PUT')
        @endif

        <x-JudulInput name="nama" label="Nama Budaya" value="{{ old('nama', $budaya->nama ?? '') }}" />
        <x-JudulInput name="kategori" label="Kategori Budaya" value="{{ old('kategori', $budaya->kategori ?? '') }}" />

        @component('components.DeskripsiEditor', ['value' => $budaya->deskripsi ?? old('deskripsi')])
        @endcomponent

        <x-GambarUpload value="{{ isset($budaya) && $budaya->gambar ? $budaya->gambar : '' }}" />

        <div class="flex justify-end">
            <a href="{{ isset($budaya) ? route('admin.budaya.show', $budaya->id) : route('admin.budaya.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2 inline-block text-center">Batal</a>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="showAdd = true">{{ isset($budaya) ? 'Update' : 'Simpan' }}</button>
        </div>

        <x-confirm-dialog
            xShow="showAdd"
            type="{{ isset($budaya) ? 'edit' : 'add' }}"
            title="{{ isset($budaya) ? 'Konfirmasi Edit' : 'Konfirmasi Penambahan' }}"
            message="Apakah Anda yakin ingin {{ isset($budaya) ? 'mengedit' : 'menambahkan' }} budaya ini?"
            onConfirm="document.querySelector('form').submit()"
            onCancel="showAdd = false"
        />
    </form>
</div>


@endsection