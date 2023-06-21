<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;
use App\Models\KecamatanModel;

class LandingController extends Controller
{
    public function index (){

        $kecamatan = KecamatanModel::all();
        $sekolah = SekolahModel::all();

        return view ('welcome', [
            'title' => 'Selamat Datang',
            'kecamatan' => $kecamatan,
            'sekolah' => $sekolah,
        ]);
    }
}
