{{-- filepath: resources/views/components/GambarUpload.blade.php --}}
<div class="mb-4" x-data="{ showUpload: {{ $value ? 'false' : 'true' }}, deleted: false }">
    <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
    <template x-if="!showUpload">
        <div class="relative w-48 h-32 mb-2">
            <img src="{{ asset($value) }}" class="object-cover w-full h-full rounded border">
            <button type="button"
                @click="showUpload = true; deleted = true"
                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center">×</button>
            <input type="hidden" name="hapus_gambar" value="1" x-show="deleted">
        </div>
    </template>
    <template x-if="showUpload">
        <div class="flex flex-col items-center justify-center border-2 border-dashed border-blue-400 rounded-lg p-6 cursor-pointer bg-blue-50 hover:bg-blue-100 w-full">
            <span class="text-blue-600 font-semibold">Upload Gambar atau Tarik Kesini</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 my-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h10a4 4 0 004-4M7 10l5-5m0 0l5 5m-5-5v12" /></svg>
            <input type="file" name="gambar" accept=".jpg,.jpeg,.png" class="block w-full border rounded mt-2">
            <span class="text-red-500 text-xs mt-2">*Format : JPG, PNG, up to 10 MB</span>
        </div>
    </template>
    @error('gambar')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>