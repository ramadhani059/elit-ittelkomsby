<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\R_Jenis_Keanggotaan;
use Illuminate\Http\Request;

class JenisAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Jenis Keanggotaan | ELIT ITTelkom Surabaya';

        $jenisanggota = R_Jenis_Keanggotaan::all();

        return view('admin/jeniskeanggotaan/index', [
            'pageTitle' => $pageTitle,
            'jenisanggota' => $jenisanggota
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Jenis Keanggotaan | Dashboard';

        return view('admin.jeniskeanggotaan.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisanggota = new R_Jenis_Keanggotaan;

        $rolektp = $request->role_ktp;
        $rolekarpegktm = $request->role_karpeg_ktm;
        $roleijazah = $request->role_ijazah;

        $roledownload = $request->role_download;
        $rolebaca = $request->role_baca;
        $rolebooking = $request->role_booking;
        $roleinstitusi = $request->role_institusi;
        $roleaddinstitusi = $request->role_add_institusi;

        $jenisanggota->nama = $request->namajeniskeanggotaan;

        if($rolektp == "1"){
            $jenisanggota->role_ktp = 1;
        } else {
            $jenisanggota->role_ktp = 0;
        }

        if($rolekarpegktm == "1"){
            $jenisanggota->role_karpeg_ktm = 1;
        } else {
            $jenisanggota->role_karpeg_ktm = 0;
        }

        if($roleijazah == "1"){
            $jenisanggota->role_ijazah = 1;
        } else {
            $jenisanggota->role_ijazah = 0;
        }

        if($roledownload == "1"){
            $jenisanggota->role_download = 1;
        } else {
            $jenisanggota->role_download = 0;
        }

        if($rolebaca == "1"){
            $jenisanggota->role_baca = 1;
        } else {
            $jenisanggota->role_baca = 0;
        }

        if($rolebooking == "1"){
            $jenisanggota->role_booking = 1;
        } else {
            $jenisanggota->role_booking = 0;
        }

        if($roleinstitusi == "1"){
            $jenisanggota->role_institusi = 1;
        } else {
            $jenisanggota->role_institusi = 0;
        }

        if($roleaddinstitusi == "1"){
            $jenisanggota->role_add_institusi = 1;
        } else {
            $jenisanggota->role_add_institusi = 0;
        }

        $jenisanggota->save();

        return redirect()->route('jenis-keanggotaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisanggota = R_Jenis_Keanggotaan::find($id);

        $jenisanggota->delete();

        return redirect()->route('jenis-keanggotaan.index');
    }
}
