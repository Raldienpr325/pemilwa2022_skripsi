<?php

namespace Database\Factories;

use App\Models\HasilVotingFk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasilVotingFK>
 */
class HasilVotingFKFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HasilVotingFk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->unique()->numberBetween(1, 10000),
            'dpm_id' => $this->faker->unique()->numberBetween(1, 10000),
            'presma_id' => $this->faker->unique()->numberBetween(1, 10000),
        ];
    }
}
