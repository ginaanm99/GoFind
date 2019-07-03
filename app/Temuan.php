<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    protected $table="tblTemuan";
    protected $fillable = [
        'no_temuan', 'npm', 'nama_barang', 'deskripsi', 'lokasi',  'foto', 'status',
    ];
}
