<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class RhythmExerciseController extends Controller
{
    /**
     * @var {{ model }} The primary model associated with this controller
     */
    public static $model = Exercise::class;

    /**
     * @var null|BaseTransformer The transformer this controller should use if overriding the model & default
     */
    public static $transformer = null;

    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    public function show(Exercise $exercise) {
        $exercise->load('rhythmTracks.rhythmPattern');
        return view('exercises.show', compact('exercise'));
    }
}
