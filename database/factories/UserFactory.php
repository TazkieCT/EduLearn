<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'      => $this->faker->firstName(),
            'last_name'       => $this->faker->lastName(),
            'gender'          => $this->faker->randomElement(['male', 'female']),
            'dob'             => $this->faker->date('Y-m-d', '-20 years'), // minimal 20 tahun
            'profile_image'   => null,
            'address'         => $this->faker->address(),
            'city'            => $this->faker->city(),
            'country'         => $this->faker->country(),
            'zip'             => $this->faker->postcode(),
            'place_of_birth'  => $this->faker->city(),
            'status'          => $this->faker->randomElement(['active', 'inactive']),
            'email'           => $this->faker->unique()->safeEmail(),
            'role'            => $this->faker->randomElement(['student', 'instructor']),
            'email_verified_at' => now(),
            'password'        => static::$password ??= Hash::make('password'), // default password
            'remember_token'  => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
