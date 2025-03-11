<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
 


class FasilitasController extends Controller
{
    public function index()
    {
        $data['kategoris'] = Kategori::all();
        $data['fasilitas'] = Fasilitas::with('kategori')->get();
        return view('fasilitas.index', $data); 
    }


    public function laporanFasilitas()
    {
        $data['kategoris'] = Kategori::all();
        $data['fasilitas'] = Fasilitas::with('kategori')->get();
        return view('laporan.fasilitas', $data);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('fasilitas.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/', 
                'max:20',
                'unique:fasilitas,nama_fasilitas', 
            ],
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            
            'nama_fasilitas.regex' => 'Nama fasilitas hanya boleh berisi huruf dan spasi, contoh "Kasur".',
            'nama_fasilitas.unique' => 'Nama fasilitas sudah ada, silakan gunakan nama lain.',
        ]);    
        
        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'kategori_id' => $request->kategori_id,
        ]);
    
        
        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil ditambahkan.');
    }
            
        public function edit($id)
        {
            $fasilitas = Fasilitas::where('id', $id)->firstOrFail();
            return view('fasilitas.edit', compact('fasilitas'));
        }

        public function update(Request $request, $id)
        {
            
        $request->validate([
            'nama_fasilitas' => ['required','string','regex:/^[a-zA-Z\s]+$/','unique:fasilitas,nama_fasilitas',],
        ], 
        [
            
            'nama_fasilitas.regex' => 'Nama fasilitas hanya boleh berisi huruf dan spasi, contoh "Kasur".',
            'nama_fasilitas.unique' => 'Nama fasilitas sudah ada, silakan gunakan nama lain.',
        ]);    
       
        $fasilitas = Fasilitas::findOrFail($id);
                
        
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save(); 
    
        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil diperbarui.');
    }
    


    public function destroy($id)
    {
        $fasilitas = Fasilitas::where('id', $id)->firstOrFail();
        $fasilitas->delete();
        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function search(Request $request)
    {
        
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
    
        
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
    
        
        $fasilitas = Fasilitas::whereYear('updated_at', $tahun)
                    ->whereMonth('updated_at', $bulan)
                    ->get();
    
        
        return view('fasilitas.index', compact('fasilitas', 'bulan', 'tahun'));
    }
    
    
    public function exportPdf($bulan, $tahun)
    {
        
        $fasilitas = Fasilitas::whereYear('updated_at', $tahun)
                             ->whereMonth('updated_at', $bulan)
                             ->get();
        
        
        $pdf = PDF::loadView('laporan.fasilitas', compact('fasilitas', 'bulan', 'tahun'));
    
        
        return $pdf->download('laporan-fasilitas-' . $bulan . '-' . $tahun . '.pdf');
    }
        
    
}
