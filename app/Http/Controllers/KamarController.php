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
            'tipe_kamar' => 'required|string|max:30',
            'status_fasilitas' => 'required|string|max:30',
            'kondisi_kamar' => 'required|string|max:30',
            'status_kamar' => 'required|string|max:30',
        ]);

        Kamar::create([
            'tipe_kamar' => $request->tipe_kamar,
            'status_fasilitas' => $request->status_fasilitas,
            'kondisi_kamar' => $request->kondisi_kamar,
            'status_kamar' => $request->status_kamar,
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
            'status_fasilitas' => 'required|string|max:30',
            'kondisi_kamar' => 'required|string|max:30',
            'status_kamar' => 'required|string|max:30',
            'catatan' => ['nullable', 'string', 'max:20'],        
        ],
        [
            // Pesan error khusus
            'catatan.max' => 'tidak boleh lebih dari 30, singkat saja".',
        ]);
        $kamar->update($validated);
        return redirect()->route('kamar')->with('success', 'Kamar berhasil diubah.');
    }

    public function destroy($id)
    {
        $kamar = Kamar::where('id', $id)->firstOrFail();
        $kamar->delete();
        return redirect()->route('kamar')->with('success', 'Data Kamar Berhasil dihapus.');
    }   
    
    public function search(Request $request)
    {
        $search = $request->input('search');

        $kamars = Kamar::query()
            ->when($search, function ($query, $search) {
                return $query->where('kondisi_kamar', 'like', "%{$search}%");
            })
            ->get();

        return view('kamar.index', compact('kamars', 'search'));
    }

}
