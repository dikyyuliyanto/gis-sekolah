<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kecamatanModel;
use App\Models\SekolahModel;

class PetaController extends Controller
{
    public function index (){

        $title = 'Peta Sekolah';
        $kecamatan = KecamatanModel::all();
        $sekolah = SekolahModel::all();

        $coordinates = $sekolah->map(function ($sekolah){
            return [
                'latitude'  => $sekolah->latitude,
                'longitude' => $sekolah->longitude,
            ];
        });

        return view('admin/peta_sekolah', [
            'title' => $title,
            'kecamatan' => $kecamatan,
            'sekolah' => $sekolah,
        ]);
    }
    
}