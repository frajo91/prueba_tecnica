<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDocumento
 * 
 * @property int|null $id
 * @property string|null $nombre_documento
 * @property |null $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class TipoDocumento extends Model
{
	protected $table = 'Tipo_documento';

	protected $casts = [
		'estado' => NULL
	];

	protected $fillable = [
		'nombre_documento',
		'estado'
	];

    protected $visible = [
        'nombre_documento',
        'id'
    ];
}
