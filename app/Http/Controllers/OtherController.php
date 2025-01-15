<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class OtherController extends Controller
{
    public function index()
        {
            $data['kamars'] = Kamar::all(); 
            return view('other.index', $data);
        }

        public function search(Request $request)
        {
            $search = $request->input('search');
    
            $kamars = Kamar::query()
                ->when($search, function ($query, $search) {
                    return $query->where('kondisi_kamar', 'like', "%{$search}%");
                })
                ->get();
    
            return view('other.index', compact('kamars', 'search'));
        }
}
