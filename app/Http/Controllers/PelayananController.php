<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function create()
    {
        return view('pelayanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_pengajuan' => 'required|in:Request,Keluhan',
            'pesan' => 'required|string',
        ]);

        Pelayanan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis_pengajuan,
            'pesan' => $request->pesan,
        ]);

        return back()->with('pesan_sukses', 'Pengajuan Anda berhasil terkirim!');
    }
}
