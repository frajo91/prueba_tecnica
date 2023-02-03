<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pensul
 * 
 * @property int|null $id
 * @property int|null $fk_id_carrera
 * @property int|null $fk_id_materia
 * @property int|null $semestre
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Carrera|null $carrera
 * @property Materia|null $materia
 *
 * @package App\Models
 */
class Pensul extends Model
{
	protected $table = 'Pensul';

	protected $casts = [
		'fk_id_carrera' => 'int',
		'fk_id_materia' => 'int',
		'semestre' => 'int',
		'estado' => NULL
	];

	protected $fillable = [
		'fk_id_carrera',
		'fk_id_materia',
		'semestre',
		'estado'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'fk_id_carrera');
	}

	public function materia()
	{
		return $this->belongsTo(Materia::class, 'fk_id_materia');
	}
}
