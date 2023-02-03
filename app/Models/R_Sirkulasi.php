<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Sirkulasi extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->hasMany('App\Models\M_Buku', 'id_sirkulasi');
    }
}
