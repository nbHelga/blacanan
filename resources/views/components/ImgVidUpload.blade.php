{{-- filepath: resources/views/components/ImgVidUpload.blade.php --}}
<div class="mb-4" x-data="{
    tipe: '{{ $tipe ?? 'gambar' }}',
    previewUrl: '{{ $value ?? '' }}',
    previewFile: null,
    showModal: false,
    modalType: 'image',
    handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            this.previewFile = file;
            this.previewUrl = URL.createObjectURL(file);
            this.modalType = file.type.startsWith('video') ? 'video' : 'image';
        }
    },
    openModal() { this.showModal = true; },
    closeModal(e) { if (e.target.classList.contains('modal-bg')) this.showModal = false; },
    removePreview() { this.previewUrl = ''; this.previewFile = null; }
}">
    <label class="block font-semibold mb-2">Gambar/Video</label>
    <div class="mb-4">
        <select name="tipe" x-model="tipe" class="border rounded px-3 py-2">
            <option value="gambar">Gambar</option>
            <option value="video">Video</option>
        </select>
    </div>
    <div class="flex flex-col items-center justify-center border-2 border-dashed border-blue-400 rounded-lg p-6 bg-blue-50 w-full">
        <input type="file"
            :name="tipe === 'gambar' ? 'gambar' : 'video'"
            :accept="tipe === 'gambar' ? '.jpg,.jpeg,.png' : 'video/mp4,video/webm'"
            class="block w-full border rounded mt-2"
            @change="handleFileSelect($event)">
        <span class="text-red-500 text-xs mt-2">*Format : JPG, PNG, MP4, WEBM. Max 10 MB gambar, max 50 MB video</span>
    </div>
    <template x-if="previewUrl">
        <div class="mt-4 w-full relative">
            <template x-if="modalType === 'video'">
                <video :src="previewUrl" class="w-full h-[340px] rounded border cursor-pointer" controls @click="openModal"></video>
            </template>
            <template x-if="modalType === 'image'">
                <img :src="previewUrl" class="object-cover w-full h-64 rounded border cursor-pointer" @click="openModal">
            </template>
            <button type="button" @click="removePreview" class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center">×</button>
            <div class="text-xs mt-1 truncate" x-text="previewFile?.name"></div>
            <div class="text-xs text-gray-500" x-text="previewFile ? (previewFile.size / 1024).toFixed(1) + ' KB' : ''"></div>
        </div>
    </template>
    <template x-if="showModal">
        <div class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 modal-bg" @click="closeModal">
            <template x-if="modalType === 'video'">
                <video :src="previewUrl" id="videoPreview" class="w-full h-[340px] rounded shadow-lg border-4 border-white" controls autoplay></video>
            </template>
            <template x-if="modalType === 'image'">
                <img :src="previewUrl" class="w-full max-w-3xl max-h-[80vh] rounded shadow-lg border-4 border-white">
            </template>
            <button type="button" @click="showModal = false" class="absolute top-2 right-2 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-2xl">×</button>
        </div>
    </template>
    @error('gambar')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
    @error('video')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>