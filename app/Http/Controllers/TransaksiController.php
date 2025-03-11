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
       
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'barang_masuk' => 'required|integer|min:0',
            'barang_keluar' => 'required|integer|min:0',
        ]);
    
       
        $fasilitas = Fasilitas::find($request->fasilitas_id);
        
        
        if ($fasilitas->stok < $request->barang_keluar) {
            return redirect()->back()->with('eror', 'Tidak bisa mengambil barang, karena stok tidak mencukupi.');
        }
    
        
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'fasilitas_id' => $request->fasilitas_id,
            'barang_masuk' => $request->barang_masuk,
            'barang_keluar' => $request->barang_keluar, 
        ]);
    
        
        $fasilitas->stok += $request->barang_masuk;  
        $fasilitas->stok -= $request->barang_keluar; 
        $fasilitas->penggunaan += $request->barang_keluar; 
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
        
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
    
       
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
    
        
        $transaksi = Transaksi::with('fasilitas')
                    ->whereYear('tanggal', $tahun)
                    ->whereMonth('tanggal', $bulan)
                    ->get();
    
        
        return view('transaksi.index', compact('transaksi', 'bulan', 'tahun'));
    }
    
    public function exportPdf($bulan, $tahun)
    {
        
        $transaksi = Transaksi::with('fasilitas')
                    ->whereYear('tanggal', $tahun)
                    ->whereMonth('tanggal', $bulan)
                    ->get();

        
        $pdf = PDF::loadView('laporan.transaksi', compact('transaksi', 'bulan', 'tahun'));
        
    
        
        return $pdf->download('laporan-transaksi-' . $bulan . '-' . $tahun . '.pdf');
    }


}
