<?php

namespace Database\Factories;

use App\Models\ExerciseAttempt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TapEvaluation>
 */
class TapEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exercise_attempt_id' => ExerciseAttempt::query()->inRandomOrder()->first()->id,
            'tap_index' => $this->faker->randomNumber(2),
            'expected_time' => $this->faker->randomfloat(2, 0, 1),
            'actual_time' => $this->faker->randomfloat(2, 0, 1),
            'is_correct' => $this->faker->boolean(70),
            'deviation' => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}
