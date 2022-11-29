<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getKodeBuku($kode){
        $kodebuku = M_Buku::where('kode_buku',$kode)->get();
        return response()->json($kodebuku);
    }
}
