@extends('admin.layouts.layout')

@section('page_title', 'Form Blog')

@section('content')
<div x-data="{ showAdd: false }" class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form Blog</h2>
    <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($blog))
            @method('PUT')
        @endif
        <x-JudulInput
            name="judul"
            label="Judul"
            :value="$blog->judul ?? old('judul')"
        />
        <x-JudulInput
            name="kategori"
            label="Kategori"
            :value="$blog->kategori ?? old('kategori')"
        />
        @component('components.DeskripsiEditor', ['value' => $blog->deskripsi ?? old('deskripsi')])
        @endcomponent
        {{-- @component('components.MultipleGambarUpload', [
            'images' => isset($blog) ? $blog->images : []
        ])
        @endcomponent --}}
        {{-- <x-MultipleImageUpload :value="$images" /> --}}
        @component('components.MultipleImageUpload', ['value' => $images])
        @endcomponent
        <div class="flex justify-end">
            <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" @click="showAdd = false">Batal</button>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="showAdd = true">Simpan</button>
        </div>
        <x-confirm-dialog
            xShow="showAdd"
            type="{{ isset($blog) ? 'edit' : 'add' }}"
            title="{{ isset($blog) ? 'Konfirmasi Edit' : 'Konfirmasi Penambahan' }}"
            message="Apakah Anda yakin ingin {{ isset($blog) ? 'mengedit' : 'menambahkan' }} Blog ini?"
            onConfirm="document.querySelector('form').submit()"
            onCancel="showAdd = false"
        />
    </form>
</div>
@endsection