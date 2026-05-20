<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $menus = Menu::when($search, function ($query, $search) {
            return $query->where('namamenu', 'like', "%{$search}%");
        })->orderBy('tanggal', 'desc')->get();

        return view('menu.index', compact('menus', 'search'));
    }
}
