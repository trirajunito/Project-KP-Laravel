<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSampel extends Model
{
    protected $table = 'data_sampel';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'telp',
        'personel',
        'tanggal',
        'jenis',
        'jumlah',
        'keterangan',
        'deskripsi'
    ];
}