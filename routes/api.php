<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\PenggajianController;

Route::resource('karyawan', KaryawanController::class)->except([
    'create', 'edit'
]);

Route::resource('penggajian', PenggajianController::class)->except([
    'create', 'edit'
]);