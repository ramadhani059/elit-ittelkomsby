<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Notification extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'id_user_penerima');
    }
}
