<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

Route::post('/pendaftaran', [PendaftaranController::class, 'postPendaftaran']);
Route::get('/pendaftaran', [PendaftaranController::class, 'getStatusPendaftaran']);
