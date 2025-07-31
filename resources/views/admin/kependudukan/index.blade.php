@extends('admin.layouts.layout')

@section('page_title', 'Manajemen Data Kependudukan')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Data Kependudukan</h2>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.kependudukan.updateAll') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kependudukans as $kependudukan)
            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                <input type="hidden" name="kependudukan[{{ $kependudukan->id }}][id]" value="{{ $kependudukan->id }}">

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text"
                           name="kependudukan[{{ $kependudukan->id }}][nama]"
                           value="{{ $kependudukan->nama }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-600"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                    <input type="number"
                           name="kependudukan[{{ $kependudukan->id }}][jumlah]"
                           value="{{ $kependudukan->jumlah }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           min="0">
                </div>

                <div class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">ID: {{ $kependudukan->id }}</div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                💾 Simpan Semua Perubahan
            </button>
        </div>
    </form>

</div>
@endsection
