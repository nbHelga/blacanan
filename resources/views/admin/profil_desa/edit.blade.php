{{-- resources/views/admin/profil_desa/edit.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
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
        <label>Statistik Kependudukan (JSON)</label>
        <textarea name="statistik" class="form-input w-full" rows="4">{{ old('statistik', json_encode($profil->statistik)) }}</textarea>
    </div>
    <div>
        <label>Mutasi Antar Wilayah (JSON)</label>
        <textarea name="mutasi" class="form-input w-full" rows="4">{{ old('mutasi', json_encode($profil->mutasi)) }}</textarea>
    </div>
    <div>
        <label>Peta (gambar)</label>
        <input type="file" name="peta" class="form-input">
        @if($profil->peta)
            <img src="{{ asset('storage/'.$profil->peta) }}" class="w-40 mt-2">
        @endif
    </div>
    <div>
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
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection