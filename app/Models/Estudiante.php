<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 * 
 * @property int|null $id
 * @property string|null $nombres
 * @property int|null $nro_documento
 * @property int|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property string|null $ciudad
 * @property int|null $semestre
 * @property int|null $fk_id_carrera
 * @property int|null $fk_id_tipo_documento
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Carrera|null $carrera
 * @property TipoDocumento|null $tipo_documento
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'Estudiantes';

	protected $casts = [
		'nro_documento' => 'int',
		'telefono' => 'int',
		'semestre' => 'int',
		'fk_id_carrera' => 'int',
		'fk_id_tipo_documento' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombres',
		'nro_documento',
		'telefono',
		'correo',
		'direccion',
		'ciudad',
		'semestre',
		'fk_id_carrera',
		'fk_id_tipo_documento',
		'estado'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'fk_id_carrera');
	}

	public function tipo_documento()
	{
		return $this->belongsTo(TipoDocumento::class, 'fk_id_tipo_documento');
	}
}
