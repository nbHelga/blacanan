{{-- resources/views/admin/footer/edit.blade.php --}}
@extends('admin.layouts.layout')
@section('content')
<div class="ml-8 mr-4"> {{-- Geser form ke kanan agar tidak tertutup sidebar --}}
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
        <label class="block text-sm font-medium text-gray-700 mb-2">Embed Code Google Maps</label>
        <textarea name="maps" class="form-input w-full mb-2" rows="4"
                  placeholder="Masukkan iframe embed code dari Google Maps">{{ old('maps', $footer->maps ?? '') }}</textarea>
        <small class="text-gray-500">Masukkan iframe embed code dari Google Maps. Contoh: &lt;iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450"...&gt;&lt;/iframe&gt;</small>

        @if($footer->maps)
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Preview Maps</label>
                <div class="w-full h-32 border rounded overflow-hidden">
                    <div class="w-full h-full">
                        {!! str_replace(['width="600"', 'height="450"'], ['width="100%"', 'height="128"'], $footer->maps) !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="flex gap-4">
        <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Simpan Footer
        </button>
        <a href="{{ route('admin.footer.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            Batal
        </a>
    </div>
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
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors shadow-md">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update
                                </button>
                                <button type="button" @click="cancelEdit()" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors shadow-md">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </button>
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
</div> {{-- Tutup div ml-8 mr-4 --}}
@endsection