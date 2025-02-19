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
            'barang_keluar' => 'required|integer|min:0',
        ]);
    
        // Temukan fasilitas berdasarkan ID
        $fasilitas = Fasilitas::find($request->fasilitas_id);
        
        // Jika stok yang diminta lebih besar dari stok yang tersedia, beri pesan error
        if ($fasilitas->stok < $request->barang_keluar) {
            return redirect()->back()->with('eror', 'Tidak bisa mengambil barang, karena stok tidak mencukupi.');
        }
    
        // Simpan data transaksi
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'fasilitas_id' => $request->fasilitas_id,
            'barang_masuk' => $request->barang_masuk,
            'barang_keluar' => $request->barang_keluar, // Simpan penggunaan barang
        ]);
    
        // Update stok fasilitas
        $fasilitas->stok += $request->barang_masuk;  // Tambah stok
        $fasilitas->stok -= $request->barang_keluar; // Kurangi stok
        $fasilitas->penggunaan += $request->barang_keluar; // Tambah penggunaan
        $fasilitas->save();
    
        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
    }
    
    // hapus
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->firstOrFail();
        $transaksi->delete();
        return redirect()->route('transaksi')->with('success', 'Fasilitas berhasil dihapus.');
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
