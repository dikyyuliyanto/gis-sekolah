<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use App\Models\SekolahModel;
use App\Models\LokasiModel;

class DashboardController extends Controller
{
    public function index()
{
    $kecamatan = KecamatanModel::all();
    $sekolah = SekolahModel::all();
    $lokasi = LokasiModel::all();
    $sekolahCount = SekolahModel::count();
    $kecamatanCount = KecamatanModel::count();
    $lokasiCount = LokasiModel::count();

    return view('admin/dashboard', [
        'title' => 'dashboard',
        'kecamatan' => $kecamatan,
        'lokasi' => $lokasi,
        'sekolah' => $sekolah,
        'sekolahCount' => $sekolahCount,
        'kecamatanCount' => $kecamatanCount,
        'lokasiCount' => $lokasiCount,
    ]);
}

}

