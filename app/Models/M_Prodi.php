<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Prodi extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->hasMany('App\Models\M_Buku', 'id_buku');
    }

    public function fakultas()
    {
        return $this->belongsTo('App\Models\M_Fakultas', 'id_fakultas');
    }
}
