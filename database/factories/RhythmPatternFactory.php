<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RhythmPattern>
 */
class RhythmPatternFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $beatCount = $this->faker->numberBetween(1, 12);
        return [
            'name' => $this->faker->word(),
            'bpm' => $this->faker->numberBetween(40, 180),
            'time_signature' => "{$this->faker->numberBetween(4, 12)}/{$beatCount}",
            'pattern_data' => $this->fakeNotes($beatCount),
        ];
    }

    private function fakeNotes($beatCount): array
    {
        $possibleDurations = [0.25, 0.5, 1, 2, 4];
        $notes = [];
        $remainingBeats = $beatCount;

        while ($remainingBeats > 0) {
            // Filter durations to find notes that can fit in the remaining space
            $availableNotes = array_filter($possibleDurations, function ($duration) use ($remainingBeats) {
                return $duration <= $remainingBeats;
            });

            if (empty($availableNotes)) {
                break;
            }

            // Pick a random note from the available ones
            $randomNote = $availableNotes[array_rand($availableNotes)];
            $notes[] = $randomNote;
            $remainingBeats -= $randomNote;
        }

        return $notes;
    }
}
