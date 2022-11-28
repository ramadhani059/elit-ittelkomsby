<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Peminjaman_Buku extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->belongsTo('App\Models\M_Anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_buku');
    }
}
