<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadium
 * 
 * @property int $idEstadia
 * @property Carbon|null $Fecha_Inicio
 * @property Carbon|null $Fecha_Fin
 * @property Carbon|null $Fecha_Registro
 * @property float|null $Costo
 * @property int $Habitacion_idHabitacion
 * 
 * @property Habitacion $habitacion
 * @property HuespedHasEstadium|null $huesped_has_estadium
 * @property Collection|Novedade[] $novedades
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Estadium extends Model
{
	protected $table = 'estadia';
	protected $primaryKey = 'idEstadia';
	public $timestamps = false;

	protected $casts = [
		'Fecha_Inicio' => 'datetime',
		'Fecha_Fin' => 'datetime',
		'Fecha_Registro' => 'datetime',
		'Costo' => 'float',
		'Habitacion_idHabitacion' => 'int'
	];

	protected $fillable = [
		'Fecha_Inicio',
		'Fecha_Fin',
		'Fecha_Registro',
		'Costo',
		'Habitacion_idHabitacion'
	];

	public function habitacion()
	{
		return $this->belongsTo(Habitacion::class, 'Habitacion_idHabitacion');
	}

	public function huesped_has_estadium()
	{
		return $this->hasOne(HuespedHasEstadium::class, 'Estadia_idEstadia');
	}

	public function novedades()
	{
		return $this->hasMany(Novedade::class, 'Estadia_idEstadia');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'Estadia_idEstadia');
	}
}
