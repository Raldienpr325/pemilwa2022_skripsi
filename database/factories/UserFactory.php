<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'given_name' => $this->faker->firstName,
            'family_name' => $this->faker->lastName,
            'hd' => $this->faker->domainName,
            'NIM' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'prodi' => $this->faker->randomElement(['Prodi A', 'Prodi B', 'Prodi C']),
            'password' => bcrypt('password'),
            'pilihan_presma' => $this->faker->randomElement(['A', 'B', 'C']),
            'pilihan_DPM' => $this->faker->randomElement(['X', 'Y', 'Z']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
