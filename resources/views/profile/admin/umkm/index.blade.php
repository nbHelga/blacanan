@include('layouts.headerbar')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen UMKM</h2>
        <a href="/admin/umkm/form" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah UMKM</a>
    </div>
    @php
        $headers = ['Nama', 'Jenis', 'Aksi'];
        $rows = $umkms->map(function($umkm) {
            return [
                'nama' => $umkm->nama,
                'jenis' => $umkm->jenis,
                'detail_url' => url('/admin/umkm/detail/'.$umkm->id)
            ];
        });
    @endphp
    @component('components.TabelFleksibel', ['headers' => $headers, 'rows' => $rows])
    @endcomponent
</div>
@include('layouts.footer') 