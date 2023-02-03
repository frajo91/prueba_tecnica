<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Relacional
 * 
 * @property int|null $id
 * @property int|null $fk_id_estudiante
 * @property int|null $fk_id_docente
 * @property int|null $fk_id_pensul
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Estudiante|null $estudiante
 * @property Docente|null $docente
 * @property Pensul|null $pensul
 *
 * @package App\Models
 */
class Relacional extends Model
{
	protected $table = 'Relacional';

	protected $casts = [
		'fk_id_estudiante' => 'int',
		'fk_id_docente' => 'int',
		'fk_id_pensul' => 'int',
		'estado' => NULL
	];

	protected $fillable = [
		'fk_id_estudiante',
		'fk_id_docente',
		'fk_id_pensul',
		'estado'
	];

	public function estudiante()
	{
		return $this->belongsTo(Estudiante::class, 'fk_id_estudiante');
	}

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'fk_id_docente');
	}

	public function pensul()
	{
		return $this->belongsTo(Pensul::class, 'fk_id_pensul');
	}
}
