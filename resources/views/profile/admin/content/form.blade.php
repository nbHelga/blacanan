@include('layouts.headerbar')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-blue-700 mb-6">Form Konten</h2>
    <form action="{{ isset($content) ? url('/admin/content/update/'.$content->id) : url('/admin/content/store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($content))
            @method('PUT')
        @endif
        @component('components.JudulInput', ['value' => $content->judul ?? old('judul')])
        @endcomponent
        @component('components.DeskripsiEditor', ['value' => $content->deskripsi ?? old('deskripsi')])
        @endcomponent
        @component('components.GambarUpload', ['value' => $content->gambar ?? null])
        @endcomponent
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@include('layouts.footer') 