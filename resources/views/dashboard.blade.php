<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="text-lg font-semibold mb-4">Available Courses</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Skeleton Loader -->
                <template x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">
                    <template x-if="loading">
                        <div class="space-y-2">
                            <div class="animate-pulse bg-gray-200 h-40 rounded-lg"></div>
                            <div class="animate-pulse h-4 bg-gray-200 rounded w-3/4"></div>
                            <div class="animate-pulse h-3 bg-gray-200 rounded w-1/2"></div>
                            <div class="animate-pulse h-3 bg-gray-200 rounded w-1/3"></div>
                        </div>
                    </template>
                </template>

                <!-- Actual Courses -->
                @forelse($courses as $course)
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                        <div class="h-40 bg-gray-100 rounded-lg overflow-hidden mb-3">
                            @if($course->thumbnail)
                                <img src="{{ $course->thumbnail ?? 'https://via.placeholder.com/400x300' }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center w-full h-full text-gray-400">
                                    No Image
                                </div>
                            @endif
                        </div>
                        <h4 class="font-bold text-lg">{{ $course->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $course->category->name ?? 'Uncategorized' }}</p>
                        <p class="text-gray-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" class="mt-3 inline-block text-indigo-600 hover:text-indigo-900 underline">
                            View Details
                        </a>
                    </div>
                @empty
                    <p class="col-span-3 text-gray-500">No courses available.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
