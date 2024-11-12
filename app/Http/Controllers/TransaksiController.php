<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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
    
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->firstOrFail();
        $transaksi->delete();
        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
    
    public function search(Request $request)
    {
    // Validasi input bulan dan tahun
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

    // Ambil data fasilitas berdasarkan bulan dan tahun
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $fasilitas = Fasilitas::whereYear('updated_at', $tahun)
                    ->whereMonth('updated_at', $bulan)
                    ->get();

        // Tampilkan data yang sesuai dengan pencarian
        return view('fasilitas.index', compact('fasilitas'));
    }


}
