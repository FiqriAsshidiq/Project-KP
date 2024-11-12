<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $data['kamars'] = Kamar::all(); 
        return view('kamar.index', $data);
    }

    public function create()
    {
        return view('kamar.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe_kamar' => 'required|in:single room,double room',
            'status_fasilitas' => 'required|in:lengkap,tidak lengkap',
            'kondisi_kamar' => 'required|in:bersih,belum bersih',
            'status_kamar' => 'required|in:terisi,kosong',
            'catatan' => 'nullable|string|max:50',
        ]);

        Kamar::create([
            'tipe_kamar' => $request->tipe_kamar,
            'status_fasilitas' => $request->status_fasilitas,
            'kondisi_kamar' => $request->kondisi_kamar,
            'status_kamar' => $request->status_kamar,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('kamar')->with('success', 'Kamar berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $validated = $request->validate([
            'status_fasilitas' => 'required|in:lengkap,tidak lengkap',
            'status_kamar' => 'required|in:terisi,kosong',
            'catatan' => 'nullable|string|max:255',
        ]);

        $kamar->update($validated);

        $notification = [
            'message' => 'Data kamar berhasil diperbaharui',
            'alert-type' => 'success'
        ];

        return redirect()->route('kamar')->with($notification);
    }

    public function destroy($id)
    {
        $kamar = Kamar::where('id', $id)->firstOrFail();
        $kamar->delete();
        return redirect()->route('Kamar')->with('success', 'Transaksi berhasil dihapus.');
    }   
    
}
