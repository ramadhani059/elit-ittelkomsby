<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Buku extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(M_Admin::class);
    }

    public function penyunting()
    {
        return $this->belongsTo(M_Penyunting::class);
    }

    public function jenis_buku()
    {
        return $this->belongsTo(R_Jenis_Buku::class);
    }

    public function subjek()
    {
        return $this->belongsTo(R_Subjek::class);
    }

    public function pengarang()
    {
        return $this->belongsTo(M_Pengarang::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(R_Penerbit::class);
    }

    public function sirkulasi()
    {
        return $this->belongsTo(R_Sirkulasi::class);
    }

    public function file()
    {
        return $this->belongsTo(R_File::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(T_Peminjaman::class);
    }
}
