{{-- filepath: resources/views/components/confirm-dialog.blade.php --}}
@php
    $color = [
        'delete' => 'bg-red-600 text-white',
        'edit' => 'bg-yellow-400 text-black',
        'add' => 'bg-green-600 text-white',
        'toggle' => 'bg-blue-600 text-white',
        'info' => 'bg-blue-600 text-white'
    ][$type] ?? 'bg-blue-600 text-white';
@endphp

<div x-cloak x-show="{{ $attributes->get('xShow', 'false') }}"
     class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
     style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative">
        <div class="{{ $color }} px-6 py-3 rounded-t-lg font-bold text-lg">
            {{ $title }}
            <button @click="{{ $onCancel }}" class="absolute top-2 right-4 text-2xl">&times;</button>
        </div>
        <div class="p-6 text-gray-800">
            <p>{{ $message }}</p>
            <div class="flex justify-end mt-6 space-x-3">
                <button @click="{{ $onCancel }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Tidak</button>
                <button @click="{{ $onConfirm }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Ya</button>
            </div>
        </div>
    </div>
</div>