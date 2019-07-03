<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klaim extends Model
{
    protected $table="tblKlaim";
    protected $fillable = [
        'no_aduan', 'npm', 'nama_barang', 'deskripsi', 'lokasi',  'foto', 'status',
    ];
}
