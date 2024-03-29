<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\R_Jenis_Keanggotaan;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        $roleuser = $request->statususer;

        $jenisanggota->nama = $request->namajeniskeanggotaan;
        $jenisanggota->batas_booking = $request->bataspeminjaman;
        $jenisanggota->jumlah_pinjam = $request->jumlahpinjam;

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

        if($roleuser == "1"){
            $jenisanggota->role_user = 1;
        } else {
            $jenisanggota->role_user = 0;
        }

        $jenisanggota->save();

        Alert::success('Anda Berhasil Menambahkan Data Jenis Keanggotaan');

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
        $jenisanggota = R_Jenis_Keanggotaan::find($id);

        $pageTitle = $jenisanggota->nama.' | ELIT ITTelkom Surabaya';

        return view('admin/jeniskeanggotaan/view', [
            'pageTitle' => $pageTitle,
            'jenisanggota' => $jenisanggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Jenis Keanggotaan | ELIT ITTelkom Surabaya';

        $jenisanggota = R_Jenis_Keanggotaan::find($id);

        return view('admin/jeniskeanggotaan/edit', [
            'pageTitle' => $pageTitle,
            'jenisanggota' => $jenisanggota
        ]);
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
        $jenisanggota = R_Jenis_Keanggotaan::find($id);

        $rolektp = $request->role_ktp;
        $rolekarpegktm = $request->role_karpeg_ktm;
        $roleijazah = $request->role_ijazah;

        $roledownload = $request->role_download;
        $rolebaca = $request->role_baca;
        $rolebooking = $request->role_booking;
        $roleinstitusi = $request->role_institusi;
        $roleaddinstitusi = $request->role_add_institusi;

        $roleuser = $request->statususer;

        $jenisanggota->nama = $request->namajeniskeanggotaan;
        $jenisanggota->batas_booking = $request->bataspeminjaman;
        $jenisanggota->jumlah_pinjam = $request->jumlahpinjam;

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

        if($roleuser == "1"){
            $jenisanggota->role_user = 1;
        } else {
            $jenisanggota->role_user = 0;
        }

        $jenisanggota->save();

        Alert::success('Anda Berhasil Mengubah Data Jenis Keanggotaan');

        return redirect()->route('jenis-keanggotaan.index');
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

        Alert::success('Anda Berhasil Menghapus Data Jenis Keanggotaan');
        return redirect()->route('jenis-keanggotaan.index');
    }
}
