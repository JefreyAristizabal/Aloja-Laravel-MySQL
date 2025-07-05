<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $idPagos
 * @property Carbon|null $Fecha_Pago
 * @property float|null $Valor
 * @property int $Empleado_idEmpleado
 * @property int $Estadia_idEstadia
 * @property int $HUESPED_idHUESPED
 * @property string|null $Imagen
 * @property string|null $Observacion
 * 
 * @property Empleado $empleado
 * @property Estadium $estadium
 * @property Huesped $huesped
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pagos';
	public $timestamps = false;

	protected $casts = [
		'Fecha_Pago' => 'datetime',
		'Valor' => 'float',
		'Empleado_idEmpleado' => 'int',
		'Estadia_idEstadia' => 'int',
		'HUESPED_idHUESPED' => 'int'
	];

	protected $fillable = [
		'Fecha_Pago',
		'Valor',
		'Empleado_idEmpleado',
		'Estadia_idEstadia',
		'Imagen',
		'Observacion'
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'Empleado_idEmpleado');
	}

	public function estadium()
	{
		return $this->belongsTo(Estadium::class, 'Estadia_idEstadia');
	}

	public function huesped()
	{
		return $this->belongsTo(Huesped::class, 'HUESPED_idHUESPED');
	}
}
