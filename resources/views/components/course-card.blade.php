<div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1000)" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
    
    <!-- Skeleton Loader -->
    <template x-if="loading">
        <div class="space-y-2 animate-pulse">
            <div class="bg-gray-200 h-40 rounded-lg"></div>
            <div class="h-4 bg-gray-200 rounded w-3/4"></div>
            <div class="h-3 bg-gray-200 rounded w-1/2"></div>
            <div class="h-3 bg-gray-200 rounded w-1/3"></div>
        </div>
    </template>

    <!-- Actual Content -->
    <template x-if="!loading">
        <div>
            <div class="h-40 bg-gray-100 rounded-lg overflow-hidden mb-3 flex items-center justify-center">
                @if($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-gray-400">No Image</span>
                @endif
            </div>

            <h4 class="font-bold text-lg">{{ $course->title }}</h4>
            <p class="text-sm text-gray-500">{{ $course->category->name ?? 'Uncategorized' }}</p>
            <p class="text-gray-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
            <a href="{{ route('courses.show', $course->id) }}"
               class="mt-3 inline-block text-indigo-600 hover:text-indigo-900 underline">
                View Details
            </a>
        </div>
    </template>
</div>
