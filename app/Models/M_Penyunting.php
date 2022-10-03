<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Penyunting extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->hasMany(M_Buku::class);
    }

    public function donasi_buku()
    {
        return $this->hasMany(T_Donasi_Buku::class);
    }
}
