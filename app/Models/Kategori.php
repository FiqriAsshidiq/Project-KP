<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    // Relasi ke model Fasilitas (satu kategori memiliki banyak fasilitas)
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }
}
