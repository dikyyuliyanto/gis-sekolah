<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PetaController::class)->group(function () {
    Route::get('/peta', 'index');
});

// Route Kecamatan
Route::group(['prefix' => 'kecamatan'], function () {
    Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::post('/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    Route::post('/update/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::delete('/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
});

Route::controller(SekolahController::class)->group(function () {
    Route::get('/sekolah', 'index');
});

Route::controller(LokasiController::class)->group(function () {
    Route::get('/lokasi', 'index');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
});