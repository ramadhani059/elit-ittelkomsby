<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\M_Eksemplar;
use App\Models\R_Jenis_Buku;
use App\Models\R_Sirkulasi;
use App\Models\R_File;
use App\Models\R_Pengarang_Place;
use App\Models\M_Fakultas;
use App\Models\M_Prodi;
use App\Models\R_File_Place;
use App\Models\R_Subjek_Place;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AkuisisiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Akuisisi Buku | Dashboard';

        // ELOQUENT
        $jenisbuku = R_Jenis_Buku::all();
        $sirkulasi = R_Sirkulasi::all();
        $fakultas = M_Fakultas::all();
        $prodi = M_Prodi::all();
        $fileplace = R_File_Place::all();

        return view('admin.akuisisi.index', compact('pageTitle', 'jenisbuku', 'sirkulasi', 'fakultas', 'prodi', 'fileplace'));
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
        $jenisbuku = $request->jenis_buku;

        $messages = [
            'required' => ':Attribute is require',
            'numeric' => 'Fill :Attribute with number',
        ];

        $request->validate([
            'jenis_buku' => 'required',
            'kode_buku_'.$jenisbuku => 'required',
            'judul_buku_'.$jenisbuku => 'required',
            'kota_terbit_'.$jenisbuku => 'required',
            'tahun_terbit_'.$jenisbuku => 'required|numeric',
            'sirkulasi_'.$jenisbuku => 'required',
            'status_'.$jenisbuku => 'required',
            'role_download_'.$jenisbuku => 'required',
        ], $messages);

        $check = M_Buku::where('kode_buku', $request->kode_buku)->exists();

        if ($check){
            $checkbuku = M_Buku::where('kode_buku', $request->kode_buku)->get()->first();

            Alert::error('Buku Anda Tidak Tersimpan!', 'Buku Anda Sudah Terdaftar !!');

            return redirect()->route('akuisisi-buku.index');
        } else {
            $buku = new M_Buku;

            $buku->id_jenis_buku = $jenisbuku;

            $cover = $request->file('filecover_'.$jenisbuku);
            if($cover == null){
                $buku->cover= null;
            } else {
                $cover->store('public/buku/cover');
                $buku->cover= $cover->hashName();
            }

            $buku->kode_buku = $request->{'kode_buku_'.$jenisbuku};
            $buku->isbn = $request->{'isbn_'.$jenisbuku};
            $buku->lokasi_buku = $request->{'lokasi_buku_'.$jenisbuku};
            $buku->judul = $request->{'judul_buku_'.$jenisbuku};
            $buku->judul_inggris = $request->{'judul_buku_inggris_'.$jenisbuku};
            $buku->anak_judul = $request->{'anak_judul_'.$jenisbuku};
            $buku->edisi = $request->{'edisi_buku_'.$jenisbuku};
            $buku->ilustrasi = $request->{'ilustrasi_'.$jenisbuku};
            $buku->dimensi = $request->{'dimensi_'.$jenisbuku};
            $buku->id_prodi = $request->{'prodi_'.$jenisbuku};
            $buku->kota_terbit = $request->{'kota_terbit_'.$jenisbuku};
            $buku->tahun_terbit = $request->{'tahun_terbit_'.$jenisbuku};
            $buku->id_sirkulasi = $request->{'sirkulasi_'.$jenisbuku};
            $buku->penyunting = $request->{'penyunting_'.$jenisbuku};
            $buku->penerjemah = $request->{'penerjemah_'.$jenisbuku};
            $buku->penerbit = $request->{'penerbit_'.$jenisbuku};
            $buku->status_active = $request->{'status_'.$jenisbuku};
            $buku->role_download = $request->{'role_download_'.$jenisbuku};
            $buku->ringkasan = $request->{'abstrak_'.$jenisbuku};
            $buku->save();

            $targetsubjek = count(collect($request->{'subjek_'.$jenisbuku}));
            $targetpengarang = count(collect($request->{'pengarang_'.$jenisbuku}));
            $targetpembimbing = count(collect($request->{'pembimbing_'.$jenisbuku}));

            if ($request->{'subjek_'.$jenisbuku} != null){
                for ($x=0; $x<$targetsubjek; $x++){
                    $listsubjek[] = array(
                        'id_buku' => $buku->id,
                        'nama' => $request->{'subjek_'.$jenisbuku}[$x],
                    );
                }
                DB::table('r__subjek__places')->insert($listsubjek);
            }

            if ($request->{'pengarang_'.$jenisbuku} != null){
                for ($x=0; $x<$targetpengarang; $x++){
                    $listpengarang[] = array(
                        'id_buku' => $buku->id,
                        'no_identitas' => $request->{'no_pengarang_'.$jenisbuku}[$x],
                        'nama' => $request->{'pengarang_'.$jenisbuku}[$x],
                    );
                }
                DB::table('r__pengarang__places')->insert($listpengarang);
            }

            if ($request->{'pembimbing_'.$jenisbuku} != null){
                for ($x=0; $x<$targetpembimbing; $x++){
                    $listpembimbing[] = array(
                        'id_buku' => $buku->id,
                        'no_identitas' => $request->{'no_pembimbing_'.$jenisbuku}[$x],
                        'nama' => $request->{'pembimbing_'.$jenisbuku}[$x],
                    );
                }
                DB::table('r__pembimbing__places')->insert($listpembimbing);
            }

            $target = $request->{'jumlah_eksemplar_'.$jenisbuku};

            for ($i=0; $i<$target; $i++){
                $count = $i+1;

                $og_lenght = 4 - strlen($count);

                $zeros = "";
                for ($x=0;$x<$og_lenght;$x++){
                    $zeros.="0";
                }

                $dataeksemplar[] = array(
                    'id_buku' => $buku->id,
                    'barcode' => $request->{'isbn_'.$jenisbuku}.$zeros.$count,
                    'kode_inventaris' => 1,
                    'tanggal_pengadaan' => Carbon::now(),
                    'jenis_sumber' => $request->{'jenis_pengadaan_'.$jenisbuku},
                    'status' => $request->{'status_pengadaan_'.$jenisbuku},
                );
            }
            DB::table('m__eksemplars')->insert($dataeksemplar);

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
                $filestore = $request->file('fullfile_'.$filebook->id.'_'.$jenisbuku);

                $judul = $request->{'judul_buku_'.$jenisbuku};

                $filestore->store('public/buku/'.$judul);

                $listfile[] = array(
                    'id_buku' => $buku->id,
                    'id_file_place' => $filebook->id,
                    'original_name' => $filestore->getClientOriginalName(),
                    'encrypt_name' => $filestore->hashName(),
                    'status' => 1,
                );
            }

            foreach ($results as $files) {
                $filestore = $request->file('filepdf_'.$files->id.'_'.$jenisbuku);

                $judul = $request->{'judul_buku_'.$jenisbuku};

                $filestore->store('public/buku/'.$judul);

                $listfile[] = array(
                    'id_buku' => $buku->id,
                    'id_file_place' => $files->id,
                    'original_name' => $filestore->getClientOriginalName(),
                    'encrypt_name' => $filestore->hashName(),
                    'status' => 1,
                );
            }

            if($listfile != null){
                DB::table('r__files')->insert($listfile);
            }
        }

        Alert::success('You are Successfully Add Book');

        return redirect()->route('akuisisi-buku.index');
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
