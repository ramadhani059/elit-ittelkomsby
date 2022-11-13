<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\R_Sirkulasi;
use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Sirkulasi Buku | ELIT ITTelkom Surabaya';

        $sirkulasi = R_Sirkulasi::all();

        return view('admin/sirkulasi/index', [
            'pageTitle' => $pageTitle,
            'sirkulasi' => $sirkulasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Sirkulasi Buku | Dashboard';

        return view('admin.sirkulasi.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sirkulasi = new R_Sirkulasi;

        $sirkulasi->nama = $request->namasirkulasi;
        $sirkulasi->batas_booking = $request->bataspeminjaman;
        $sirkulasi->biaya_sewa = $request->biayasewa;
        $sirkulasi->denda_harian = $request->dendaharian;

        $sirkulasi->save();

        return redirect()->route('sirkulasi.index');
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
        $sirkulasi = R_Sirkulasi::find($id);

        $sirkulasi->delete();

        return redirect()->route('sirkulasi.index');
    }
}
