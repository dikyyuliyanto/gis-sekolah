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

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required',
        'jumlah_sekolah' => 'required|integer',
    ]);

    KecamatanModel::create($validatedData);         

    return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil ditambahkan.');
    }
    
    
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

    // Redirect kembali ke halaman kecamatan setelah berhasil memperbarui data
    return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil diperbarui.');
}

    public function destroy($id)
    {
        // Hapus data kecamatan berdasarkan ID
        // Sesuaikan dengan model dan nama tabel yang digunakan
        KecamatanModel::destroy($id);

        // Redirect kembali ke halaman kecamatan setelah berhasil menghapus data
        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil dihapus.');
    }
}
