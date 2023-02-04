<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Akses_Jurnal extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo('App\Models\M_Admin', 'id_admin');
    }
}
