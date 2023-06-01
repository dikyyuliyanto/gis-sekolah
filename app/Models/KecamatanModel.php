<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    use HasFactory;

    protected $table = 'kecamatan'; 

    protected $primaryKey = 'id_kecamatan'; 

    protected $fillable = ['nama_kecamatan', 'jumlah_sekolah']; 

    public $timestamps = false;
}
