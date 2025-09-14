<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\CourseSubcategory;
use App\Models\CourseCategory;

class CourseSubcategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = [
            'IT' => [
                ['name' => 'Web Development', 'slug' => 'web-development', 'description' => 'Learn HTML, CSS, JavaScript, and modern frameworks.'],
                ['name' => 'Mobile Development', 'slug' => 'mobile-development', 'description' => 'Learn to build Android & iOS apps using Flutter or Kotlin.'],
                ['name' => 'Data Science', 'slug' => 'data-science', 'description' => 'Learn Python, machine learning, and data analysis.'],
            ],
            'Business' => [
                ['name' => 'Entrepreneurship', 'slug' => 'entrepreneurship', 'description' => 'Learn how to build startups and independent businesses.'],
                ['name' => 'Management', 'slug' => 'management', 'description' => 'Courses on team, project, and organizational management.'],
                ['name' => 'Marketing', 'slug' => 'marketing', 'description' => 'Learn digital marketing, branding, and strategic marketing.'],
            ],
            'Design' => [
                ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'description' => 'Design engaging user interfaces and user experiences.'],
                ['name' => 'Graphic Design', 'slug' => 'graphic-design', 'description' => 'Learn Photoshop, Illustrator, and other graphic design tools.'],
            ],
        ];

        foreach ($subcategories as $categoryName => $subs) {
            $category = CourseCategory::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subs as $sub) {
                    CourseSubcategory::create([
                        'id'          => (string) Str::uuid(),
                        'name'        => $sub['name'],
                        'slug'        => $sub['slug'],
                        'description' => $sub['description'],
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
