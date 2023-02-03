<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 * 
 * @property int|null $id
 * @property string|null $nombre_carrera
 * @property int|null $n_semestres
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Carrera extends Model
{
	protected $table = 'Carreras';

	protected $casts = [
		'n_semestres' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombre_carrera',
		'n_semestres',
		'estado'
	];

	protected $visible =[
		'nombre_carrera',
		'n_semestres',
		'id',
	];
}
