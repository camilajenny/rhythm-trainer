<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tap_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_attempt_id')->constrained('exercise_attempts')->onDelete('cascade');
            $table->integer('tap_index');
            $table->float('expected_time');
            $table->float('actual_time');
            $table->boolean('is_correct');
            $table->float('deviation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tap_evaluations');
    }
};
