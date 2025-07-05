<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarifa
 * 
 * @property int $idTarifa
 * @property string|null $Modalidad
 * @property int|null $NroHuespedes
 * @property float|null $Valor
 * @property int $Habitacion_idHabitacion
 * 
 * @property Habitacion $habitacion
 *
 * @package App\Models
 */
class Tarifa extends Model
{
	protected $table = 'tarifa';
	protected $primaryKey = 'idTarifa';
	public $timestamps = false;

	protected $casts = [
		'NroHuespedes' => 'int',
		'Valor' => 'float',
		'Habitacion_idHabitacion' => 'int'
	];

	protected $fillable = [
		'Modalidad',
		'NroHuespedes',
		'Valor',
		'Habitacion_idHabitacion'
	];

	public function habitacion()
	{
		return $this->belongsTo(Habitacion::class, 'Habitacion_idHabitacion');
	}
}
