<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\M_Buku;
use App\Models\M_Fakultas;
use App\Models\M_Pengarang;
use App\Models\M_Prodi;
use App\Models\R_Institusi;
use App\Models\R_Jenis_Buku;
use App\Models\R_Jenis_Keanggotaan;
use App\Models\R_Sirkulasi;
use App\Models\User;
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

    public function getJenisBuku(){
        $jenisbuku = R_Jenis_Buku::all();
        return response()->json($jenisbuku);
    }

    public function getAnggota($id){
        $anggota = M_Anggota::where('id_user',$id)->get();
        return response()->json($anggota);
    }

    public function getUser($id){
        $user = User::where('id',$id)->get();
        return response()->json($user);
    }

    public function getBuku($id){
        $buku = M_Buku::with('sirkulasi')->find($id);
        // $buku = M_Buku::where('id',$id)->get();
        return response()->json([$buku]);
    }

    public function getFakultas(){
        $fakultas = M_Fakultas::all();
        return response()->json($fakultas);
    }

    public function getProdi(){
        $prodi = M_Prodi::all();
        return response()->json($prodi);
    }
}
