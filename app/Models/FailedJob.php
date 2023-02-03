<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FailedJob
 * 
 * @property int|null $id
 * @property string|null $uuid
 * @property string|null $connection
 * @property string|null $queue
 * @property string|null $payload
 * @property string|null $exception
 * @property Carbon|null $failed_at
 *
 * @package App\Models
 */
class FailedJob extends Model
{
	protected $table = 'failed_jobs';
	public $timestamps = false;

	protected $dates = [
		'failed_at'
	];

	protected $fillable = [
		'uuid',
		'connection',
		'queue',
		'payload',
		'exception',
		'failed_at'
	];
}
