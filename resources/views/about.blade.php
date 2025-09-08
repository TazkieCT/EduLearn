<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-16">

            <!-- Hero Section -->
            <section class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Our Company</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We are passionate about delivering high-quality solutions that make a difference.
                    Our team works tirelessly to innovate and create value for our clients and community.
                </p>
            </section>

            <!-- Mission Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="{{ asset('images/mission.jpg') }}" alt="Our Mission" class="rounded-lg shadow-md w-full">
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-600">
                        Our mission is to provide excellent service and solutions that empower individuals and businesses.
                        We believe in innovation, collaboration, and delivering measurable impact.
                    </p>
                </div>
            </section>

            <!-- Team Section -->
            <section>
                <h2 class="text-2xl font-semibold text-gray-900 mb-8 text-center">Meet the Team</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Team Member Example -->
                    <div class="bg-white rounded-lg shadow p-4 text-center">
                        <img src="{{ asset('images/team1.jpg') }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" alt="Team Member">
                        <h3 class="font-bold text-lg">Alice Johnson</h3>
                        <p class="text-gray-500 text-sm">CEO & Founder</p>
                    </div>

                    <div class="bg-white rounded-lg shadow p-4 text-center">
                        <img src="{{ asset('images/team2.jpg') }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" alt="Team Member">
                        <h3 class="font-bold text-lg">Bob Smith</h3>
                        <p class="text-gray-500 text-sm">CTO</p>
                    </div>

                    <!-- Add more members as needed -->
                </div>
            </section>

            <!-- Call to Action -->
            <section class="text-center bg-indigo-600 text-white rounded-lg p-12">
                <h2 class="text-3xl font-bold mb-4">Join Us on Our Journey</h2>
                <p class="mb-6 max-w-xl mx-auto">
                    Interested in working with us or learning more? Reach out today and be part of our growing community!
                </p>
                <a href="#" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition">
                    Contact Us
                </a>
            </section>

        </div>
    </div>
</x-app-layout>
