@extends('admin.layouts.layout')

@section('page_title', 'Detail Blog')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{
         showEdit: false,
         showDelete: false,
         showToggle: false,
         currentImageIndex: 0,
         images: {{ json_encode($blog->images->pluck('gambar')->toArray()) }},
         nextImage() {
             if (this.images.length > 1) {
                 this.currentImageIndex = (this.currentImageIndex + 1) % this.images.length;
             }
         },
         prevImage() {
             if (this.images.length > 1) {
                 this.currentImageIndex = this.currentImageIndex === 0 ? this.images.length - 1 : this.currentImageIndex - 1;
             }
         }
     }">

    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
            <h2 class="text-2xl font-bold text-blue-700">Preview Blog</h2>
        </div>
        <div class="flex space-x-2">
            <form id="form-toggle" action="{{ route('admin.blog.toggle', $blog->id) }}" method="POST" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button"
                    @click="showToggle = true"
                    class="w-12 h-8 rounded-full flex items-center transition-colors duration-300 focus:outline-none
                        {{ $blog->status ? 'bg-green-500' : 'bg-gray-500' }}">
                    <span class="inline-block w-6 h-6 bg-white rounded-full shadow transform ring-1 ring-gray-600
                        {{ $blog->status ? 'translate-x-4' : '' }}"></span>
                </button>
            </form>
            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600 font-semibold border border-yellow-600">Edit</a>
            <form id="form-delete" action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" class="inline" onsubmit="return false;">
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
        title="Hapus Blog"
        message="Apakah Anda yakin ingin menghapus Blog ini?"
        onConfirm="document.querySelector('#form-delete').submit()"
        onCancel="showDelete = false"
    />
    <x-confirm-dialog
        xShow="showToggle"
        type="toggle"
        title="Ubah Status Blog"
        message="Apakah Anda yakin ingin mengubah status Blog ini?"
        onConfirm="document.querySelector('#form-toggle').submit()"
        onCancel="showToggle = false"
    />

    <h1 class="text-3xl font-bold mb-4">{{ $blog->judul }}</h1>
    <div class="flex items-center text-gray-500 mb-2 space-x-4">
        <span>Kategori: {{ $blog->kategori }}</span>
        <span>Tanggal: {{ $blog->created_at->format('d M Y') }}</span>
        <span>Status: 
            <span class="font-semibold {{ $blog->status ? 'text-green-600' : 'text-gray-400' }}">
                {{ $blog->status ? 'Tampil di Home' : 'Tidak Tampil di Home' }}
            </span>
        </span>
    </div>
    <div class="relative w-full flex items-center justify-center overflow-hidden rounded mb-6 group">
        @if($blog->images->count() > 0)
            <!-- Image slider -->
            <div class="relative w-full h-64">
                <template x-for="(image, index) in images" :key="index">
                    <img :src="'{{ asset('storage/') }}/' + image"
                         :alt="'{{ $blog->judul }}'"
                         x-show="currentImageIndex === index"
                         class="absolute inset-0 w-full h-full object-cover rounded transition-opacity duration-300">
                </template>

                <!-- Navigation arrows (only show if more than 1 image) -->
                <template x-if="images.length > 1">
                    <div>
                        <button @click="prevImage()"
                                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 shadow hover:bg-opacity-100 transition-all duration-300 opacity-0 group-hover:opacity-100">
                            <img src="{{ asset('arrow-right.png') }}" alt="Previous" class="w-4 h-4 rotate-180">
                        </button>
                        <button @click="nextImage()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 shadow hover:bg-opacity-100 transition-all duration-300 opacity-0 group-hover:opacity-100">
                            <img src="{{ asset('arrow-right.png') }}" alt="Next" class="w-4 h-4">
                        </button>
                    </div>
                </template>

                <!-- Image counter (only show if more than 1 image) -->
                <template x-if="images.length > 1">
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                        <span x-text="currentImageIndex + 1"></span> / <span x-text="images.length"></span>
                    </div>
                </template>
            </div>
        @elseif($blog->gambar)
            <!-- Fallback to old single image -->
            <img src="{{ asset('storage/'.$blog->gambar) }}" alt="{{ $blog->judul }}" class="object-cover object-center w-auto h-48 max-h-60 rounded">
        @else
            <div class="w-full h-64 bg-gray-200 rounded flex items-center justify-center">
                <span class="text-gray-500">Tidak ada gambar</span>
            </div>
        @endif
    </div>
    <div class="text-gray-700">{!! $blog->deskripsi !!}</div>
</div>
@endsection