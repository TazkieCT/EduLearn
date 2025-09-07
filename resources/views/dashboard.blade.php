<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h3 class="text-lg font-semibold mb-6">Available Courses</h3>

            <!-- Grid for courses -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Skeleton loader --}}
                @if($courses->isEmpty())
                    @for ($i = 0; $i < 6; $i++)
                        <div class="bg-white rounded-lg shadow-md animate-pulse h-64">
                            <div class="h-40 bg-gray-200"></div>
                            <div class="p-4 space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                                <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                <div class="h-4 bg-gray-200 rounded w-full"></div>
                            </div>
                        </div>
                    @endfor
                @else
                    @foreach($courses as $course)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition-transform transform hover:scale-105 hover:shadow-xl duration-300 opacity-0 animate-fade-in">
                            <!-- Thumbnail -->
                            <div class="h-40 w-full overflow-hidden">
                                <img src="{{ $course->thumbnail ?? 'https://picsum.photos/400/200' }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                            </div>

                            <div class="p-4 flex flex-col flex-1 justify-between">
                                <div>
                                    <!-- Category Badge & Status -->
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-1 rounded">
                                            {{ $course->category->name ?? 'Uncategorized' }}
                                        </span>
                                        <span class="text-xs font-semibold px-2 py-1 rounded {{ $course->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                            {{ ucfirst($course->status) }}
                                        </span>
                                    </div>

                                    <!-- Title -->
                                    <h4 class="font-bold text-lg text-gray-800 mb-1">{{ $course->title }}</h4>

                                    <!-- Description -->
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($course->description, 100) }}</p>
                                </div>

                                <!-- Price & Details Link -->
                                <div class="flex items-center justify-between mt-auto">
                                    <span class="font-semibold text-gray-800">
                                        ${{ number_format($course->price, 2) }}
                                    </span>
                                    <a href="{{ route('courses.show', $course->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </div>

    {{-- Fade-in animation for cards --}}
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s forwards;
        }
    </style>
</x-app-layout>
