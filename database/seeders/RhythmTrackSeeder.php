<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\RhythmPattern;
use App\Models\RhythmTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RhythmTrackSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {
        $exercises = Exercise::all();
        $patterns = RhythmPattern::all();

        foreach($exercises as $exercise) {
            $used_patterns = $patterns->random(rand(2, 4));

            foreach($used_patterns as $index => $pattern) {
                RhythmTrack::create([
                    'exercise_id' => $exercise->id,
                    'rhythm_pattern_id' => $pattern->id,
                    'track_index' => $index,
                ]);
            }
        }
    }

    /**
     * Run seeds to be run only on production environments
     *
     * @return mixed
     */
    public function runProduction() {

    }

    /**
     * Run seeds to be run on every environment (including production)
     *
     * @return mixed
     */
    public function runAlways() {

    }
}
