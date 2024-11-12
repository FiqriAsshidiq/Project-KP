<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengecekanfasilitas extends Model
{
    use HasFactory;
    
    protected $table = 'pengecekan_fasilitas';

    protected $fillable = [
        'fasilitas_id',
        'jumlah_rusak'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }

}
