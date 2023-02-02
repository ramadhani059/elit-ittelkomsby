<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File_Place;
use App\Models\R_Jenis_Buku;
use App\Models\R_Koleksi_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Jenis Buku | ELIT ITTelkom Surabaya';

        $jenisbuku = R_Jenis_Buku::all();

        return view('admin/jenisbuku/index', [
            'pageTitle' => $pageTitle,
            'jenisbuku' => $jenisbuku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Jenis Buku | Dashboard';

        $koleksibuku = R_Koleksi_Buku::all();

        return view('admin.jenisbuku.add', compact('pageTitle', 'koleksibuku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisbuku = new R_Jenis_Buku;

        $target1 = count(collect($request->identitas_buku));
        $target2 = count(collect($request->nama_file));

        $jenisbuku->id_koleksi = $request->koleksibuku;
        $jenisbuku->kode_jenis_buku = $request->kodejenisbuku;
        $jenisbuku->nama = $request->namajenisbuku;

        $jenisbuku->save();

        if ($request->identitas_buku[0] != null){
            for ($x=0; $x<$target1; $x++){
                $checkbox[] = array(
                    'id_jenisbuku' => $jenisbuku->id,
                    'nama' => $request->identitas_buku[$x],
                    'catatan' => null,
                    'tipe' => 'text',
                );
            }
            DB::table('r__file__places')->insert($checkbox);
        }

        if ($request->nama_file[0] != null){
            for ($i=0; $i<$target2; $i++){
                $data[] = array(
                    'id_jenisbuku' => $jenisbuku->id,
                    'nama' => $request->nama_file[$i],
                    'catatan' => $request->note_file[$i],
                    'tipe' => 'pdf',
                );
            }
            DB::table('r__file__places')->insert($data);
        }

        if ($request->fullfile != null){
            $fullfile[] = array(
                'id_jenisbuku' => $jenisbuku->id,
                'nama' => $request->fullfile,
                'catatan' => null,
                'tipe' => 'fullfile',
            );
            DB::table('r__file__places')->insert($fullfile);
        }

        return redirect()->route('jenis-buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisbuku = R_Jenis_Buku::find($id);

        $pageTitle = $jenisbuku->nama.' | ELIT ITTelkom Surabaya';

        return view('admin/jenisbuku/view', [
            'pageTitle' => $pageTitle,
            'jenisbuku' => $jenisbuku
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
        $fileplace = R_File_Place::where('id_jenisbuku',$id);
        $jenisbuku = R_Jenis_Buku::find($id);

        $fileplace->delete();
        $jenisbuku->delete();

        return redirect()->route('jenis-buku.index');
    }
}
