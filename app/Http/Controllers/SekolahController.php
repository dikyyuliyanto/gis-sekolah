<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index (){
        return view ('admin/sekolah', [
            'title' => 'sekolah',
        ]);
    }
}