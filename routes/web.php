<?php

use App\Http\Controllers\RhythmExerciseController;
use App\Http\Controllers\RhythmPatternController;
use Illuminate\Support\Facades\Route;

// Non-API web routes, useful for some incoming webhooks
Route::get('/patterns', [RhythmPatternController::class, 'index']);
Route::get('/patterns/{pattern}', [RhythmPatternController::class, 'show'])->name('patterns.show');
Route::get('/exercises', [RhythmExerciseController::class, 'index']);
Route::get('/exercises/{exercise}', [RhythmExerciseController::class, 'show'])->name('exercises.show');
