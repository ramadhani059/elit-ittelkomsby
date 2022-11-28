<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Akuisisi_Buku extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->belongsTo('App\Models\M_Buku', 'id_buku');
    }
}
