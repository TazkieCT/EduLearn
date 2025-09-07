<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseCategoryFactory extends Factory
{
    protected $model = CourseCategory::class;

    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        return [
            'id'          => (string) Str::uuid(),
            'name'        => ucfirst($name),
            'slug'        => Str::slug($name . '-' . Str::random(5)),
            'description' => $this->faker->sentence(),
        ];
    }
}
