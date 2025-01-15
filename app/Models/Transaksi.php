<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';


    protected $fillable = [
        'tanggal', 
        'fasilitas_id', 
        'barang_masuk',
        'barang_keluar'
    ];

    // Relasi ke model Fasilitas (one-to-many)
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }

}
