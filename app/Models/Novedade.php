<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Novedade
 * 
 * @property int $idNovedades
 * @property string|null $Descripcion
 * @property int $Estadia_idEstadia
 * 
 * @property Estadium $estadium
 *
 * @package App\Models
 */
class Novedade extends Model
{
	protected $table = 'novedades';
	protected $primaryKey = 'idNovedades';
	public $timestamps = false;

	protected $casts = [
		'Estadia_idEstadia' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'Estadia_idEstadia'
	];

	public function estadium()
	{
		return $this->belongsTo(Estadium::class, 'Estadia_idEstadia');
	}
}
