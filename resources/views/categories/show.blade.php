<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $courseCategory->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @foreach($subcategories as $sub)
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-900">{{ $sub->name }}</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ Str::limit($sub->description, 100) }}</p>

                    @if($sub->courses->count())
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($sub->courses as $course)
                                <a href="{{ route('courses.show', $course) }}" 
                                   class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                    <h4 class="text-md font-semibold text-gray-800">{{ $course->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($course->description, 80) }}</p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="mt-2 text-gray-500">No courses in this subcategory yet.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
