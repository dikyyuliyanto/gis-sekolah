<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KecamatanController extends Controller
{
    public function index()
    {
        $title = 'Kecamatan';
        $kecamatan = KecamatanModel::all();

        return view('admin/kecamatan', [
            'title' => $title,
            'kecamatan' => $kecamatan,
        ]);
    }
    // tambah data
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required',
        'jumlah_sekolah' => 'required|integer',
    ]);

    KecamatanModel::create($validatedData);         

    return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil ditambahkan.');
    }
    
    // Edit data
    public function update(Request $request, $id)
    {
   
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required',
        'jumlah_sekolah' => 'required|integer',
    ]);

    $kecamatan = KecamatanModel::find($id);

 
    $kecamatan->nama_kecamatan = $request->nama_kecamatan;
    $kecamatan->jumlah_sekolah = $request->jumlah_sekolah;
    $kecamatan->save();
    return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil diperbarui.');
}
// Hapus Data
    public function destroy($id)
    {
        KecamatanModel::destroy($id);

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil dihapus.');
    }
}
