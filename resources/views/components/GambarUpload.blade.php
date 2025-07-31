@props(['value' => ''])

<div class="mb-4" x-data="{
    previewUrl: @js($value ? (str_starts_with($value, 'http') ? $value : '/storage/' . $value) : ''),
    showModal: false,
    hasOld: @js($value ? true : false),
    openModal() { this.showModal = true; },
    closeModal(e) { if (e.target.classList.contains('modal-bg')) this.showModal = false; },
    removePreview() { this.previewUrl = ''; this.hasOld = false; }
}">
    <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
    <div class="flex flex-col items-center justify-center border-2 border-dashed border-blue-400 rounded-lg p-6 bg-blue-50 w-full">
        <input type="file" name="gambar" accept=".jpg,.jpeg,.png" class="block w-full border rounded mt-2" @change="
            const file = $event.target.files[0];
            if (file) {
                previewUrl = URL.createObjectURL(file);
                hasOld = false;
            }
        ">
        <span class="text-red-500 text-xs mt-2">*Format : JPG, PNG, max 10 MB</span>
    </div>
    <template x-if="hasOld && previewUrl">
        <div class="mt-4 w-48 h-32 relative">
            <img :src="previewUrl" class="object-cover w-full h-full rounded border cursor-pointer" @click="openModal">
            <button type="button" @click="removePreview" class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center">×</button>
        </div>
    </template>
    <template x-if="!hasOld && previewUrl">
        <div class="mt-4 w-48 h-32 relative">
            <img :src="previewUrl" class="object-cover w-full h-full rounded border cursor-pointer" @click="openModal">
            <button type="button" @click="removePreview" class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center">×</button>
        </div>
    </template>
    <template x-if="showModal">
        <div class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 modal-bg" @click="closeModal">
            <img :src="previewUrl" class="max-w-3xl max-h-[80vh] rounded shadow-lg border-4 border-white">
            <button type="button" @click="showModal = false" class="absolute top-2 right-2 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-2xl">×</button>
        </div>
    </template>
    @error('gambar')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>