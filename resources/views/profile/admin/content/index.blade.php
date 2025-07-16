@include('layouts.headerbar')
<div class="max-w-5xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-blue-700">Manajemen Konten</h2>
        <a href="/admin/content/form" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Konten</a>
    </div>
    @php
        $headers = ['Judul', 'Tanggal Dibuat', 'Aksi'];
        $rows = $contents->map(function($content) {
            return [
                'judul' => $content->judul,
                'tanggal' => $content->created_at->format('d-m-Y'),
                'detail_url' => url('/admin/content/detail/'.$content->id)
            ];
        });
    @endphp
    @component('components.TabelFleksibel', ['headers' => $headers, 'rows' => $rows])
    @endcomponent
</div>
@include('layouts.footer') 