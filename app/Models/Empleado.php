<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $idEmpleado
 * @property string|null $Nombre_Completo
 * @property string|null $Usuario
 * @property string|null $Password
 * @property string|null $Rol
 * 
 * @property Collection|OtroIngreso[] $otro_ingresos
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	protected $primaryKey = 'idEmpleado';
	public $timestamps = false;

	protected $fillable = [
		'Nombre_Completo',
		'Usuario',
		'Password',
		'Rol'
	];

	public function otro_ingresos()
	{
		return $this->hasMany(OtroIngreso::class, 'Empleado_idEmpleado1');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'Empleado_idEmpleado');
	}
}
