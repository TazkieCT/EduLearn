<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\CourseCategory;

class CourseCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Belajar HTML, CSS, JavaScript, dan framework modern.',
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Belajar membuat aplikasi Android & iOS dengan Flutter atau Kotlin.',
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'description' => 'Pelajari Python, machine learning, dan analisis data.',
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'description' => 'Desain pengalaman pengguna dan antarmuka yang menarik.',
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Kursus seputar manajemen, startup, dan strategi bisnis.',
            ],
        ];

        foreach ($categories as $category) {
            CourseCategory::create([
                'id'          => (string) Str::uuid(),
                'name'        => $category['name'],
                'slug'        => $category['slug'],
                'description' => $category['description'],
            ]);
        }
    }
}
