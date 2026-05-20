<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Menu;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $menus = Menu::where('tanggal', '<', Carbon::now()->subDays(7))->get();
    foreach ($menus as $menu) {
        if ($menu->foto && file_exists(public_path('assets/uploads/' . $menu->foto))) {
            unlink(public_path('assets/uploads/' . $menu->foto));
        }
        $menu->delete();
    }
})->daily();
