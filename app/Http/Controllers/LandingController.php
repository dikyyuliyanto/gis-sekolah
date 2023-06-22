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

        public function home (){

            $sekolah = SekolahModel::join('kecamatan', 'sekolah.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->select('sekolah.*', 'kecamatan.nama_kecamatan')
            ->get();

        $kecamatan = KecamatanModel::all();

        return view('home', [
            'title' => 'Home',
            'sekolah' => $sekolah,
            'kecamatan' => $kecamatan,
        ]);
    

    }
}
