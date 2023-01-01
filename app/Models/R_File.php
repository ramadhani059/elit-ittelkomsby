<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_File extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_buku');
    }

    public function file_place()
    {
        return $this->belongsTo('App\Models\R_File_Place', 'id_file_place');
    }

    public function donasi_buku()
    {
        return $this->hasOne(T_Donasi_Buku::class);
    }
}
