<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agama
 * 
 * @property int $id
 * @property string|null $nama
 * 
 * @property Collection|Calon[] $calons
 *
 * @package App\Models
 */
class Agama extends Model
{
	protected $table = 'agama';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function calons()
	{
		return $this->hasMany(Calon::class, 'id_agama');
	}
}
