<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserStorySeeder::class);

        $this->call(UserSeeder::class);
        $this->call(RhythmPatternSeeder::class);
        $this->call(ExerciseSeeder::class);
        $this->call(ExerciseAttemptSeeder::class);
        $this->call(TapEvaluationSeeder::class);
    }
}
