<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class PegawaiController extends Controller
{
        public function index()
        {
            $data['kamars'] = Kamar::all(); 
            return view('karyawan.index', $data);
        }
        
        public function edit($id)
        {
            $kamar = Kamar::findOrFail($id);
            return view('karyawan.edit', compact('kamar'));
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
            return redirect()->route('kamar.karyawan')->with('success', 'Kamar berhasil diubah.');
        }
        public function search(Request $request)
        {
            $search = $request->input('search');
    
            $kamars = Kamar::query()
                ->when($search, function ($query, $search) {
                    return $query->where('kondisi_kamar', 'like', "%{$search}%");
                })
                ->get();
    
            return view('karyawan.index', compact('kamars', 'search'));
        }

}
