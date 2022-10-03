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

    public function file()
    {
        return $this->belongsTo(R_File::class);
    }
}
