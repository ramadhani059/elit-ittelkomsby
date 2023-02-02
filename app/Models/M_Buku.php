<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Buku extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->belongsTo('App\Models\M_Prodi', 'id_prodi');
    }

    public function jenis_buku()
    {
        return $this->belongsTo('App\Models\R_Jenis_Buku', 'id_jenis_buku');
    }

    public function sirkulasi()
    {
        return $this->belongsTo('App\Models\R_Sirkulasi', 'id_sirkulasi');
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

    public function eksemplar()
    {
        return $this->hasMany('App\Models\M_Eksemplar', 'id_buku');
    }
}
