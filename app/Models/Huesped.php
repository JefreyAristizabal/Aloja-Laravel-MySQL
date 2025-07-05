<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Huesped
 * 
 * @property int $idHUESPED
 * @property string|null $Nombre_completo
 * @property string|null $tipo_documento
 * @property string $numero_documento
 * @property string|null $Telefono_huesped
 * @property string|null $Origen
 * @property string|null $Nombre_Contacto
 * @property string|null $Telefono_contacto
 * @property string|null $Observaciones
 * @property string|null $observaciones2
 * 
 * @property HuespedHasEstadium|null $huesped_has_estadium
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Huesped extends Model
{
	protected $table = 'huesped';
	protected $primaryKey = 'idHUESPED';
	public $timestamps = false;

	protected $fillable = [
		'Nombre_completo',
		'tipo_documento',
		'numero_documento',
		'Telefono_huesped',
		'Origen',
		'Nombre_Contacto',
		'Telefono_contacto',
		'Observaciones',
		'observaciones2'
	];

	public function huesped_has_estadium()
	{
		return $this->hasOne(HuespedHasEstadium::class, 'HUESPED_idHUESPED');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'HUESPED_idHUESPED');
	}
}
