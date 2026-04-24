<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'stock_alat';

    protected $fillable = [
        'nama',
        'jenis',
        'tanggal',
        'jumlah'
    ];
}