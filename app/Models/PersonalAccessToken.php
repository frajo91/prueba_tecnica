<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonalAccessToken
 * 
 * @property int|null $id
 * @property string|null $tokenable_type
 * @property int|null $tokenable_id
 * @property string|null $name
 * @property string|null $token
 * @property string $abilities
 * @property Carbon $last_used_at
 * @property Carbon $expires_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class PersonalAccessToken extends Model
{
	protected $table = 'personal_access_tokens';

	protected $casts = [
		'tokenable_id' => 'int'
	];

	protected $dates = [
		'last_used_at',
		'expires_at'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'tokenable_type',
		'tokenable_id',
		'name',
		'token',
		'abilities',
		'last_used_at',
		'expires_at'
	];
}
