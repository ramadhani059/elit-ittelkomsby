<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_File extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->hasOne(M_Buku::class);
    }

    public function donasi_buku()
    {
        return $this->hasOne(T_Donasi_Buku::class);
    }
}
