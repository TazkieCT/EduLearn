<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6 space-y-6">

                <!-- Thumbnail -->
                <div class="h-64 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" 
                             alt="{{ $course->title }}" 
                             class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>

                <!-- Info -->
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $course->title }}</h1>
                    <p class="text-sm text-gray-500">
                        {{ $course->subcategory->name ?? 'Uncategorized' }} • 
                        by {{ $course->creator->name ?? 'Unknown' }}
                    </p>
                </div>

                <!-- Description -->
                <div class="prose max-w-none">
                    {!! nl2br(e($course->description)) !!}
                </div>

                <!-- Price & Status -->
                <div class="flex items-center justify-between border-t pt-4">
                    <span class="text-lg font-semibold text-indigo-600">
                        {{ $course->price ? 'Rp' . number_format($course->price, 0, ',', '.') : 'Free' }}
                    </span>
                </div>

                <!-- Back -->
                <div class="pt-6">
                    <a href="{{ route('courses.index') }}" 
                       class="inline-block text-indigo-600 hover:text-indigo-900 underline">
                        Back to Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
