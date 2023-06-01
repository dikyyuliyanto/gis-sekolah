<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index (){
        return view ('admin/peta_sekolah', [
            'title' => 'Peta Sekolah',
        ]);
    }
}
