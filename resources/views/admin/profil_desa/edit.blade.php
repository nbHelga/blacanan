{{-- resources/views/admin/profil_desa/edit.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
<div class="ml-8 mr-4"> {{-- Geser form ke kanan agar tidak tertutup sidebar --}}
<form action="{{ route('admin.profil_desa.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-input w-full">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
    </div>
    <div>
        <label>Visi</label>
        <textarea name="visi" class="form-input w-full">{{ old('visi', $profil->visi) }}</textarea>
    </div>
    <div>
        <label>Misi</label>
        <textarea name="misi" class="form-input w-full">{{ old('misi', $profil->misi) }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Statistik Kependudukan</label>
        <div class="space-y-3">
            @foreach($statistik as $stat)
                <div class="flex items-center space-x-4">
                    <label class="w-64 text-sm">{{ $stat->uraian }}</label>
                    <input type="number" name="statistik[{{ $stat->id }}][jumlah]"
                           value="{{ old('statistik.'.$stat->id.'.jumlah', $stat->jumlah) }}"
                           class="form-input w-24">
                    <span class="text-sm text-gray-500">{{ $stat->satuan }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Mutasi Antar Wilayah</label>
        <div class="space-y-3">
            @foreach($mutasi as $mut)
                <div class="flex items-center space-x-4">
                    <label class="w-32 text-sm">{{ $mut->wilayah }}</label>
                    <div class="flex space-x-2">
                        <div>
                            <label class="text-xs text-gray-500">Pindah L</label>
                            <input type="number" name="mutasi[{{ $mut->id }}][pindah_laki]"
                                   value="{{ old('mutasi.'.$mut->id.'.pindah_laki', $mut->pindah_laki) }}"
                                   class="form-input w-16">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500">Pindah P</label>
                            <input type="number" name="mutasi[{{ $mut->id }}][pindah_perempuan]"
                                   value="{{ old('mutasi.'.$mut->id.'.pindah_perempuan', $mut->pindah_perempuan) }}"
                                   class="form-input w-16">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500">Datang L</label>
                            <input type="number" name="mutasi[{{ $mut->id }}][datang_laki]"
                                   value="{{ old('mutasi.'.$mut->id.'.datang_laki', $mut->datang_laki) }}"
                                   class="form-input w-16">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500">Datang P</label>
                            <input type="number" name="mutasi[{{ $mut->id }}][datang_perempuan]"
                                   value="{{ old('mutasi.'.$mut->id.'.datang_perempuan', $mut->datang_perempuan) }}"
                                   class="form-input w-16">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <label>Peta (gambar)</label>
        <input type="file" name="peta" class="form-input">
        @if($profil->peta)
            <img src="{{ asset('storage/'.$profil->peta) }}" class="w-40 mt-2">
        @endif
    </div>
    {{-- <div>
        <label>Batas Wilayah (JSON)</label>
        <textarea name="batas" class="form-input w-full" rows="2">{{ old('batas', json_encode($profil->batas)) }}</textarea>
    </div>
    <div>
        <label>Luas</label>
        <input type="text" name="luas" class="form-input w-full" value="{{ old('luas', $profil->luas) }}">
    </div>
    <div>
        <label>Koordinat</label>
        <input type="text" name="koordinat" class="form-input w-full" value="{{ old('koordinat', $profil->koordinat) }}">
    </div> --}}
    <div class="flex gap-4">
        <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.profil_desa.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            Batal
        </a>
    </div>
</form>
</div> {{-- Tutup div ml-8 mr-4 --}}
@endsection