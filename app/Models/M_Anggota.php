<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Anggota extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenis_keanggotaan()
    {
        return $this->belongsTo(R_Jenis_Keanggotaan::class);
    }

    public function institusi()
    {
        return $this->belongsTo(R_Institusi::class);
    }

    public function donasi_buku()
    {
        return $this->hasMany(T_Donasi_Buku::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(T_Peminjaman::class);
    }
}
