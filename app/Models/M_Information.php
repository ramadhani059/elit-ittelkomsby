<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Information extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(M_Admin::class);
    }
}
