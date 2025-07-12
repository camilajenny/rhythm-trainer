<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 *
 *
 * @method static \Specialtactics\L5Api\Models\Builder<static>|BaseModel newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|BaseModel newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|BaseModel query()
 */
	class BaseModel extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $rhythm_pattern_id
 * @property string $name
 * @property string $description
 * @property string $difficulty
 * @property int $bpm_override
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExerciseFactory factory($count = null, $state = [])
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereBpmOverride($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereDescription($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereDifficulty($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereName($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereRhythmPatternId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Exercise whereUpdatedAt($value)
 */
	class Exercise extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $user_id
 * @property int $exercise_id
 * @property array<array-key, mixed> $tap_data
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExerciseAttemptFactory factory($count = null, $state = [])
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereExerciseId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereScore($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereTapData($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereUpdatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|ExerciseAttempt whereUserId($value)
 */
	class ExerciseAttempt extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $bpm
 * @property string $time_signature
 * @property array<array-key, mixed> $pattern_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RhythmPatternFactory factory($count = null, $state = [])
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereBpm($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereName($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern wherePatternData($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereTimeSignature($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|RhythmPattern whereUpdatedAt($value)
 */
	class RhythmPattern extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property string $role_id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereDeletedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereDescription($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereName($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereRoleId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $exercise_attempt_id
 * @property int $tap_index
 * @property float $expected_time
 * @property float $actual_time
 * @property int $is_correct
 * @property float $deviation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TapEvaluationFactory factory($count = null, $state = [])
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereActualTime($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereDeviation($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereExerciseAttemptId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereExpectedTime($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereId($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereIsCorrect($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereTapIndex($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|TapEvaluation whereUpdatedAt($value)
 */
	class TapEvaluation extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property string $user_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $primary_role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role|null $primaryRole
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User newModelQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User newQuery()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User query()
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereCreatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereEmail($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereName($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User wherePassword($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User wherePrimaryRole($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereRememberToken($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereUpdatedAt($value)
 * @method static \Specialtactics\L5Api\Models\Builder<static>|User whereUserId($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\Authenticatable, \Illuminate\Contracts\Auth\Access\Authorizable, \Illuminate\Contracts\Auth\CanResetPassword, \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {public function getAuthIdentifierName(){
    }public function getAuthIdentifier(){
    }public function getAuthPasswordName(){
    }public function getAuthPassword(){
    }public function getRememberToken(){
    }public function setRememberToken($value){
    }public function getRememberTokenName(){
    }public function can($abilities,$arguments = []){
    }public function getEmailForPasswordReset(){
    }public function sendPasswordResetNotification($token){
    }public function getJWTIdentifier(){
    }public function getJWTCustomClaims(){
    }}
}

