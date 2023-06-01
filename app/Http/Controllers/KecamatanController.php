<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel;
use Illuminate\Http\Request;

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
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required',
        'jumlah_sekolah' => 'required|integer',
    ]);

    // Simpan data kecamatan baru ke database
    // Sesuaikan dengan model dan nama tabel yang digunakan
    KecamatanModel::create([
        'nama_kecamatan' => $request->nama_kecamatan,
        'jumlah_sekolah' => $request->jumlah_sekolah,
    ]);

    // Redirect kembali ke halaman kecamatan setelah berhasil menambahkan data
    return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id)
{
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required',
        'jumlah_sekolah' => 'required|integer',
    ]);

    // Temukan data kecamatan yang akan diperbarui berdasarkan ID
    $kecamatan = KecamatanModel::find($id);

    // Perbarui data kecamatan yang ditemukan
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
