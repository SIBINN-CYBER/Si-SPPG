<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = [
        'namamenu',
        'tanggal',
        'foto',
        'menu_utama',
        'lauk',
        'saus',
        'dessert',
        'energi_besar',
        'protein_besar',
        'lemak_besar',
        'karbo_besar',
        'energi_kecil',
        'protein_kecil',
        'lemak_kecil',
        'karbo_kecil',
    ];
}
