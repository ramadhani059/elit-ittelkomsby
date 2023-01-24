<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File;
use App\Models\R_Pengarang_Place;
use App\Models\M_Eksemplar;
use App\Models\M_Fakultas;
use App\Models\M_Prodi;
use App\Models\R_File_Place;
use App\Models\R_Jenis_Buku;
use App\Models\R_Pembimbing_Place;
use App\Models\R_Sirkulasi;
use App\Models\R_Subjek_Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $pageTitle = $catalog->judul.' | ELIT ITTelkom Surabaya';

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
    public function edit($catalog_admin)
    {
        $catalog = M_Buku::find($catalog_admin);
        $jenisbuku = R_Jenis_Buku::all();
        $sirkulasi = R_Sirkulasi::all();
        $fakultas = M_Fakultas::all();
        $prodi = M_Prodi::all();
        $fileplace = R_File_Place::all();

        $pageTitle = 'Edit Buku | ELIT ITTelkom Surabaya';

        return view('admin/catalog/edit', [
            'pageTitle' => $pageTitle,
            'catalog' => $catalog,
            'jenisbuku' => $jenisbuku,
            'sirkulasi' => $sirkulasi,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'fileplace' => $fileplace,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $catalog_admin)
    {
        $jenisbuku = $request->jenis_buku;

        $catalog = M_Buku::find($catalog_admin);

        $check = M_Buku::where('kode_buku', $request->{'kode_buku_'.$jenisbuku});

        if ($request->{'kode_buku_'.$jenisbuku} == $catalog->kode_buku) {
            $statuscheck = false;
        } else {
            $statuscheck = false;

            if ($check->exists() == true) {
                $statuscheck = true;
            }
        }

        if ($statuscheck == true){
            $checkbuku = M_Buku::where('kode_buku', $request->{'kode_buku_'.$jenisbuku})->get()->first();

            Alert::error('Buku Anda Tidak Tersimpan!', 'Buku Anda Sudah Terdaftar !!');

            return redirect()->route('akuisisi-buku.index');
        } else {
            $catalog->id_jenis_buku = $jenisbuku;

            $cover = $request->file('filecover_'.$jenisbuku);
            if($cover != null){
                // Delete Existing Image
                Storage::disk('public')->delete('buku/cover/'.$catalog->cover);

                $cover->store('public/buku/cover');
                $catalog->cover= $cover->hashName();
            }

            $catalog->kode_buku = $request->{'kode_buku_'.$jenisbuku};
            $catalog->isbn = $request->{'isbn_'.$jenisbuku};
            $catalog->lokasi_buku = $request->{'lokasi_buku_'.$jenisbuku};
            if ($request->{'edisi_buku_'.$jenisbuku} != null) {
                $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower()->append(' '.$request->{'edisi_buku_'.$jenisbuku});
            } else {
                $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower();
            }
            $catalog->judul = $judul;
            $slug = Str::of($judul)->slug('-');
            $catalog->slug = Str::of($request->{'kode_buku_'.$jenisbuku})->slug('-')->append('-'.$slug);
            $catalog->judul_inggris = Str::lower($request->{'judul_buku_inggris_'.$jenisbuku});
            $catalog->anak_judul = Str::lower($request->{'anak_judul_'.$jenisbuku});
            $catalog->edisi = $request->{'edisi_buku_'.$jenisbuku};
            $catalog->ilustrasi = $request->{'ilustrasi_'.$jenisbuku};
            $catalog->dimensi = $request->{'dimensi_'.$jenisbuku};
            $catalog->id_prodi = $request->{'prodi_'.$jenisbuku};
            $catalog->kota_terbit = $request->{'kota_terbit_'.$jenisbuku};
            $catalog->tahun_terbit = $request->{'tahun_terbit_'.$jenisbuku};
            $catalog->id_sirkulasi = $request->{'sirkulasi_'.$jenisbuku};
            $catalog->penyunting = $request->{'penyunting_'.$jenisbuku};
            $catalog->penerjemah = $request->{'penerjemah_'.$jenisbuku};
            $catalog->penerbit = $request->{'penerbit_'.$jenisbuku};
            $catalog->status_active = $request->{'status_'.$jenisbuku};
            $catalog->role_download = $request->{'role_download_'.$jenisbuku};
            $catalog->ringkasan = $request->{'abstrak_'.$jenisbuku};
            $catalog->save();

            $subjek = R_Subjek_Place::where('id_buku', $catalog_admin);
            $pengarang = R_Pengarang_Place::where('id_buku', $catalog_admin);
            $pembimbing = R_Pembimbing_Place::where('id_buku', $catalog_admin);

            $subjek->delete();
            $pengarang->delete();
            $pembimbing->delete();

            $targetsubjek = count(collect($request->{'subjek_'.$jenisbuku}));
            $targetpengarang = count(collect($request->{'nama_pengarang_depan_'.$jenisbuku}));
            $targetpembimbing = count(collect($request->{'pembimbing_'.$jenisbuku}));

            $listsubjek = [];
            if ($request->{'subjek_'.$jenisbuku} != null){
                for ($x=0; $x<$targetsubjek; $x++){
                    if ($request->{'subjek_'.$jenisbuku}[$x] != null) {
                        $listsubjek[] = array(
                            'id_buku' => $catalog->id,
                            'nama' => $request->{'subjek_'.$jenisbuku}[$x],
                        );
                    }
                }
                DB::table('r__subjek__places')->insert($listsubjek);
            }

            $listpengarang = [];
            if ($request->{'nama_pengarang_depan_'.$jenisbuku} != null){
                for ($x=0; $x<$targetpengarang; $x++){
                    if ($request->{'nama_pengarang_depan_'.$jenisbuku}[$x] != null) {
                        $listpengarang[] = array(
                            'id_buku' => $catalog->id,
                            'no_identitas' => $request->{'no_pengarang_'.$jenisbuku}[$x],
                            'nama' => Str::of($request->{'nama_pengarang_depan_'.$jenisbuku}[$x])->append(' '.$request->{'nama_pengarang_belakang_'.$jenisbuku}[$x]),
                            'nama_depan' => $request->{'nama_pengarang_depan_'.$jenisbuku}[$x],
                            'nama_belakang' => $request->{'nama_pengarang_belakang_'.$jenisbuku}[$x],
                        );
                    }
                }
                DB::table('r__pengarang__places')->insert($listpengarang);
            }

            $listpembimbing = [];
            if ($request->{'pembimbing_'.$jenisbuku} != null){
                for ($x=0; $x<$targetpembimbing; $x++){
                    if ($request->{'pembimbing_'.$jenisbuku}[$x] != null) {
                        $listpembimbing[] = array(
                            'id_buku' => $catalog->id,
                            'no_identitas' => $request->{'no_pembimbing_'.$jenisbuku}[$x],
                            'nama' => $request->{'pembimbing_'.$jenisbuku}[$x],
                        );
                    }
                }
                DB::table('r__pembimbing__places')->insert($listpembimbing);
            }

            $idfile = [
                'id_jenisbuku' => $jenisbuku,
                'type' => 'pdf',
            ];

            $fullfile = [
                'id_jenisbuku' => $jenisbuku,
                'name' => 'File',
                'type' => 'fullfile',
            ];

            $results = R_File_Place::where($idfile)->get();
            $file = R_File_Place::where($fullfile)->get();

            $listfile = [];

            foreach ($file as $filebook) {
                if ($request->file('fullfile_edit_'.$filebook->id.'_'.$jenisbuku) != null) {
                    $file_exist = R_File::where([
                        'id_buku' => $catalog_admin,
                        'id_file_place' => $filebook->id,
                    ])->get()->first();

                    // Delete Existing Image
                    Storage::disk('public')->delete($file_exist->location_path.$file_exist->encrypt_name);

                    $filestore = $request->file('fullfile_edit_'.$filebook->id.'_'.$jenisbuku);

                    $filestore->store('public/'.$file_exist->location_path);

                    $listfile[] = array(
                        'id_buku' => $catalog->id,
                        'id_file_place' => $filebook->id,
                        'original_name' => $filestore->getClientOriginalName(),
                        'encrypt_name' => $filestore->hashName(),
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                }
            }

            foreach ($results as $files) {
                if ($request->file('filepdf_'.$files->id.'_'.$jenisbuku) != null) {
                    $file_exist = R_File::where([
                        'id_buku' => $catalog_admin,
                        'id_file_place' => $files->id,
                    ])->get()->first();

                    // Delete Existing Image
                    Storage::disk('public')->delete($file_exist->location_path.$file_exist->encrypt_name);

                    $filestore = $request->file('filepdf_'.$files->id.'_'.$jenisbuku);

                    $filestore->store('public/'.$file_exist->location_path);

                    $listfile[] = array(
                        'id_buku' => $catalog->id,
                        'id_file_place' => $files->id,
                        'original_name' => $filestore->getClientOriginalName(),
                        'encrypt_name' => $filestore->hashName(),
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                }
            }

            if($listfile != null){
                DB::table('r__files')->insert($listfile);
            }
        }

        Alert::success('You are Successfully Edit Book');

        return redirect()->route('catalog-admin.index');
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
        $file = R_File::where([
            'id_buku' => $catalog->id,
        ])->get()->first();

        foreach ($catalog->subjek_place as $subjek) {
            if($subjek->id_donasi == null){
                $subjek->delete();
            }
        }

        foreach ($catalog->pengarang_place as $pengarang) {
            if($pengarang->id_donasi == null){
                $pengarang->delete();
            }
        }

        foreach ($catalog->pembimbing_place as $pembimbing) {
            if($pembimbing->id_donasi == null){
                $pembimbing->delete();
            }
        }

        if($file->id_donasi == null){
            // Delete File Image
            Storage::disk('public')->delete('buku/cover/'.$catalog->cover);
            Storage::disk('public')->deleteDirectory($file->location_path);

            // Delete Column
            foreach ($catalog->file as $filebuku){
                if($filebuku->id_donasi == null){
                    $filebuku->delete();
                }
            }
        }

        // Delete Table
        $catalog->delete();

        Alert::success('Deleted Successfully', 'Book Data Deleted Successfully');

        return redirect()->route('catalog-admin.index');
    }
}
