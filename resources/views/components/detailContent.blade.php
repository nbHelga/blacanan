@props(['header1', 'header2', 'gambar' => null, 'isi' => null, 'onEdit', 'onDelete', 'onToggle', 'status', 'toggleRoute', 'editRoute', 'deleteRoute'])

<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8"
     x-data="{ showEdit: false, showDelete: false, showToggle: false }">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">{{ $header1 }}</h2>
        <div class="flex space-x-2">
            <form id="form-toggle" action="{{ $toggleRoute }}" method="POST" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button"
                    @click="showToggle = true"
                    class="w-12 h-8 rounded-full flex items-center transition-colors duration-300 focus:outline-none
                        {{ $status ? 'bg-green-500' : 'bg-gray-300' }}">
                    <span class="inline-block w-6 h-6 bg-white rounded-full shadow transform ring-1 ring-gray-600
                        {{ $status ? 'translate-x-4' : '' }}"></span>
                </button>
            </form>
            <a href="{{ $editRoute }}"
                class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600 font-semibold border border-yellow-600">Edit</a>
            <form id="form-delete" action="{{ $deleteRoute }}" method="POST" class="inline" onsubmit="return false;">
                @csrf
                @method('DELETE')
                <button type="button" @click="showDelete = true"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 font-semibold">Delete</button>
            </form>
        </div>
    </div>
    <x-confirm-dialog
        xShow="showDelete"
        type="delete"
        title="Hapus"
        message="Apakah Anda yakin ingin menghapus data ini?"
        onConfirm="document.querySelector('#form-delete').submit()"
        onCancel="showDelete = false"
    />
    <x-confirm-dialog
        xShow="showToggle"
        type="toggle"
        title="Ubah Status"
        message="Apakah Anda yakin ingin mengubah status data ini?"
        onConfirm="document.querySelector('#form-toggle').submit()"
        onCancel="showToggle = false"
    />
    <div class="mb-2">{{ $header2 }}</div>
    @if($gambar)
        <div class="relative w-full flex items-center justify-center overflow-hidden rounded mb-6">
            <img src="{{ asset('storage/'.$gambar) }}" alt="" class="object-cover object-center w-auto h-48 max-h-60 rounded">
        </div>
    @endif
    @if($isi)
        <div class="text-gray-700">{!! $isi !!}</div>
    @endif
</div>

{{-- Usage Example --}}
{{--