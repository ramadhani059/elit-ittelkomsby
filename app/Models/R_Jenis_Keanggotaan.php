<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Jenis_Keanggotaan extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->hasMany('App\Models\M_Anggota', 'id_jenis_keanggotaan');
    }

    public function institusi()
    {
        return $this->hasMany('App\Models\R_Institusi', 'tipe_institusi');
    }
}
