<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Institusi extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->hasMany(M_Anggota::class);
    }
}
