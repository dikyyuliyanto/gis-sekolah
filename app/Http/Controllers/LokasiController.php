<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use App\Models\SekolahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LokasiController extends Controller
{
    public function index (){

        $title = 'Lokasi';

        $sekolah = SekolahModel::all();

        return view ('admin/lokasi sekolah', [
            'title' => 'Lokasi Sekolah',
            'sekolah'=> $sekolah,
        ]);
    }
}
