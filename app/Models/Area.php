<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int|null $id
 * @property string|null $nombre_area
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'Areas';

	protected $casts = [
		'estado' => NULL
	];

	protected $fillable = [
		'nombre_area',
		'estado'
	];
    protected $visible=[
        'nombre_area',
        'id'
    ];
}
