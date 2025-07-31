{{-- resources/views/admin/footer/index.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
@if(!$footer)
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
        Data footer belum tersedia.
        <a href="{{ route('admin.footer.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Data
        </a>
    </div>
@else
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold text-lg">Footer Website</h3>
        <a href="{{ route('admin.footer.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors shadow-md">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Footer
        </a>
    </div>
    <div><b>Deskripsi:</b> {{ $footer->deskripsi }}</div>
    <div><b>Alamat:</b> {{ $footer->alamat }}</div>
    <div><b>Maps:</b> {!! $footer->maps !!}</div>
    <div class="mt-4">
        <b>Kontak:</b>
        <ul>
            @foreach($footer->kontak as $kontak)
                <li>{{ $kontak->label ?? $kontak->tipe }}: {{ $kontak->value }}
                    <form action="{{ route('admin.footer.kontak.delete', $kontak->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Hapus kontak ini?')">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endsection