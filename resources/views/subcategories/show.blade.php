<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $subcategory->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if($courses->count())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($courses as $course)
                        <x-course-card :course="$course" />
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No courses available in this subcategory.</p>
            @endif
        </div>
    </div>
</x-app-layout>
