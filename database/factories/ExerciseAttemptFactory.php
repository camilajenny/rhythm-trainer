<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExerciseAttempt>
 */
class ExerciseAttemptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tap_data' => $this->fakeTapData(),
            'score' => $this->faker->numberBetween(0, 100),
        ];
    }

    private function fakeTapData(): array {
        $fakeData = [];

        for($i = 0; $i < 5; $i++) {
            $fakeData[] = $this->faker->randomFloat(2, -0.1, 0.1) + $i;
        }

        return $fakeData;
    }
}
