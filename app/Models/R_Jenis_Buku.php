<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Jenis_Buku extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->hasMany('App\Models\M_Buku', 'id_jenis_buku');
    }

    public function donasi_buku()
    {
        return $this->hasMany(T_Donasi_Buku::class);
    }
}
