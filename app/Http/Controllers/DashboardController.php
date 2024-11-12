<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Kamar;
use App\Models\Pengecekanfasilitas;



class DashboardController extends Controller
{

    public function index()
    {
        // Menghitung jumlah produk
        $totalKamar = Kamar::count();
        
        // Total Kamar Terisi
        $totalKamarTerisi = Kamar::where('status_kamar', 'terisi')->count();
        
        // total belum bersih
        $totaBelumbersih= Kamar::where('kondisi_kamar', 'belum bersih')->count();
        

        // Menghitung jumlah transaksi
        $totalFasilitas = Fasilitas::count();

        // Total Penggunaan
        $totalPenggunaan = Fasilitas::sum('penggunaan');

        // Total Stok
        $totalStok = Fasilitas::sum('stok');

        // Menghitung jumlah transaksi
        $totalTransaksi = Transaksi::count();
        
        // Total Barang Masuk
        $totalBarangMasuk = Transaksi::sum('barang_masuk');

        // total Barang Keluar
        $totalBarangKeluar = Transaksi::sum('penggunaan_barang');
        
        // Menghitung jumlah user
        $totalUsers = User::count();

        // Menghitung jumlah Rusak
        $totalBarangRusak = Pengecekanfasilitas::sum('jumlah_rusak');

        // Mengirim data ke view
        return view('dashboard', compact('totalKamar', 'totalKamarTerisi', 'totaBelumbersih' , 'totalFasilitas' , 'totalPenggunaan' , 'totalStok' , 'totalTransaksi','totalBarangMasuk', 'totalBarangKeluar', 'totalUsers', 'totalBarangRusak' ));
    }
    
}
