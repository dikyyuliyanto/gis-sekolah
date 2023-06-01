<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index (){
        return view ('admin/lokasi sekolah', [
            'title' => 'Lokasi Sekolah',
        ]);
    }
} 