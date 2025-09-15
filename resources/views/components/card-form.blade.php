@props(['title', 'description', 'color' => 'gray-800'])

<div class="bg-white shadow rounded-lg p-6 space-y-6">
    <h3 class="text-lg font-semibold text-{{ $color }}">{{ $title }}</h3>
    <p class="text-sm text-gray-600">{{ $description }}</p>
    {{ $slot }}
</div>
