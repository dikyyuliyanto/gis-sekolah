<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiModel extends Model
{
    use HasFactory;
    protected $table = 'lokasi'; 

    protected $primaryKey = 'id_lokasi'; 

    protected $fillable = ['latitude', 'longitude']; 

    public $timestamps = false;
}
