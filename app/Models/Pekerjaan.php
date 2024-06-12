<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pekerjaan
 * 
 * @property int $id
 * @property string|null $nama
 * 
 * @property Collection|OrtuWali[] $ortu_walis
 *
 * @package App\Models
 */
class Pekerjaan extends Model
{
	protected $table = 'pekerjaan';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function ortu_walis()
	{
		return $this->hasMany(OrtuWali::class, 'id_pekerjaan');
	}
}
