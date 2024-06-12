<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AsalSekolah
 * 
 * @property int $id
 * @property string|null $nama
 * @property string|null $status
 * @property string|null $alamat
 * 
 * @property Collection|Calon[] $calons
 *
 * @package App\Models
 */
class AsalSekolah extends Model
{
	protected $table = 'asal_sekolah';
	public $timestamps = false;

	protected $fillable = [
		'nama',
		'status',
		'alamat'
	];

	public function calons()
	{
		return $this->hasMany(Calon::class, 'id_asal_sekolah');
	}
}
