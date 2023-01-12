<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File;
use App\Models\R_Pengarang_Place;
use App\Models\M_Eksemplar;
use App\Models\R_Jenis_Buku;
use App\Models\R_Pembimbing_Place;
use App\Models\R_Subjek_Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        $catalog = M_Buku::paginate(15);

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
        //
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
        $catalog = M_Buku::find($id);
        $judul = $catalog->judul;

        $pageTitle = $judul.' | ELIT ITTelkom Surabaya';

        $jenisbuku = R_Jenis_Buku::where('id',$catalog->id_jenis_buku);

        $file = R_File::where('id_buku', $catalog->id)->get();

        return view('admin/catalog/view', [
            'pageTitle' => $pageTitle,
            'catalog' => $catalog,
            'jenisbuku' => $jenisbuku,
            'file' => $file,
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
        $catalog = M_Buku::find($id);
        $pembimbing = R_Pembimbing_Place::where('id_buku',$id);
        $pengarang = R_Pengarang_Place::where('id_buku',$id);
        $subjek = R_Subjek_Place::where('id_buku',$id);
        $file = R_File::where('id_buku',$id);
        $eksemplar = M_Eksemplar::where('id_buku',$id);
        $folderfile = $catalog->judul;

        // Delete Table
        $eksemplar->delete();
        $pembimbing->delete();
        $subjek->delete();
        $pengarang->delete();
        $file->delete();
        $catalog->delete();

        // Delete File Image
        Storage::disk('public')->deleteDirectory('buku/'.$folderfile);

        Alert::success('Deleted Successfully', 'Book Data Deleted Successfully');

        return redirect()->route('catalog-admin.index');
    }
}
