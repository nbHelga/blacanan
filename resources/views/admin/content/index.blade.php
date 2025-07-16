@extends('admin.layouts.layout')

@section('page_title', 'Manajemen Konten')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Konten</h2>
        <a href="content/create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Konten</a>
    </div>
    @php
    $headers = ['ID', 'Judul', 'Tanggal Dibuat'];
    $rows = $contents->map(function($content) {
        return [
            'id' => $content->id, // <- penting agar bisa dipakai di route
            'judul' => $content->judul,
            'tanggal' => $content->created_at->format('d-m-Y'),
            // 'detail_url' => route('admin.content.detail', $content->id) // <- detail URL
        ];
    });
@endphp
    <x-TabelFleksibel 
    :headers="['Judul', 'Status', 'Tanggal']"
    :rows="$contents->map(fn($c) => [
        'id' => $c->id,
        'judul' => $c->judul,
        'status' => $c->status ? 'Aktif' : 'Nonaktif',
        'tanggal' => $c->created_at->format('d M Y'),
    ])"
    detailRouteName="admin.content.detail"
    />
    <div class="mt-4">
        {{ $contents->links('components.pagination') }}
    </div>
    {{-- <x-Pagination :paginator="$contents" :perPage="$perPage"/> --}}
</div>
@endsection