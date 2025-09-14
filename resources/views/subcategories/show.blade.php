<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $subcategory->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if($courses->count())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($courses as $course)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
                            <p class="text-gray-600">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('courses.show', $course) }}" 
                               class="mt-2 inline-block text-indigo-600 hover:text-indigo-800">
                                View Course →
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No courses available in this subcategory.</p>
            @endif
        </div>
    </div>
</x-app-layout>
