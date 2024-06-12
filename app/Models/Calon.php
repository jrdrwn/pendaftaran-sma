<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Calon
 *
 * @property int $id
 * @property string|null $nisn
 * @property string|null $nik
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $tempat_kelahiran
 * @property Carbon|null $tanggal_lahir
 * @property int|null $id_agama
 * @property string|null $status_dalam_keluarga
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property int|null $id_asal_sekolah
 * @property int|null $tahun_lulus
 * @property Carbon|null $created_at
 * @property string|null $status
 *
 * @property Agama|null $agama
 * @property AsalSekolah|null $asal_sekolah
 * @property Collection|OrtuWali[] $ortu_walis
 *
 * @package App\Models
 */
class Calon extends Model
{
	protected $table = 'calon';
	public $timestamps = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int',
		'id_asal_sekolah' => 'int',
		'tahun_lulus' => 'int',
		'created_at' => 'datetime'
	];

	protected $fillable = [
		'nisn',
		'nik',
		'nama',
		'jenis_kelamin',
		'tempat_kelahiran',
		'tanggal_lahir',
		'id_agama',
		'status_dalam_keluarga',
		'alamat',
		'no_hp',
		'id_asal_sekolah',
		'tahun_lulus',
		'status'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama');
	}

	public function asal_sekolah()
	{
		return $this->belongsTo(AsalSekolah::class, 'id_asal_sekolah');
	}

	public function ortu_walis()
	{
		return $this->hasMany(OrtuWali::class, 'ortu_wali_dari_calon');
	}
}
