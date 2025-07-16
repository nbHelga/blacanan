@extends('admin.layouts.layout')

@section('page_title', 'Manajemen UMKM')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen UMKM</h2>
        <a href="{{ route('admin.umkm.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah UMKM</a>
    </div>
    <x-TabelFleksibel 
        :headers="['Nama', 'Kategori', 'Status', 'Tanggal']"
        :rows="$umkms->map(fn($u) => [
            'id' => $u->id,
            'nama' => $u->nama,
            'kategori' => $u->kategori,
            'status' => $u->status ? 'Aktif' : 'Nonaktif',
            'tanggal' => $u->created_at->format('d M Y'),
        ])"
        detailRouteName="admin.umkm.detail"
    />
    <div class="mt-4">
        {{ $umkms->links('components.pagination') }}
    </div>
    {{-- <x-Pagination :paginator="$umkms" :perPage="$perPage"/> --}}
</div>
@endsection