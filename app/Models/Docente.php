<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 * 
 * @property int|null $id
 * @property string|null $nombres
 * @property int|null $nro_documento
 * @property int|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property string|null $ciudad
 * @property int|null $fk_id_tipo_documento
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TipoDocumento|null $tipo_documento
 *
 * @package App\Models
 */
class Docente extends Model
{
	protected $table = 'Docentes';

	protected $casts = [
		'nro_documento' => 'int',
		'telefono' => 'int',
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
		'fk_id_tipo_documento',
		'estado'
	];

		protected $visible = [
		'nombres',
		'nro_documento',
		'telefono',
		'correo',
		'direccion',
		'ciudad',

	];

	public function tipo_documento()
	{
		return $this->belongsTo(TipoDocumento::class, 'fk_id_tipo_documento','id');
	}
}
