<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\R_Koleksi_Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KoleksiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Koleksi Buku | ELIT ITTelkom Surabaya';

        $koleksibuku = R_Koleksi_Buku::all();

        return view('admin/koleksibuku/index', [
            'pageTitle' => $pageTitle,
            'koleksibuku' => $koleksibuku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Koleksi Buku | Dashboard';

        return view('admin.koleksibuku.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $koleksibuku = new R_Koleksi_Buku;

        $koleksibuku->nama = $request->koleksibuku;
        $koleksibuku->save();

        return redirect()->route('koleksi-buku.index');
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
        $pageTitle = 'Edit Koleksi Buku | Dashboard';
        $koleksibuku = R_Koleksi_Buku::find($id);

        return view('admin.koleksibuku.edit', compact('pageTitle', 'koleksibuku'));
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
        $koleksibuku = R_Koleksi_Buku::find($id);

        $koleksibuku->nama = $request->koleksibuku;
        $koleksibuku->save();

        Alert::success('You are Successfully Edit Collection of Book');

        return redirect()->route('koleksi-buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $koleksibuku = R_Koleksi_Buku::find($id);

        $koleksibuku->delete();

        return redirect()->route('koleksi-buku.index');
    }
}
