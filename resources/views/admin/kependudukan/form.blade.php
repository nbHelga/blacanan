@extends('admin.layouts.layout')

@section('page_title', isset($kependudukan) ? 'Edit Data Kependudukan' : 'Tambah Data Kependudukan')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">
        {{ isset($kependudukan) ? 'Edit Data Kependudukan' : 'Tambah Data Kependudukan' }}
    </h2>

    <form action="{{ isset($kependudukan) ? route('admin.kependudukan.update', $kependudukan->id) : route('admin.kependudukan.store') }}" 
          method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($kependudukan))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
            <input type="text" name="nama" required
                   value="{{ old('nama', $kependudukan->nama ?? '') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                   placeholder="Contoh: Laki-laki">
            @error('nama')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
            <input type="number" name="jumlah" required min="0"
                   value="{{ old('jumlah', $kependudukan->jumlah ?? '') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jumlah') border-red-500 @enderror"
                   placeholder="0">
            @error('jumlah')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.kependudukan.index') }}"
               class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                Batal
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ isset($kependudukan) ? 'Update' : 'Simpan' }}
            </button>
        </div>
    </form>
</div>
@endsection
