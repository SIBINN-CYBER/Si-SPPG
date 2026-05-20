<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'tanggal',
        'jenis',
        'pesan',
    ];
}
