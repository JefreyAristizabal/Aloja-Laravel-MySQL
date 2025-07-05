<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OtroIngreso
 * 
 * @property int $idOtro_Ingreso
 * @property Carbon|null $Fecha_Registro
 * @property int|null $Empleado_idEmpleado
 * @property int $Empleado_idEmpleado1
 * 
 * @property Empleado $empleado
 *
 * @package App\Models
 */
class OtroIngreso extends Model
{
	protected $table = 'otro_ingreso';
	protected $primaryKey = 'idOtro_Ingreso';
	public $timestamps = false;

	protected $casts = [
		'Fecha_Registro' => 'datetime',
		'Empleado_idEmpleado' => 'int',
		'Empleado_idEmpleado1' => 'int'
	];

	protected $fillable = [
		'Fecha_Registro',
		'Empleado_idEmpleado',
		'Empleado_idEmpleado1'
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'Empleado_idEmpleado1');
	}
}
