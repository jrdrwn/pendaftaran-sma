<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{

    public function postPendaftaran(Request $req)
    {
        try {
            $calon = DB::statement("call create_calon('$req->nisn', '$req->nik', '$req->nama', '$req->jenis_kelamin', '$req->tempat_kelahiran', '$req->tanggal_lahir', '$req->id_agama', '$req->status_dalam_keluarga', '$req->alamat', '$req->no_hp', '$req->id_sekolah_asal', '$req->tahun_lulus')");
            $calonId = DB::select("select getCalonIdByNik('$req->nik') as calon_id")[0]->calon_id;
            $ayah = DB::statement("call create_ortu_wali('ayah', '$calonId', '$req->nama_ayah', '$req->id_pendidikan_ayah', '$req->id_pekerjaan_ayah',  '$req->penghasilan_ayah', '$req->no_hp_ayah')");
            $ibu = DB::statement("call create_ortu_wali('ibu', '$calonId', '$req->nama_ibu', '$req->id_pendidikan_ibu', '$req->id_pekerjaan_ibu',  '$req->penghasilan_ibu', '$req->no_hp_ibu')");

            if (trim($req->nama_wali) != '') {
                $wali = DB::statement("call create_ortu_wali('wali', '$calonId', '$req->nama_wali', '$req->id_pendidikan_wali', '$req->id_pekerjaan_wali',  '$req->penghasilan_wali', '$req->no_hp_wali')");
            }

            return json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan!']);
        } catch (\Exception $e) {
            return json_encode(['status' => 'error', 'message' => 'Data gagal disimpan!']);
        }
    }

    public function getStatusPendaftaran()
    {
        $status = DB::select("SELECT * FROM cek_seleksi");
        return json_encode($status);
    }
}
