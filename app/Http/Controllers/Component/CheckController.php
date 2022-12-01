<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\T_Peminjaman_Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function selesai($id){
        // $peminjaman = T_Peminjaman_Buku::find($id);

        // $peminjaman->tgl_kembali = Carbon::now();
        // $peminjaman->total_denda = 0;
        // $peminjaman->status = 'selesai';
        // $peminjaman->save();

        // return redirect()->route('booking-admin.index');
    }
}
