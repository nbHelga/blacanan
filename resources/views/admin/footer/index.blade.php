{{-- resources/views/admin/footer/index.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
@if(!$footer)
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
        Data footer belum tersedia. <a href="{{ route('admin.footer.edit') }}" class="text-blue-600 underline">Tambah Data</a>
    </div>
@else
<div class="bg-white rounded shadow p-6">
    <h3 class="font-bold mb-4">Footer Website</h3>
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
                        <button class="text-red-500" onclick="return confirm('Hapus kontak ini?')">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('admin.footer.edit') }}" class="btn btn-primary mt-4">Edit Footer</a>
</div>
@endif
@endsection