@extends('layouts.layout')
@section('page_title', 'Detail Blog')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{
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
    <h1 class="text-3xl font-bold mb-4">{{ $blog->judul }}</h1>
    <div class="flex items-center text-gray-500 mb-2">
        <span class="mr-4">Kategori: {{ $blog->kategori }}</span>
        <span class="mr-4">Tanggal: {{ $blog->created_at->format('d M Y') }}</span>
    </div>
    <div class="relative w-full h-64 bg-gray-200 rounded mb-6 overflow-hidden group">
        @if($blog->images->count() > 0)
            <!-- Image slider -->
            <div class="relative w-full h-full">
                <template x-for="(image, index) in images" :key="index">
                    <img :src="'{{ asset('storage/') }}/' + image"
                         :alt="'{{ $blog->judul }}'"
                         x-show="currentImageIndex === index"
                         class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300">
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
            <img src="{{ asset('storage/'.$blog->gambar) }}" alt="{{ $blog->judul }}" class="object-cover w-full h-full">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gray-300">
                <span class="text-gray-500">No Image</span>
            </div>
        @endif
    </div>
    <div class="text-gray-700">{!! $blog->deskripsi !!}</div>
</div>
@endsection