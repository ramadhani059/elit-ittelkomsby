<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Buku extends Model
{
    use HasFactory;

    public function penyunting()
    {
        return $this->belongsTo('App\Models\M_Penyunting', 'id_penyunting');
    }

    public function jenis_buku()
    {
        return $this->belongsTo('App\Models\R_Jenis_Buku', 'id_jenis_buku');
    }

    public function subjek()
    {
        return $this->belongsTo('App\Models\R_Subjek', 'id_subjek');
    }

    public function penerbit()
    {
        return $this->belongsTo('App\Models\R_Penerbit', 'id_penerbit');
    }

    public function sirkulasi()
    {
        return $this->belongsTo('App\Models\R_Sirkulasi', 'id_sirkulasi');
    }

    public function file()
    {
        return $this->belongsTo('App\Models\R_File', 'id_file');
    }

    public function peminjaman_buku()
    {
        return $this->hasMany('App\Models\T_Peminjaman_Buku', 'id_buku');
    }

    public function pengarang_place()
    {
        return $this->hasMany('App\Models\R_Pengarang_Place', 'id_buku');
    }

    public function eksemplar()
    {
        return $this->hasMany('App\Models\M_Eksemplar', 'id_buku');
    }

    public function akuisisi()
    {
        return $this->hasMany('App\Models\R_Akuisisi_Buku', 'id_buku');
    }
}
