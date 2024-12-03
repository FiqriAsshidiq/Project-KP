<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TransaksiController extends Controller
{
    public function index()
    {
        $data['fasilitas'] = Fasilitas::all();
        $data['transaksi'] = Transaksi::with('fasilitas')->get();
        return view('transaksi.index', $data); 
    }

    public function create()
    {
        $fasilitas = Fasilitas::all();
        return view('transaksi.create', compact('fasilitas'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'barang_masuk' => 'required|integer|min:0',
            'penggunaan_barang' => 'required|integer|min:0',
        ]);
    
        // Simpan data transaksi
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'fasilitas_id' => $request->fasilitas_id,
            'barang_masuk' => $request->barang_masuk,
            'penggunaan_barang' => $request->penggunaan_barang, // Simpan penggunaan barang
        ]);
    
        // Temukan fasilitas berdasarkan ID
        $fasilitas = Fasilitas::find($request->fasilitas_id);
        $fasilitas->stok += $request->barang_masuk; 
        if ($fasilitas->stok - $request->penggunaan_barang < 0) {
            // Jika stok tersisa kurang dari 4, return dengan error message
            return redirect()->back()->with('error', 'tidak bisa mengambil barang, karena stok 0');
        }
        $fasilitas->stok -= $request->penggunaan_barang;  // Kurangi stok
        $fasilitas->penggunaan += $request->penggunaan_barang;  // Tambah penggunaan
        $fasilitas->save();
        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
    }
        
    public function search(Request $request)
    {
        // Validasi input bulan dan tahun
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
    
        // Ambil data bulan dan tahun
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
    
        // Ambil data transaksi berdasarkan bulan dan tahun
        $transaksi = Transaksi::with('fasilitas')
                    ->whereYear('tanggal', $tahun)
                    ->whereMonth('tanggal', $bulan)
                    ->get();
    
        // Kirim data bulan, tahun, dan transaksi ke view
        return view('transaksi.index', compact('transaksi', 'bulan', 'tahun'));
    }
    
    public function exportPdf($bulan, $tahun)
    {
        // Mengambil data fasilitas berdasarkan bulan dan tahun yang dipilih
        $transaksi = Transaksi::with('fasilitas')
                    ->whereYear('tanggal', $tahun)
                    ->whereMonth('tanggal', $bulan)
                    ->get();

        // Mengenerate PDF dengan data fasilitas yang sesuai
        $pdf = PDF::loadView('laporan.transaksi', compact('transaksi', 'bulan', 'tahun'));
        
    
        // Mendownload PDF dengan nama file yang sesuai
        return $pdf->download('laporan-transaksi-' . $bulan . '-' . $tahun . '.pdf');
    }






}
