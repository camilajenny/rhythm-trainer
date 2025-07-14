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
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropForeign(['rhythm_pattern_id']);
            $table->dropColumn('rhythm_pattern_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->foreignId('rhythm_pattern_id')->constrained('rhythm_patterns')->onDelete('cascade');
        });
    }
};
