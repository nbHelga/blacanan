<div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg relative p-8">
        <button onclick="window.location.href='/admin/content/index'" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
        <h2 class="text-xl font-bold text-blue-700 mb-4">Detail Konten</h2>
        <form action="{{ url('/admin/content/update/'.$content->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            @component('components.JudulInput', ['value' => $content->judul])
            @endcomponent
            @component('components.DeskripsiEditor', ['value' => $content->deskripsi])
            @endcomponent
            @component('components.GambarUpload', ['value' => $content->gambar])
            @endcomponent
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-sm">Tanggal Dibuat</label>
                    <div class="text-gray-800">{{ $content->created_at->format('d-m-Y') }}</div>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Tanggal Rilis</label>
                    <div class="text-gray-800">{{ $content->updated_at->format('d-m-Y') }}</div>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm">Status</label>
                    <select name="status" class="w-full border rounded px-2 py-1">
                        <option value="release" {{ $content->status == 'release' ? 'selected' : '' }}>Release</option>
                        <option value="not release" {{ $content->status == 'not release' ? 'selected' : '' }}>Not Release</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div> 