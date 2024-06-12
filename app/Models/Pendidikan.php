<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pendidikan
 * 
 * @property int $id
 * @property string|null $nama
 * 
 * @property Collection|OrtuWali[] $ortu_walis
 *
 * @package App\Models
 */
class Pendidikan extends Model
{
	protected $table = 'pendidikan';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function ortu_walis()
	{
		return $this->hasMany(OrtuWali::class, 'id_pendidikan_terakhir');
	}
}
