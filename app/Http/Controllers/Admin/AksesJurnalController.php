<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Akses_Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AksesJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Akses Jurnal | ELIT ITTelkom Surabaya';

        $akses = M_Akses_Jurnal::latest()->paginate(30);

        return view('admin/aksesjurnal/index', [
            'pageTitle' => $pageTitle,
            'akses' => $akses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Akses Jurnal | ELIT ITTelkom Surabaya';

        $kategori = ["E - Jurnal", "E - Resources Perpusnas", "Afiliasi"];

        return view('admin/aksesjurnal/add', [
            'pageTitle' => $pageTitle,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute is require',
        ];

        $request->validate([
            'photo' => 'required',
        ], $messages);

        $akses = new M_Akses_Jurnal;

        // Get File Image
        $file = $request->file('photo');

        // Store File Image
        $file->store('public/aksesjurnal');

        $akses->id_admin = Auth::user()->admin->id;
        $akses->img_original = $file->getClientOriginalName();
        $akses->img_encrypt = $file->hashName();
        $akses->judul = $request->judulaksesjurnal;
        $akses->kategori = $request->kategoriaksesjurnal;
        $akses->link = $request->link;
        $akses->save();

        Alert::success('Anda Berhasil Menambahkan Akses Jurnal');
        return redirect()->route('akses-jurnal.index');
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
        $pageTitle = 'Edit Akses Jurnal | ELIT ITTelkom Surabaya';
        $akses = M_Akses_Jurnal::find($id);
        $kategori = ["E - Jurnal", "E - Resources Perpusnas", "Afiliasi"];

        return view('admin/aksesjurnal/edit', [
            'pageTitle' => $pageTitle,
            'akses' => $akses,
            'kategori' => $kategori,
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

        $akses = M_Akses_Jurnal::find($id);

        // Get File Image
        $file = $request->file('photo');

        if ($file != null) {
            Storage::disk('public')->delete('aksesjurnal/'.$akses->img_encrypt);

            // Store File Image
            $file->store('public/aksesjurnal');

            $akses->img_original = $file->getClientOriginalName();
            $akses->img_encrypt = $file->hashName();
        }

        $akses->id_admin = Auth::user()->admin->id;
        $akses->judul = $request->judulaksesjurnal;
        $akses->kategori = $request->kategoriaksesjurnal;
        $akses->link = $request->link;
        $akses->save();

        Alert::success('Anda Berhasil Merubah Akses Jurnal');
        return redirect()->route('akses-jurnal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akses = M_Akses_Jurnal::find($id);

        Storage::disk('public')->delete('aksesjurnal/'.$akses->img_encrypt);

        $akses->delete();

        Alert::success('Anda Berhasil Menghapus Data Akses Jurnal');
        return redirect()->route('akses-jurnal.index');
    }
}
