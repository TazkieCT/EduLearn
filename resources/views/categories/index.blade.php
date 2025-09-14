<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            @foreach ($categories as $category)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        <a href="{{ route('categories.show', $category) }}" class="hover:underline">
                            {{ $category->name }}
                        </a>
                    </h3>

                    @if ($category->subcategories->count())
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($category->subcategories as $sub)
                                <div class="border rounded-lg p-4 hover:shadow transition">
                                    <h4 class="text-lg font-semibold text-gray-800">
                                        <a href="{{ route('subcategories.show', [$category->slug, $sub->slug]) }}" class="hover:underline">
                                            {{ $sub->name }}
                                        </a>
                                    </h4>
                                    <p class="text-sm text-gray-600 mb-3">
                                        {{ Str::limit($sub->description, 100) }}
                                    </p>

                                    @if ($sub->courses->count())
                                        <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                            @foreach ($sub->courses->take(3) as $course)
                                                <li>
                                                    <a href="{{ route('courses.show', $course->slug) }}" class="hover:underline">
                                                        {{ $course->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @if ($sub->courses->count() > 3)
                                            <a href="{{ route('subcategories.show', [$category->slug, $sub->slug]) }}"
                                               class="text-blue-600 text-sm hover:underline">
                                                + {{ $sub->courses->count() - 3 }} more
                                            </a>
                                        @endif
                                    @else
                                        <p class="text-gray-500 text-sm">No courses available.</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No subcategories available.</p>
                    @endif
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
