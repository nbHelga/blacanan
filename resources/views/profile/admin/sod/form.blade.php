@include('layouts.headerbar')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form Struktur Organisasi Desa</h2>
    <form action="{{ isset($sod) ? url('/admin/sod/update/'.$sod->id) : url('/admin/sod/store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($sod))
            @method('PUT')
        @endif
        @component('components.JudulInput', ['value' => $sod->nama ?? old('nama'), 'label' => 'Nama', 'name' => 'nama'])
        @endcomponent
        @component('components.JudulInput', ['value' => $sod->jabatan ?? old('jabatan'), 'label' => 'Jabatan', 'name' => 'jabatan'])
        @endcomponent
        @component('components.DeskripsiEditor', ['value' => $sod->deskripsi ?? old('deskripsi')])
        @endcomponent
        @component('components.GambarUpload', ['value' => $sod->gambar ?? null])
        @endcomponent
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@include('layouts.footer') 