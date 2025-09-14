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
                'name' => 'IT',
                'slug' => 'it',
                'description' => 'Kategori seputar teknologi informasi.',
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Kategori seputar bisnis, manajemen, dan kewirausahaan.',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Kategori seputar UI, UX, dan desain grafis.',
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
