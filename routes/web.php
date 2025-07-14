<?php

use App\Http\Controllers\RhythmExerciseController;
use App\Http\Controllers\RhythmPatternController;
use Illuminate\Support\Facades\Route;

// Non-API web routes, useful for some incoming webhooks
Route::get('/patterns', [RhythmPatternController::class, 'index']);
Route::get('/exercises', [RhythmExerciseController::class, 'index']);
