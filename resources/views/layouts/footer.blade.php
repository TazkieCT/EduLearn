<footer class="bg-gray-800 text-gray-200 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- About Section -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-4">About Us</h3>
            <p class="text-gray-400">
                We provide high-quality courses and tutorials to help learners grow their skills and advance their careers.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-white transition">Home</a></li>
                <li><a href="#" class="hover:text-white transition">About</a></li>
                <li><a href="#" class="hover:text-white transition">Courses</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-4">Contact</h3>
            <p class="text-gray-400">123 Learning St., Knowledge City</p>
            <p class="text-gray-400">Email: info@example.com</p>
            <p class="text-gray-400">Phone: +62 123 4567 890</p>

            <!-- Social Links -->
            <div class="mt-4 flex space-x-4">
                <a href="#" class="hover:text-white transition">Facebook</a>
                <a href="#" class="hover:text-white transition">Twitter</a>
                <a href="#" class="hover:text-white transition">Instagram</a>
            </div>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-8 py-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </div>
</footer>
