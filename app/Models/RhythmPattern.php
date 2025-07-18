<?php

namespace App\Models;

use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RhythmPattern extends BaseModel
{
    use HasFactory;

    public $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * @var null|array What relations should one model of this entity be returned with, from a relevant controller
     */
    public static ?array $itemWith = [];

    /**
     * @var null|array What relations should a collection of models of this entity be returned with, from a relevant controller
     * If left null, then $itemWith will be used
     */
    public static ?array $collectionWith = null;

    /**
     * @var null|BaseTransformer The transformer to use for this model if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'bpm', 'time_signature', 'pattern_data'];

    /**
     * @var array The attributes that should be hidden for arrays and API output
     */
    protected $hidden = [];

    protected $casts = [
        'pattern_data' => 'array',
    ];

    /**
     * Convert numeric note values to musical notation symbols
     */
    public function getMusicalNotationAttribute(): array
    {
        $symbols = [
            "4" => "\u{1D15D}",      // Whole note (U+1D15D)
            "2" => "\u{1D15E}",      // Half note (U+1D15E)
            "1" => "\u{1D15F}",      // Quarter note (U+1D15F)
            "0.5" => "\u{1D160}",    // Eighth note (U+1D160)
            "0.25" => "\u{1D161}",   // Sixteenth note (U+1D161)
            "0.125" => "\u{1D162}",  // Thirty-second note (U+1D162)
        ];

        return collect($this->pattern_data)
            ->map(fn($note) => $symbols[(string)$note] ?? $note)
            ->zip($this->pattern_data)
            ->toArray();
    }

    /**
     * Return the validation rules for this model
     *
     * @return array Rules
     */
    public function getValidationRules(): array
    {
        return [];
    }

    public function rhythmTracks()
    {
        return $this->hasMany(RhythmTrack::class);
    }
}
