<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Admin extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function akses_jurnal()
    {
        return $this->hasMany(M_Akses_Jurnal::class);
    }

    public function gallery()
    {
        return $this->hasMany(M_Gallery::class);
    }

    public function information()
    {
        return $this->hasMany(M_Information::class);
    }

    public function news()
    {
        return $this->hasMany(M_News::class);
    }

    public function buku()
    {
        return $this->hasMany(M_Buku::class);
    }
}
