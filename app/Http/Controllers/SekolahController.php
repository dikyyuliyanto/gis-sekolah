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
            'website' => 'required',
            'jenis_sekolah' => 'required',
            'jumlah_ppdb' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    
        // Memeriksa apakah sekolah sudah ada sebelumnya
        $existingSekolah = SekolahModel::where('nama_sekolah', $validatedData['nama_sekolah'])->first();
        if ($existingSekolah) {
            return redirect()->route('school.index')->with('error', 'Data sekolah sudah ada.');
        }
    
        SekolahModel::create($validatedData);
    
        return redirect()->route('school.index')->with('success', 'Data sekolah berhasil ditambahkan.');
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'id_kecamatan' => 'required',
            'website' => 'required',
            'jenis_sekolah' => 'required',
            'jumlah_ppdb' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $sekolah = SekolahModel::find($id);

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->id_kecamatan = $request->id_kecamatan;
        $sekolah->website = $request->website;
        $sekolah->jenis_sekolah = $request->jenis_sekolah;
        $sekolah->jumlah_ppdb = $request->jumlah_ppdb;
        $sekolah->deskripsi = $request->input('deskripsi');
        $sekolah->latitude = $request->latitude;
        $sekolah->longitude = $request->longitude;
        $sekolah->save();

        return redirect()->route('school.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }

        public function destroy($id)
        {
            SekolahModel::destroy($id);
    
            return redirect()->route('school.index')->with('success', 'Data sekolah berhasil dihapus.');
        }
    
}
