<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrtuWali
 * 
 * @property int $id
 * @property string|null $peran
 * @property int|null $ortu_wali_dari_calon
 * @property string|null $nama
 * @property int|null $id_pendidikan_terakhir
 * @property int|null $id_pekerjaan
 * @property float|null $penghasilan_per_bulan
 * @property string|null $no_hp
 * 
 * @property Calon|null $calon
 * @property Pendidikan|null $pendidikan
 * @property Pekerjaan|null $pekerjaan
 *
 * @package App\Models
 */
class OrtuWali extends Model
{
	protected $table = 'ortu_wali';
	public $timestamps = false;

	protected $casts = [
		'ortu_wali_dari_calon' => 'int',
		'id_pendidikan_terakhir' => 'int',
		'id_pekerjaan' => 'int',
		'penghasilan_per_bulan' => 'float'
	];

	protected $fillable = [
		'peran',
		'ortu_wali_dari_calon',
		'nama',
		'id_pendidikan_terakhir',
		'id_pekerjaan',
		'penghasilan_per_bulan',
		'no_hp'
	];

	public function calon()
	{
		return $this->belongsTo(Calon::class, 'ortu_wali_dari_calon');
	}

	public function pendidikan()
	{
		return $this->belongsTo(Pendidikan::class, 'id_pendidikan_terakhir');
	}

	public function pekerjaan()
	{
		return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
	}
}
