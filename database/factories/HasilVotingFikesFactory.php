<?php

namespace Database\Factories;

use App\Models\HasilVotingFikes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasilVotingFK>
 */
class HasilVotingFikesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HasilVotingFikes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->unique()->numberBetween(1, 5),,
            'dpm_id' => $this->faker->unique()->numberBetween(1, 5),,
            'presma_id' => $this->faker->unique()->numberBetween(1, 5),,
        ];
    }
}
