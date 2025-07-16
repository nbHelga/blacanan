<div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg relative p-8">
        <button onclick="window.location.href='/admin/blog/index'" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
        <h2 class="text-xl font-bold text-blue-700 mb-4">Detail Blog</h2>
        <form action="{{ url('/admin/blog/update/'.$blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            @component('components.JudulInput', ['value' => $blog->judul, 'label' => 'Judul', 'name' => 'judul'])
            @endcomponent
            @component('components.JudulInput', ['value' => $blog->kategori, 'label' => 'Kategori', 'name' => 'kategori'])
            @endcomponent
            @component('components.DeskripsiEditor', ['value' => $blog->deskripsi])
            @endcomponent
            @component('components.GambarUpload', ['value' => $blog->gambar])
            @endcomponent
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div> 