@props(['tabs', 'active' => ''])

<div x-data="{ tab: '{{ $active }}' }">
    <div class="bg-white rounded-lg shadow p-4 mb-6 flex space-x-4">
        @foreach($tabs as $key => $label)
            <button 
                @click="tab = '{{ $key }}'"
                :class="{ 
                    'border-b-2 font-semibold': tab === '{{ $key }}', 
                    'border-indigo-500': '{{ $key }}' !== 'delete',
                    'border-red-500': '{{ $key }}' === 'delete' 
                }"
                class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    <div class="relative">
        {{ $slot }}
    </div>
</div>
