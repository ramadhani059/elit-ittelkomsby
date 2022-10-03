<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Peminjaman extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->belongsTo(M_Anggota::class);
    }

    public function buku()
    {
        return $this->belongsTo(M_Buku::class);
    }
}
