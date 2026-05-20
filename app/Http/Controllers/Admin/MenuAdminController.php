<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $menus = Menu::when($search, function ($query, $search) {
            return $query->where('namamenu', 'like', "%{$search}%");
        })->orderBy('tanggal', 'desc')->get();

        return view('admin.menu.index', compact('menus', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->except('foto');
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('assets/uploads'), $filename);
            $data['foto'] = $filename;
        }

        Menu::create($data);
        return redirect()->route('admin.menu');
    }

    public function update(Request $request)
    {
        $menu = Menu::findOrFail($request->id);
        $data = $request->except(['foto', 'id']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('assets/uploads'), $filename);
            $data['foto'] = $filename;
        }

        $menu->update($data);
        return redirect()->route('admin.menu');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->foto && file_exists(public_path('assets/uploads/' . $menu->foto))) {
            unlink(public_path('assets/uploads/' . $menu->foto));
        }
        $menu->delete();
        return redirect()->route('admin.menu');
    }

    public function cetak(Request $request)
    {
        $query = Menu::query();

        if ($request->has('search')) {
            $query->where('namamenu', 'like', '%' . $request->search . '%');
        } elseif ($request->has('ids')) {
            $ids = explode(',', $request->ids);
            $query->whereIn('id', $ids);
        }

        $menus = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.menu.cetak', compact('menus'));
    }
}
