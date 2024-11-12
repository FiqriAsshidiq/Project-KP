<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas'; 

    protected $fillable = [
        'nama_fasilitas',
        'kategori_id',
        'stok',
        'penggunaan'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
