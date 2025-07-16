{{-- resources/views/admin/footer/edit.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
<form action="{{ route('admin.footer.update') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-input w-full">{{ old('deskripsi', $footer->deskripsi) }}</textarea>
    </div>
    <div>
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-input w-full" value="{{ old('alamat', $footer->alamat) }}">
    </div>
    <div>
        <label>Embed Maps (iframe)</label>
        <textarea name="maps" class="form-input w-full">{{ old('maps', $footer->maps) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<div class="mt-8">
    <h4 class="font-bold mb-2">Tambah Kontak</h4>
    <form action="{{ route('admin.footer.kontak.add') }}" method="POST" class="flex space-x-2">
        @csrf
        <select name="tipe" class="form-input">
            <option value="email">Email</option>
            <option value="phone">No. HP</option>
            <option value="facebook">Facebook</option>
            <option value="instagram">Instagram</option>
            <option value="lainnya">Lainnya</option>
        </select>
        <input type="text" name="label" class="form-input" placeholder="Label (opsional)">
        <input type="text" name="value" class="form-input" placeholder="Isi kontak" required>
        <button type="submit" class="btn btn-success">Tambah</button>
    </form>
</div>
@endsection