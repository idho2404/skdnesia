@props(['label', 'type' => 'text', 'name'])

<div class="mb-4">
  <label class="block mb-1 font-medium">{{ $label }}</label>
  <input type="{{ $type }}" name="{{ $name }}"
    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none"
    required>
</div>