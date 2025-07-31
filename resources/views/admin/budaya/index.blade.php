@extends('admin.layouts.layout')
@section('page_title', 'Daftar Budaya')
@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Budaya</h2>
        <a href="{{ route('admin.budaya.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Budaya</a>
    </div>
    {{-- <x-TabelFleksibel 
        :data="$budayas"
        :columns="[
            ['label' => 'Nama', 'field' => 'nama'],
            ['label' => 'Kategori', 'field' => 'kategori'],
            ['label' => 'Tanggal Dibuat', 'field' => 'created_at', 'format' => 'date'],
            ['label' => 'Aksi', 'field' => 'aksi']
        ]"
    >
        @foreach($budayas as $budaya)
            <tr>
                <td>{{ $budaya->nama }}</td>
                <td>{{ $budaya->kategori }}</td>
                <td>{{ $budaya->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.budaya.show', $budaya) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
        @endforeach
    </x-TabelFleksibel> --}}
    <x-TabelFleksibel
        :headers="['Kategori', 'Nama', 'Status', 'Tanggal']"
        :rows="$budayas->map(fn($b) => [
            'id' => $b->id,
            'kategori' => $b->kategori,
            'nama' => $b->nama,
            'status' => $b->status ? 'Aktif' : 'Nonaktif',
            'tanggal' => $b->created_at->format('d M Y'),
        ])"
        detailRouteName="admin.budaya.show"
    />

    <div class="mt-4">
        {{ $budayas->links('components.pagination') }}
    </div>
</div>
@endsection