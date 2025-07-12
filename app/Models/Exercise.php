<?php

namespace App\Models;

use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends BaseModel
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
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'description', 'difficulty', 'bpm_override'];

    /**
     * @var array The attributes that should be hidden for arrays and API output
     */
    protected $hidden = [];

    /**
     * Return the validation rules for this model
     *
     * @return array Rules
     */
    public function getValidationRules(): array
    {
        return [];
    }

}
