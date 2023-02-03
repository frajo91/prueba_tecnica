<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 * 
 * @property int|null $id
 * @property string|null $nombres
 * @property string|null $descripcion
 * @property int|null $creditos
 * @property |null $obligatoria
 * @property string|null $direccion
 * @property int|null $fk_id_area
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Area|null $area
 *
 * @package App\Models
 */
class Materia extends Model
{
	protected $table = 'Materias';

	protected $casts = [
		'creditos' => 'int',
		'obligatoria' => 'int',
		'fk_id_area' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombres',
		'descripcion',
		'creditos',
		'obligatoria',
		'fk_id_area',
		'estado'
	];

	public function area()
	{
		return $this->belongsTo(Area::class, 'fk_id_area');
	}
}
