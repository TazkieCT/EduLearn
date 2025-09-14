<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category) }}" 
                       class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-gray-900">
                            {{ $category->name }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-600">
                            {{ Str::limit($category->description, 80) }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>