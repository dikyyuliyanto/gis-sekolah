<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
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
    Route::get('/refresh-data', [KecamatanController::class, 'refreshData'])->name('refresh.data');
});

Route::group(['prefix' => 'sekolah'], function () {
    Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::post('/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::post('/update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
    Route::get('/refresh-data', [SekolahControler::class, 'refreshData'])->name('refresh.data');

});

Route::group(['prefix' => 'lokasi'], function () {
    Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::post('/store', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::post('/update/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'authenticate');
});