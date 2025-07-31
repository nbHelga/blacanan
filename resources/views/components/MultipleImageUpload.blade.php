@props(['value' => ''])

<div class="mb-4" x-data="{
    previewUrls: [],
    previewFiles: [],
    showModal: false,
    currentPreview: 0,
    oldImages: @js($value ? array_map(function($img) {
        return str_starts_with(trim($img), 'http') ? trim($img) : trim($img);
    }, explode(',', $value)) : []),
    handleFileSelect(event) {
        const files = Array.from(event.target.files);
        this.previewFiles = files;
        this.previewUrls = files.map(f => URL.createObjectURL(f));
    },
    openModal(idx) {
        this.currentPreview = idx;
        this.showModal = true;
    },
    closeModal(e) { if (e.target.classList.contains('modal-bg')) this.showModal = false; },
    removePreview(idx) {
        this.previewUrls.splice(idx, 1);
        this.previewFiles.splice(idx, 1);
    },
    removeOld(idx) {
        this.oldImages.splice(idx, 1);
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'hapus_gambar_lama[]';
        input.value = idx;
        document.querySelector('form').appendChild(input);
    }
}">
    <label class="block text-gray-700 font-semibold mb-2">Gambar Blog</label>
    <div class="flex flex-col items-center justify-center border-2 border-dashed border-blue-400 rounded-lg p-6 bg-blue-50 w-full">
        <input type="file" name="gambar[]" multiple accept=".jpg,.jpeg,.png" class="block w-full border rounded mt-2" @change="handleFileSelect($event)">
        <span class="text-red-500 text-xs mt-2">*Format : JPG, PNG, max 10 MB</span>
    </div>
    <template x-if="oldImages.length">
        <div class="flex flex-wrap gap-4 mt-4">
            <template x-for="(img, idx) in oldImages">
                <div class="relative w-32 h-24 border rounded-lg p-2 bg-gray-50 flex flex-col items-center justify-center">
                    <img :src="img.startsWith('http') ? img : '/storage/' + img" class="object-cover w-full h-16 rounded cursor-pointer" @click="openModal(idx)">
                    <div class="text-xs mt-1 truncate" x-text="img.split('/').pop()"></div>
                    <button type="button" @click="removeOld(idx)" class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">×</button>
                </div>
            </template>
        </div>
    </template>
    <template x-if="previewUrls.length">
        <div class="flex flex-wrap gap-4 mt-4">
            <template x-for="(url, idx) in previewUrls">
                <div class="relative w-32 h-24 border rounded-lg p-2 bg-gray-50 flex flex-col items-center justify-center">
                    <img :src="url" class="object-cover w-full h-16 rounded cursor-pointer" @click="openModal(idx)">
                    <div class="text-xs mt-1 truncate" x-text="previewFiles[idx]?.name"></div>
                    <div class="text-xs text-gray-500" x-text="previewFiles[idx] ? (previewFiles[idx].size / 1024).toFixed(1) + ' KB' : ''"></div>
                    <button type="button" @click="removePreview(idx)" class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">×</button>
                </div>
            </template>
        </div>
    </template>
    <template x-if="showModal">
        <div class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 modal-bg" @click="closeModal">
            <img :src="previewUrls[currentPreview] || (oldImages[currentPreview] && oldImages[currentPreview].startsWith('http') ? oldImages[currentPreview] : '/storage/' + oldImages[currentPreview])" class="max-w-3xl max-h-[80vh] rounded shadow-lg border-4 border-white">
            <button type="button" @click="showModal = false" class="absolute top-2 right-2 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-2xl">×</button>
        </div>
    </template>
    @error('gambar')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
