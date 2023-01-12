<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Pengarang_Place extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_buku');
    }

    public function donasi()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_donasi');
    }
}
