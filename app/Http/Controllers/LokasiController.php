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
//     public function store(Request $request)
//     {
//     $validatedData = $request->validate([
//         'latitude' => 'required|max:11',
//         'longitude' => 'required|max:11',
//     ]);

//     LokasiModel::create($validatedData);         

//     return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil ditambahkan.');
//     }

    
//     public function update(Request $request, $id)
//     {
   
//     $validatedData = $request->validate([
//         'latitude' => 'required',
//         'longitude' => 'required',
//     ]);

//     $lokasi = LokasiModel::find($id);

 
//     $lokasi->latitude = $request->latitude;
//     $lokasi->longitude = $request->longitude;
//     $lokasi->save();

//     return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil diperbarui.');
// }

//     public function destroy($id)
//     {
//         LokasiModel::destroy($id);

//         return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil dihapus.');
//     }
}
