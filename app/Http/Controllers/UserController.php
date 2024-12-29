<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all(); // Mengambil semua data roles
        $data['users'] = User::with('role')->get(); // Mengambil data users dengan relasi role
        return view('pengguna.index', $data); // Mengirimkan data ke view
    }

    // tambah

    public function create()
    {
        // Hanya menampilkan role pegawai (role_id = 3)
        $roles = Role::where('id', 3)->get();
        return view('pengguna.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:50',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id|in:3', // Hanya untuk role pegawai
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('pengguna')->with('success', 'Akun berhasil ditambahkan.');
    }
    
    // edit
    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil data user berdasarkan ID
        return view('pengguna.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Password opsional
        ]);

        $user = User::findOrFail($id);

        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $dataToUpdate['password'] = bcrypt($request->password); // Hash password jika diisi
        }

        $user->update($dataToUpdate);

        return redirect()->route('pengguna')->with('success', 'User berhasil diperbarui.');
    }

    // hapus
}
