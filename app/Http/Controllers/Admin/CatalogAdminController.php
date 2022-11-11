<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\M_Pengarang;
use App\Models\M_Penyunting;
use App\Models\R_Jenis_Buku;
use App\Models\R_Penerbit;
use App\Models\R_Sirkulasi;
use App\Models\R_Subjek;
use Illuminate\Http\Request;

class CatalogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Catalog Buku | ELIT ITTelkom Surabaya';

        $catalog = M_Buku::all();

        return view('admin/catalog/index', [
            'pageTitle' => $pageTitle,
            'catalog' => $catalog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Buku | Dashboard';

        // ELOQUENT
        $jenisbuku = R_Jenis_Buku::all();
        $subjek = R_Subjek::all();
        $pengarang = M_Pengarang::all();
        $penyunting = M_Penyunting::all();
        $penerbit = R_Penerbit::all();
        $sirkulasi = R_Sirkulasi::all();

        return view('admin.catalog.add', compact('pageTitle', 'jenisbuku', 'subjek', 'pengarang', 'penyunting', 'penerbit', 'sirkulasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
