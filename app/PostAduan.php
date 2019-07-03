<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAduan extends Model
{
    protected $table="tblAduan";
    protected $fillable = [
        'no_aduan', 'npm', 'nama_barang', 'deskripsi', 'lokasi',  'foto', 'status',
    ];
}
