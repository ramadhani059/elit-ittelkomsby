<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Koleksi_Buku extends Model
{
    use HasFactory;

    public function jenis_buku()
    {
        return $this->hasMany('App\Models\R_Jenis_Buku', 'id_koleksi');
    }
}
