<div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg relative p-8">
        <button onclick="window.location.href='/admin/umkm/index'" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
        <h2 class="text-xl font-bold text-blue-700 mb-4">Detail UMKM</h2>
        <form action="{{ url('/admin/umkm/update/'.$umkm->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            @component('components.JudulInput', ['value' => $umkm->nama, 'label' => 'Nama UMKM', 'name' => 'nama'])
            @endcomponent
            @component('components.JudulInput', ['value' => $umkm->jenis, 'label' => 'Jenis', 'name' => 'jenis'])
            @endcomponent
            @component('components.DeskripsiEditor', ['value' => $umkm->deskripsi])
            @endcomponent
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Kontak</label>
                <div id="kontak-list-detail">
                    @foreach(json_decode($umkm->kontak, true) as $kontak)
                        <input type="text" name="kontak[]" value="{{ $kontak }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-2" placeholder="Link atau nomor kontak">
                    @endforeach
                </div>
                <button type="button" onclick="tambahKontakDetail()" class="px-3 py-1 bg-green-500 text-white rounded text-xs mt-2">+ Tambah Kontak</button>
            </div>
            @component('components.GambarUpload', ['value' => $umkm->gambar])
            @endcomponent
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<script>
    function tambahKontakDetail() {
        const kontakList = document.getElementById('kontak-list-detail');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'kontak[]';
        input.className = 'w-full px-4 py-2 border border-gray-300 rounded-lg mb-2';
        input.placeholder = 'Link atau nomor kontak';
        kontakList.appendChild(input);
    }
</script> 