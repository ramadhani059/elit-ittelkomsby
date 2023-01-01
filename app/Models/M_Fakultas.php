<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Fakultas extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->hasMany('App\Models\M_Prodi', 'id_fakultas');
    }
}
