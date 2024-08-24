<?php

namespace Database\Factories;

use App\Models\PresmaFK;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresmaFKFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PresmaFK::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nourut' => $this->faker->unique()->numberBetween(1, 5),
            'nama' => $this->faker->name,
            'nama_wakil' => $this->faker->name,
            'prodi' => $this->faker->randomElement(['Prodi A', 'Prodi B', 'Prodi C']),
            'angkatan' => $this->faker->numberBetween(2010, 2023),
            'foto' => $this->faker->imageUrl(),
            'foto_wakil' => $this->faker->imageUrl(),
        ];
    }
}
