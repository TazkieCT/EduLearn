@props(['label', 'name', 'type' => 'text', 'value' => '', 'options' => []])

<div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
    <label class="w-32 text-gray-700 font-medium">{{ $label }}</label>

    @if($type === 'select')
        <select name="{{ $name }}" 
                class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full appearance-none"
        >
            <option value="" disabled selected>Select {{ $label }}</option>
            @foreach($options as $optValue => $optLabel)
                <option value="{{ $optValue }}" {{ old($name, $value) == $optValue ? 'selected' : '' }}>
                    {{ $optLabel }}
                </option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
               class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
        >
    @endif

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
