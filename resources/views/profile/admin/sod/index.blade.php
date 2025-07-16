@include('layouts.headerbar')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Struktur Organisasi Desa</h2>
        <a href="/admin/sod/form" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah SOD</a>
    </div>
    @php
        $headers = ['Nama', 'Jabatan', 'Aksi'];
        $rows = $sods->map(function($sod) {
            return [
                'nama' => $sod->nama,
                'jabatan' => $sod->jabatan,
                'detail_url' => url('/admin/sod/detail/'.$sod->id)
            ];
        });
    @endphp
    @component('components.TabelFleksibel', ['headers' => $headers, 'rows' => $rows])
    @endcomponent
</div>
@include('layouts.footer') 