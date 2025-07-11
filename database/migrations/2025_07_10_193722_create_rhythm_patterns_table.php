<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rhythm_patterns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('bpm');
            $table->string('time_signature', 5);
            $table->json('pattern_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rhythm_patterns');
    }
};
