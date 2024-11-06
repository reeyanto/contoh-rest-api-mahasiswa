<?php

use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Support\Facades\Route;


// domain.com/api/mahasiswa
Route::apiResource('/mahasiswa', MahasiswaController::class);