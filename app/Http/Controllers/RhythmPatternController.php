<?php

namespace App\Http\Controllers;

use App\Models\RhythmPattern;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class RhythmPatternController extends Controller
{
    /**
     * @var {{ model }} The primary model associated with this controller
     */
    public static $model = RhythmPattern::class;

    /**
     * @var null|BaseTransformer The transformer this controller should use, if overriding the model & default
     */
    public static $transformer = null;

    public function index() {
        $patterns = RhythmPattern::all(); // optionally with relationships
        return view('patterns.index', compact('patterns'));
    }
}
