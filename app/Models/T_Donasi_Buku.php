<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Donasi_Buku extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->belongsTo(M_Anggota::class);
    }

    public function prodi()
    {
        return $this->belongsTo('App\Models\M_Prodi', 'id_prodi');
    }

    public function jenis_buku()
    {
        return $this->belongsTo(R_Jenis_Buku::class);
    }

    public function file()
    {
        return $this->hasMany('App\Models\R_File', 'id_buku');
    }

    public function pengarang_place()
    {
        return $this->hasMany('App\Models\R_Pengarang_Place', 'id_buku');
    }

    public function pembimbing_place()
    {
        return $this->hasMany('App\Models\R_Pembimbing_Place', 'id_buku');
    }

    public function subjek_place()
    {
        return $this->hasMany('App\Models\R_Subjek_Place', 'id_buku');
    }
}
