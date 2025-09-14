<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="text-lg font-semibold mb-4">Available Courses</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($courses as $course)
                    <x-course-card :course="$course" />
                @empty
                    <p class="col-span-3 text-gray-500">No courses available.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{-- {{ $courses->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
