<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Information;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Informasi Penting | ELIT ITTelkom Surabaya';

        $info = M_Information::paginate(30);

        return view('admin/informasipenting/index', [
            'pageTitle' => $pageTitle,
            'info' => $info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Informasi Penting | ELIT ITTelkom Surabaya';

        $status = ["Aktif", "Tidak Aktif"];

        return view('admin/informasipenting/add', [
            'pageTitle' => $pageTitle,
            'status' => $status,
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
            'judul' => 'required',
            'img_info' => 'required',
            'status' => 'required',
        ], $messages);

        $info = new M_Information;

        // Get File Image
        $file = $request->file('img_info');

        // Store File Image
        $file->store('public/information');

        $info->id_admin = Auth::user()->admin->id;
        $info->judul = $request->judul;
        $info->isi = $request->content;
        $info->tanggal = Carbon::now();
        $info->img_original = $file->getClientOriginalName();
        $info->img_encrypt = $file->hashName();
        $info->status = $request->status;
        $info->save();

        Alert::success('Anda Berhasil Menambahkan Informasi Penting');
        return redirect()->route('information-admin.index');
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
        $info = M_Information::find($id);

        Storage::disk('public')->delete('information/'.$info->img_encrypt);

        $info->delete();

        Alert::success('Anda Berhasil Menghapus Data Informasi Penting');
        return redirect()->route('information-admin.index');
    }
}
