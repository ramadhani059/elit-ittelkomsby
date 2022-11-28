<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Pengarang extends Model
{
    use HasFactory;

    public function pengarang_place()
    {
        return $this->hasMany('App\Models\R_Pengarang_Place', 'id_pengarang');
    }

    public function donasi_buku()
    {
        return $this->hasMany(T_Donasi_Buku::class);
    }
}
