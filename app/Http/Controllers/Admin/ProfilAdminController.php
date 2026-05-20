<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilAdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin.profil.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();
        
        $request->validate([
            'namalengkap' => 'required',
            'username' => 'required|unique:admin,username,' . $admin->id,
        ]);

        $admin->namalengkap = $request->namalengkap;
        $admin->username = $request->username;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diupdate!');
    }

    public function createAdmin()
    {
        return view('admin.profil.tambah');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admin',
            'password' => 'required',
            'namalengkap' => 'required',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'namalengkap' => $request->namalengkap,
        ]);

        return redirect()->route('admin.tambah')->with('success', 'Admin berhasil ditambahkan!');
    }
}
