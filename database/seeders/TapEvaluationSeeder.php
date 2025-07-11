<?php

namespace Database\Seeders;

use App\Models\TapEvaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TapEvaluationSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {
        TapEvaluation::factory()->count(10)->create();
    }

    /**
     * Run seeds to be run only in production environments
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
