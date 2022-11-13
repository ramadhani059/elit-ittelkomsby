<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\R_Institusi;
use App\Models\R_Jenis_Buku;
use App\Models\R_Jenis_Keanggotaan;
use Illuminate\Http\Request;

class DropDownController extends Controller
{
    public function getJenisAnggota($id){
        $jenisanggota = R_Jenis_Keanggotaan::where('id',$id)->get();
        return response()->json($jenisanggota);
    }

    public function getInstitusi($id){
        $institusi = R_Institusi::where('tipe_institusi',$id)->get();
        return response()->json($institusi);
    }

    public function getJenisBuku($id){
        $jenisbuku = R_Jenis_Buku::where('id',$id)->get();
        return response()->json($jenisbuku);
    }
}
