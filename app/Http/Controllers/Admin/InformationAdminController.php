<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
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

        $info = M_Information::latest()->paginate(30);

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
            'unique' => ':Attribute has already been taken',
        ];

        $request->validate([
            'judul' => 'required|unique:m__information,judul',
            'img_info' => 'required',
            'status' => 'required',
        ], $messages);

        $info = new M_Information;

        // Get File Image
        $file = $request->file('img_info');

        // Store File Image
        $file->store('public/information');

        $judul = Str::of($request->judul)->lower();

        $info->slug = Str::of($judul)->slug('-');
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
        $info = M_Information::find($id);
        $pageTitle = $info->judul.' | ELIT ITTelkom Surabaya';

        return view('admin/informasipenting/view', [
            'pageTitle' => $pageTitle,
            'info' => $info,
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
        $pageTitle = 'Edit Informasi Penting | ELIT ITTelkom Surabaya';
        $info = M_Information::find($id);

        $status = ["Aktif", "Tidak Aktif"];

        return view('admin/informasipenting/edit', [
            'pageTitle' => $pageTitle,
            'status' => $status,
            'info' => $info,
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
        $messages = [
            'required' => ':Attribute is require',
            'unique' => ':Attribute has already been taken',
        ];

        $request->validate([
            'judul' => 'required',
            'status' => 'required',
        ], $messages);

        $info = M_Information::find($id);

        // Get File Image
        $file = $request->file('img_info');

        if ($file != null) {
            Storage::disk('public')->delete('information/'.$info->img_encrypt);

            // Store File Image
            $file->store('public/information');

            $info->img_original = $file->getClientOriginalName();
            $info->img_encrypt = $file->hashName();
        }

        if ($request->judul != $info->judul) {
            $judul = Str::of($request->judul)->lower();

            $info->slug = Str::of($judul)->slug('-');
            $info->judul = $request->judul;
        }

        $info->id_admin = Auth::user()->admin->id;
        $info->isi = $request->content;
        $info->tanggal = Carbon::now();
        $info->status = $request->status;
        $info->save();

        Alert::success('Anda Berhasil Merubah Informasi Penting');
        return redirect()->route('information-admin.index');
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
