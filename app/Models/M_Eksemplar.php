<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Eksemplar extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_buku');
    }

    public function peminjaman_buku()
    {
        return $this->hasMany('App\Models\T_Peminjaman_Buku', 'id_eksemplar');
    }
}
