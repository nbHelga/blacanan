@extends('admin.layouts.layout')

@section('page_title', 'Form Konten')

@section('content')
<div x-data="{ tipe: '{{ old('tipe', $content->tipe ?? 'gambar') }}', showAdd: false }" class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form Konten</h2>
    <form action="{{ isset($content) ? route('admin.content.update', $content->id) : route('admin.content.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($content))
            @method('PUT')
        @endif
        <x-JudulInput
            name="judul"
            label="Judul"
            :value="$content->judul ?? ''"
        />
        @component('components.DeskripsiEditor', ['value' => $content->deskripsi ?? old('deskripsi')])
        @endcomponent
        {{-- @component('components.GambarUpload', [
        'value' => isset($content) && $content->gambar ? 'storage/' . $content->gambar : null
        ])
        @endcomponent --}}
        <div class="mb-4">
            <label class="block font-semibold mb-2">Tipe Konten</label>
            <select name="tipe" x-model="tipe" class="border rounded px-3 py-2">
                <option value="gambar">Gambar</option>
                <option value="video">Video</option>
            </select>
        </div>
        <x-ImgVidUpload :value="isset($content) && $content->gambar ? 'storage/' . $content->gambar : null" :tipe="old('tipe', $content->tipe ?? 'gambar')" />
        {{-- <template x-if="tipe === 'gambar'">
            <div>
                <x-GambarUpload :value="isset($content) && $content->gambar ? 'storage/'.$content->gambar : null" />
            </div>
        </template>
        <template x-if="tipe === 'video'">
            <div>
                <label class="block font-semibold mb-2">Upload Video (mp4/webm, max 5 menit)</label>
                <input type="file" name="video" accept="video/mp4,video/webm" class="block w-full border rounded">
                @if(isset($content) && $content->video)
                    <video src="{{ asset('storage/'.$content->video) }}" controls class="w-64 mt-2"></video>
                @endif
            </div>
        </template> --}}
        <div class="flex justify-end">
            <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" @click="showAdd = false">Batal</button>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="showAdd = true">Simpan</button>
        </div>
        <x-confirm-dialog
            xShow="showAdd"
            type="{{ isset($content) ? 'edit' : 'add' }}"
            title="{{ isset($content) ? 'Konfirmasi Edit' : 'Konfirmasi Penambahan' }}"
            message="Apakah Anda yakin ingin {{ isset($content) ? 'mengedit' : 'menambahkan' }} Konten ini?"
            onConfirm="document.querySelector('form').submit()"
            onCancel="showAdd = false"
        />
    </form>
    {{-- <button type="button" @click="showAdd = true" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah</button> --}}
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