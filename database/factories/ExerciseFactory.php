<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->words(nb: 20, asText: true),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'bpm_override' => $this->faker->numberBetween(40, 180),
        ];
    }
}
