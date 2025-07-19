@extends('admin.layouts.layout')

@section('page_title', 'Manajemen Blog')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Blog</h2>
        <a href="{{ route('admin.blog.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Blog</a>
    </div>
    <x-TabelFleksibel
        :headers="['Kategori', 'Judul', 'Status', 'Tanggal']"
        :rows="$blogs->map(fn($b) => [
            'id' => $b->id,
            'kategori' => $b->kategori,
            'judul' => $b->judul,
            'status' => $b->status ? 'Aktif' : 'Nonaktif',
            'tanggal' => $b->created_at->format('d M Y'),
        ])"
        detailRouteName="admin.blog.detail"
    />
    <div class="mt-4">
        {{ $blogs->links('components.pagination') }}
    </div>
</div>
@endsection