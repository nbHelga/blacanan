@include('layouts.headerbar')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form UMKM</h2>
    <form action="{{ isset($umkm) ? url('/admin/umkm/update/'.$umkm->id) : url('/admin/umkm/store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($umkm))
            @method('PUT')
        @endif
        @component('components.JudulInput', ['value' => $umkm->nama ?? old('nama'), 'label' => 'Nama UMKM', 'name' => 'nama'])
        @endcomponent
        @component('components.JudulInput', ['value' => $umkm->jenis ?? old('jenis'), 'label' => 'Jenis', 'name' => 'jenis'])
        @endcomponent
        @component('components.DeskripsiEditor', ['value' => $umkm->deskripsi ?? old('deskripsi')])
        @endcomponent
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Kontak</label>
            <div id="kontak-list">
                @if(isset($umkm) && $umkm->kontak)
                    @foreach(json_decode($umkm->kontak, true) as $kontak)
                        <input type="text" name="kontak[]" value="{{ $kontak }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-2" placeholder="Link atau nomor kontak">
                    @endforeach
                @else
                    <input type="text" name="kontak[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-2" placeholder="Link atau nomor kontak">
                @endif
            </div>
            <button type="button" onclick="tambahKontak()" class="px-3 py-1 bg-green-500 text-white rounded text-xs mt-2">+ Tambah Kontak</button>
        </div>
        @component('components.GambarUpload', ['value' => $umkm->gambar ?? null])
        @endcomponent
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
<script>
    function tambahKontak() {
        const kontakList = document.getElementById('kontak-list');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'kontak[]';
        input.className = 'w-full px-4 py-2 border border-gray-300 rounded-lg mb-2';
        input.placeholder = 'Link atau nomor kontak';
        kontakList.appendChild(input);
    }
</script>
@include('layouts.footer') 