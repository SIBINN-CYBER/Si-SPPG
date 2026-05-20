<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $pelayanans = Pelayanan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->orderBy('tanggal', 'desc')->get();

        return view('admin.pelayanan.index', compact('pelayanans', 'search'));
    }

    public function destroy($id)
    {
        $pelayanan = Pelayanan::findOrFail($id);
        $pelayanan->delete();
        return redirect()->route('admin.pelayanan');
    }
}
