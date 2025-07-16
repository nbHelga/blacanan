@props([
    'name' => '',   // nama field input
    'label' => '',  // label di atas input
    'value' => '',       // default value
])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 font-semibold mb-2">
        {{ $label }}
    </label>
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
