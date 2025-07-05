<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Habitacion
 * 
 * @property int $idHABITACION
 * @property int|null $CAPACIDAD
 * @property string|null $DESCRIPCION
 * @property string|null $NOMBRE
 * @property float|null $COSTONOCHE
 * @property string|null $IMAGEN
 * @property string|null $ESTADO
 * 
 * @property Collection|Estadium[] $estadia
 * @property Collection|Tarifa[] $tarifas
 *
 * @package App\Models
 */
class Habitacion extends Model
{
	protected $table = 'habitacion';
	protected $primaryKey = 'idHABITACION';
	public $timestamps = false;

	protected $casts = [
		'CAPACIDAD' => 'int',
		'COSTONOCHE' => 'float'
	];

	protected $fillable = [
		'CAPACIDAD',
		'DESCRIPCION',
		'NOMBRE',
		'COSTONOCHE',
		'IMAGEN',
		'ESTADO'
	];

	public function estadia()
	{
		return $this->hasMany(Estadium::class, 'Habitacion_idHabitacion');
	}

	public function tarifas()
	{
		return $this->hasMany(Tarifa::class, 'Habitacion_idHabitacion');
	}
}
