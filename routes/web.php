<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $agama = DB::select("SELECT * FROM agama");
    $pendidikan = DB::select("SELECT * FROM pendidikan");
    $pekerjaan = DB::select("SELECT * FROM pekerjaan");
    $asal_sekolah = DB::select("SELECT * FROM asal_sekolah");
    return view('index', ["agama" => $agama, "pendidikan" => $pendidikan, "pekerjaan" => $pekerjaan, "asal_sekolah" => $asal_sekolah]);
});
Route::get('/result', function () {
    $status = DB::select("SELECT * FROM cek_seleksi");
    return view('result', ["data" => $status]);
});
