<div x-data="{ loading: true }" 
     x-init="setTimeout(() => loading = false, 100)" 
     class="bg-white rounded-lg shadow p-4 transition hover:shadow-lg cursor-pointer">

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
        <a href="{{ route('courses.show', $course) }}"
           class="block"
           x-transition:enter="transition ease-out duration-500"
           x-transition:enter-start="opacity-0 translate-y-2"
           x-transition:enter-end="opacity-100 translate-y-0">

            <div class="h-40 bg-gray-100 rounded-lg overflow-hidden mb-3 flex items-center justify-center relative group">
                @if($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                @else
                    <span class="text-gray-400">No Image</span>
                @endif
            </div>

            <h4 class="font-bold text-lg">{{ $course->title }}</h4>
            <p class="text-sm text-gray-500">{{ $course->subcategory->name ?? 'Uncategorized' }}</p>
            <p class="text-gray-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
        </a>
    </template>
</div>
