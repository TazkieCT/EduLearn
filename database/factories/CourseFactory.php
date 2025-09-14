<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CourseSubcategory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = \App\Models\Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        $subcategory = CourseSubcategory::inRandomOrder()->first(); // Pick random subcategory
        $creator = User::inRandomOrder()->first(); // Pick random user

        return [
            'id' => (string) Str::uuid(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'description' => $this->faker->paragraph(3),
            'subcategory_id' => $subcategory ? $subcategory->id : null,
            'price' => $this->faker->randomFloat(2, 0, 500),
            'thumbnail' => 'https://picsum.photos/400/200?random=' . rand(1,1000),
            'promo_video' => null,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'created_by' => $creator ? $creator->id : null,
        ];
    }
}
