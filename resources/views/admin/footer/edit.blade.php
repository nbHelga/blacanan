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
        <label class="block text-sm font-medium text-gray-700 mb-2">Link Google Maps</label>
        <input type="url" name="maps_link" class="form-input w-full mb-2"
               value="{{ old('maps_link', $footer->maps_link ?? '') }}"
               placeholder="https://maps.google.com/...">
        <small class="text-gray-500">Masukkan link Google Maps. Sistem akan otomatis mengubahnya menjadi embed code.</small>

        @if($footer->maps)
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Preview Maps</label>
                <div class="w-full h-32 border rounded">
                    {!! $footer->maps !!}
                </div>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<div class="mt-8" x-data="{
    showAddForm: false,
    editingKontak: null,
    editForm: { id: '', tipe: '', label: '', value: '', gambar: null },
    async editKontak(id) {
        try {
            const response = await fetch(`/admin/footer/kontak/${id}/edit`);
            const data = await response.json();
            this.editForm = { ...data, gambar: null };
            this.editingKontak = id;
        } catch (error) {
            console.error('Error fetching kontak data:', error);
        }
    },
    cancelEdit() {
        this.editingKontak = null;
        this.editForm = { id: '', tipe: '', label: '', value: '', gambar: null };
    }
}">
    <h4 class="font-bold mb-4">Kontak yang Ada</h4>
    @if($footer && $footer->kontak && count($footer->kontak) > 0)
        <div class="space-y-3 mb-6">
            @foreach($footer->kontak as $kontak)
                <div class="bg-gray-100 p-4 rounded-lg">
                    <template x-if="editingKontak !== {{ $kontak->id }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                @if($kontak->gambar)
                                    <img src="{{ asset('storage/'.$kontak->gambar) }}" alt="Logo" class="w-8 h-8 object-cover rounded">
                                @endif
                                <div>
                                    <span class="font-medium">{{ ucfirst($kontak->tipe) }}</span>
                                    @if($kontak->label)
                                        <span class="text-gray-600">({{ $kontak->label }})</span>
                                    @endif
                                    <span class="text-gray-800">: {{ $kontak->display_name }}</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button @click="editKontak({{ $kontak->id }})" class="text-blue-600 hover:text-blue-800">
                                    Edit
                                </button>
                                <form action="{{ route('admin.footer.kontak.delete', $kontak->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Hapus kontak ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </template>

                    <template x-if="editingKontak === {{ $kontak->id }}">
                        <form action="{{ route('admin.footer.kontak.update', $kontak->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-3">
                                <select x-model="editForm.tipe" name="tipe" class="form-input">
                                    <option value="email">Email</option>
                                    <option value="phone">No. HP</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                                <input x-model="editForm.label" type="text" name="label" class="form-input" placeholder="Label (opsional)">
                            </div>
                            <input x-model="editForm.value" type="text" name="value" class="form-input w-full" placeholder="Isi kontak" required>
                            <input type="file" name="gambar" accept="image/*" class="form-input w-full">
                            <div class="flex space-x-2">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" @click="cancelEdit()" class="btn btn-secondary">Batal</button>
                            </div>
                        </form>
                    </template>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 mb-4">Belum ada kontak yang ditambahkan.</p>
    @endif

    <div class="border-t pt-6">
        <div class="flex justify-between items-center mb-4">
            <h4 class="font-bold">Tambah Kontak Baru</h4>
            <button @click="showAddForm = !showAddForm" class="btn btn-primary">
                <span x-text="showAddForm ? 'Tutup Form' : 'Tambah Kontak'"></span>
            </button>
        </div>

        <template x-if="showAddForm">
            <form action="{{ route('admin.footer.kontak.add') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-blue-50 p-4 rounded-lg">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <select name="tipe" class="form-input">
                        <option value="email">Email</option>
                        <option value="phone">No. HP</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="twitter">Twitter</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="label" class="form-input" placeholder="Label (opsional)">
                </div>
                <input type="text" name="value" class="form-input w-full" placeholder="Isi kontak (URL atau teks)" required>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo/Icon (opsional)</label>
                    <input type="file" name="gambar" accept="image/*" class="form-input w-full">
                    <p class="text-xs text-gray-500 mt-1">Upload logo atau icon untuk kontak ini</p>
                </div>
                <button type="submit" class="btn btn-success w-full">Tambah Kontak</button>
            </form>
        </template>
    </div>
</div>
@endsection