<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_File_Place extends Model
{
    use HasFactory;

    public function jenis_buku()
    {
        return $this->belongsTo('App\Models\R_Jenis_Buku', 'id_jenisbuku');
    }
}
