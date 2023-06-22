<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahModel extends Model
{
    use HasFactory;

    protected $table = 'sekolah'; 

    protected $primaryKey = 'id_sekolah'; 

    protected $fillable = ['id_kecamatan','nama_sekolah', 'alamat', 'website','jenis_sekolah', 'jumlah_ppdb', 'deskripsi', 'latitude', 'longitude']; 

    public $timestamps = false;

    // public function kecamatan()
    // {
    //     return $this->belongsTo(KecamatanModel::class, 'id_kecamatan');
    // }
    
}
