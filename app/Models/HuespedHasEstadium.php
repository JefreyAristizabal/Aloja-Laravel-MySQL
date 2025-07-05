<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HuespedHasEstadium
 * 
 * @property int $HUESPED_idHUESPED
 * @property int $Estadia_idEstadia
 * 
 * @property Estadium $estadium
 * @property Huesped $huesped
 *
 * @package App\Models
 */
class HuespedHasEstadium extends Model
{
	protected $table = 'huesped_has_estadia';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'HUESPED_idHUESPED' => 'int',
		'Estadia_idEstadia' => 'int'
	];

	protected $fillable = [
		'HUESPED_idHUESPED',
		'Estadia_idEstadia'
	];

	public function estadium()
	{
		return $this->belongsTo(Estadium::class, 'Estadia_idEstadia');
	}

	public function huesped()
	{
		return $this->belongsTo(Huesped::class, 'HUESPED_idHUESPED');
	}
}
