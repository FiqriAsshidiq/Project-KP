<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Pengecekanfasilitas;
use Barryvdh\DomPDF\Facade\Pdf;


class PengecekanfasilitasController extends Controller
{
    public function index()
    {
        $data['fasilitas'] = Fasilitas::all();
        $data['pengecekan_fasilitas']= Pengecekanfasilitas::with('fasilitas')->get();
        return view('pengecekan.index', $data);
    }

    public function create()
    {
        $fasilitas = Fasilitas::all();
        return view('pengecekan.create', compact('fasilitas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'jumlah_rusak' => 'required|integer|min:0',
        ]);
    
        Pengecekanfasilitas::create([
            'tanggal' => now(),
            'fasilitas_id' => $request->fasilitas_id,
            'jumlah_rusak' => $request->jumlah_rusak,
        ]);
    
        return redirect()->route('pengecekan')->with('success', 'Pengecekan berhasil ditambahkan');
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
        $pengecekan_fasilitas = Pengecekanfasilitas::with('fasilitas')
                                ->whereYear('tanggal', $tahun)
                                ->whereMonth('tanggal', $bulan)
                                ->get();

        // Kirim data bulan, tahun, dan transaksi ke view
        return view('pengecekan.index', compact('pengecekan_fasilitas', 'bulan', 'tahun'));
    }

    // hapus
    // hapus
    public function destroy($id)
    {
        $pengecekan_fasilitas = Pengecekanfasilitas::where('id', $id)->firstOrFail();
        $pengecekan_fasilitas->delete();
        return redirect()->route('pengecekan')->with('success', 'Fasilitas berhasil dihapus.');
    }
    public function exportPdf($bulan, $tahun)
    {
        // Mengambil data fasilitas berdasarkan bulan dan tahun yang dipilih
        $pengecekan_fasilitas = Pengecekanfasilitas::with('fasilitas')
                            ->whereYear('tanggal', $tahun)
                            ->whereMonth('tanggal', $bulan)
                            ->get();

        // Mengenerate PDF dengan data fasilitas yang sesuai
        $pdf = PDF::loadView('laporan.fasilitas_rusak', compact('pengecekan_fasilitas', 'bulan', 'tahun'));
        
    
        // Mendownload PDF dengan nama file yang sesuai
        return $pdf->download('laporan-transaksi-' . $bulan . '-' . $tahun . '.pdf');
    }
}
