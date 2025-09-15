<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-16">

            <!-- Hero Section -->
            <section class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Empowering Communities for a Better Future</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Our purpose is to uplift communities by providing access to valuable resources, knowledge, 
                    and learning opportunities. We are committed to helping individuals grow both in hard skills 
                    and soft skills, so they can thrive and contribute meaningfully to society.
                </p>
            </section>

            <!-- Mission Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="relative w-full">
                    <!-- Skeleton -->
                    <div class="absolute inset-0 bg-gray-400 animate-pulse rounded-lg shadow-md"></div>
                    
                    <!-- Image -->
                    <img 
                        src="{{ asset('images/our-mission.jpg') }}" 
                        alt="Our Mission" 
                        class="rounded-lg shadow-md w-full relative z-10"
                        onload="this.previousElementSibling.style.display='none'"
                    >
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-600">
                        We believe every person deserves the opportunity to grow in line with their own potential. 
                        That's why our mission is to deliver programs, materials, and support that strengthen 
                        communities and help individuals build the skills they need to succeed whether technical, 
                        professional, or personal. Together, we can shape a future where no one is left behind.
                    </p>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="text-center bg-indigo-600 text-white rounded-lg p-12">
                <h2 class="text-3xl font-bold mb-4">Start Your Learning Journey</h2>
                <p class="mb-6 max-w-xl mx-auto">
                    Unlock new skills, explore fresh ideas, and grow at your own pace. 
                    Whether you're here to study, upskill, or discover something new, 
                    this is the place to begin your journey.
                </p>
                <a href="{{ route('dashboard') }}" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition">
                    Start Learning
                </a>
            </section>

        </div>
    </div>
</x-app-layout>
