<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all(); 
        $data['users'] = User::with('role')->get(); 
        return view('user.index', $data); 
    }

    // tambah

    public function create()
    {
        
        $roles = Role::where('id', 3)->get();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30|unique:users,name',
            'email' => 'required|email|unique:users,email|max:30',
            'Telphone' => 'required|string|unique:users,Telphone|max:30',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ], [
            
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi, contoh "Jaki Fudin".',
            'name.unique' => 'Nama sudah ada, silakan gunakan nama lain.',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'Telphone.unique' => 'Nomor telepon sudah terdaftar, gunakan nomor lain.',
        ]);
    
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Telphone' => $request->Telphone,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);
    
        return redirect()->route('user')->with('success', 'Akun berhasil ditambahkan.');
    }
    
    
    // edit
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            
            'Telphone' => 'required|string|max:30',
            'email' => 'required|email|max:30|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', 
            'name' => ['required','string','regex:/^[a-zA-Z\s]+$/','unique:users,name',],
        ], 
        [
            
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi, contoh "Kasur".',
            'name.unique' => 'Nama name sudah ada, silakan gunakan nama lain.',
        ]);

        $user = User::findOrFail($id);

        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'Telphone' => $request->Telphone,
        ];

        if ($request->password) {
            $dataToUpdate['password'] = bcrypt($request->password); // Hash password
        }

        $user->update($dataToUpdate);

        return redirect()->route('user')->with('success', 'User berhasil diperbarui.');
    }

    // hapus

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->route('user')->with('success', 'User berhasil dihapus.');
    }

}
