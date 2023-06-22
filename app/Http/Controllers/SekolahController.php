<?php

namespace App\Http\Controllers;
use App\Models\SekolahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\KecamatanModel;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = SekolahModel::join('kecamatan', 'sekolah.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->select('sekolah.*', 'kecamatan.nama_kecamatan')
            ->get();

        $kecamatan = KecamatanModel::all();

        return view('admin.sekolah', [
            'title' => 'sekolah',
            'sekolah' => $sekolah,
            'kecamatan' => $kecamatan,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'id_kecamatan' => 'required',
            'foto' => 'required',
            'jenis_sekolah' => 'required',
            'jumlah_ppdb' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        SekolahModel::create($validatedData);

        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'id_kecamatan' => 'required',
            'foto' => 'required',
            'jenis_sekolah' => 'required',
            'jumlah_ppdb' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $sekolah = SekolahModel::find($id);

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jenis_sekolah = $request->jenis_sekolah;
        $sekolah->jumlah_ppdb = $request->jumlah_ppdb;
        $sekolah->deskripsi = $request->deskripsi;
        $sekolah->latitude = $request->latitude;
        $sekolah->longitude = $request->longitude;
        $sekolah->save();

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }

        public function destroy($id)
        {
            // Hapus data kecamatan berdasarkan ID
            // Sesuaikan dengan model dan nama tabel yang digunakan
            SekolahModel::destroy($id);
    
            // Redirect kembali ke halaman kecamatan setelah berhasil menghapus data
            return redirect()->route('sekolah.index')->with('success', 'Data kecamatan berhasil dihapus.');
        }
    
}
