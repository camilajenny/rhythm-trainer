<?php

namespace App\Models;

use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RhythmPattern extends BaseModel
{
    use HasFactory;

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
    public function getMusicalNotationAttribute(): string
    {
        $symbols = [
            4 => '𝅝',      // Whole note
            2 => '𝅗𝅥',     // Half note
            1 => '𝅘𝅥',     // Quarter note
            0.5 => '𝅘𝅥𝅮',   // Eighth note
            0.25 => '𝅘𝅥𝅯',  // Sixteenth note
            0.125 => '𝅘𝅥𝅰', // Thirty-second note
        ];

        return collect($this->pattern_data)
            ->map(fn($note) => $symbols[$note] ?? $note)
            ->implode(' ');
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
