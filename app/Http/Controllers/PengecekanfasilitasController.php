<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Pengecekanfasilitas;

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
            'fasilitas_id' => $request->fasilitas_id,
            'jumlah_rusak' => $request->jumlah_rusak,
        ]);
    
        return redirect()->route('pengecekan')->with('success', 'Pengecekan berhasil ditambahkan');
    }
    
}
