<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pelayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu_count = Menu::count();
        $pelayanan_count = Pelayanan::count();
        $request_count = Pelayanan::where('jenis', 'Request')->count();
        $keluhan_count = Pelayanan::where('jenis', 'Keluhan')->count();

        return view('admin.dashboard', compact('menu_count', 'pelayanan_count', 'request_count', 'keluhan_count'));
    }
}
