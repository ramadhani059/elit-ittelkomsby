<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Anggota extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function jenis_keanggotaan()
    {
        return $this->belongsTo('App\Models\R_Jenis_Keanggotaan', 'id_jenis_keanggotaan');
    }

    public function institusi()
    {
        return $this->belongsTo(R_Institusi::class);
    }

    public function donasi_buku()
    {
        return $this->hasMany('App\Models\T_Peminjaman', 'id_anggota');
    }

    public function peminjaman()
    {
        return $this->hasMany('App\Models\T_Peminjaman', 'id_anggota');
    }
}
