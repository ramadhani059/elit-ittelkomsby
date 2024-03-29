<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\T_Donasi_Buku;
use App\Models\R_Jenis_Buku;
use App\Models\R_Sirkulasi;
use App\Models\M_Fakultas;
use App\Models\M_Prodi;
use App\Models\R_File;
use App\Models\R_File_Place;
use App\Models\R_Pembimbing_Place;
use App\Models\R_Pengarang_Place;
use App\Models\R_Subjek_Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Donasi/Repository Buku | ELIT ITTelkom Surabaya';

        $donasi = T_Donasi_Buku::where('id_anggota', Auth::user() -> anggota ->id)->latest()->paginate(15);

        return view('anggota/donasi/index', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Donasi/Repository Buku | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $jenisbuku = R_Jenis_Buku::all();
        $sirkulasi = R_Sirkulasi::all();
        $fakultas = M_Fakultas::all();
        $prodi = M_Prodi::all();
        $fileplace = R_File_Place::all();

        return view('anggota.donasi.add', compact('pageTitle', 'jenisbuku', 'sirkulasi', 'fakultas', 'prodi', 'fileplace'));
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
            'judul_buku_'.$jenisbuku => 'required',
            'kota_terbit_'.$jenisbuku => 'required',
            'tahun_terbit_'.$jenisbuku => 'required|numeric',
            'nama_pengarang_depan_'.$jenisbuku => 'required',
            'nama_pengarang_belakang_'.$jenisbuku => 'required',
        ], $messages);

        $donasi = new T_Donasi_Buku;
        $donasi->id_jenis_buku = $jenisbuku;
        $cover = $request->file('filecover_'.$jenisbuku);

        if($cover == null){
            $donasi->cover= null;
        } else {
            $cover->store('public/buku/cover');
            $donasi->cover= $cover->hashName();
        }

        $data = Auth::user() -> anggota ->id;

        $donasi->id_anggota = $data;
        $donasi->isbn = $request->{'isbn_'.$jenisbuku};

        if ($request->{'edisi_buku_'.$jenisbuku} != null) {
            $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower()->append(' '.$request->{'edisi_buku_'.$jenisbuku});
        } else {
            $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower();
        }
        $donasi->judul = $judul;

        $donasi->judul_inggris = Str::lower($request->{'judul_buku_inggris_'.$jenisbuku});
        $donasi->anak_judul = Str::lower($request->{'anak_judul_'.$jenisbuku});
        $donasi->edisi = $request->{'edisi_buku_'.$jenisbuku};
        $donasi->ilustrasi = $request->{'ilustrasi_'.$jenisbuku};
        $donasi->dimensi = $request->{'dimensi_'.$jenisbuku};
        $donasi->id_prodi = $request->{'prodi_'.$jenisbuku};
        $donasi->kota_terbit = $request->{'kota_terbit_'.$jenisbuku};
        $donasi->tahun_terbit = $request->{'tahun_terbit_'.$jenisbuku};
        $donasi->penyunting = $request->{'penyunting_'.$jenisbuku};
        $donasi->penerjemah = $request->{'penerjemah_'.$jenisbuku};
        $donasi->penerbit = $request->{'penerbit_'.$jenisbuku};
        $donasi->ringkasan = $request->{'abstrak_'.$jenisbuku};
        $donasi->jml_eksemplar = $request->{'jumlah_eksemplar_'.$jenisbuku};
        $donasi->status_donasi = 'diajukan';
        $donasi->save();

        $targetsubjek = count(collect($request->{'subjek_'.$jenisbuku}));
        $targetpengarang = count(collect($request->{'nama_pengarang_depan_'.$jenisbuku}));
        $targetpembimbing = count(collect($request->{'pembimbing_'.$jenisbuku}));

        if ($request->{'subjek_'.$jenisbuku} != null){
            for ($x=0; $x<$targetsubjek; $x++){
                $listsubjek[] = array(
                    'id_donasi' => $donasi->id,
                    'nama' => $request->{'subjek_'.$jenisbuku}[$x],
                );
            }
            DB::table('r__subjek__places')->insert($listsubjek);
        }

        if ($request->{'nama_pengarang_depan_'.$jenisbuku} != null){
            for ($x=0; $x<$targetpengarang; $x++){
                $listpengarang[] = array(
                    'id_donasi' => $donasi->id,
                    'no_identitas' => $request->{'no_pengarang_'.$jenisbuku}[$x],
                    'nama' => Str::of($request->{'nama_pengarang_depan_'.$jenisbuku}[$x])->append(' '.$request->{'nama_pengarang_belakang_'.$jenisbuku}[$x]),
                    'nama_depan' => $request->{'nama_pengarang_depan_'.$jenisbuku}[$x],
                    'nama_belakang' => $request->{'nama_pengarang_belakang_'.$jenisbuku}[$x],
                );
            }
            DB::table('r__pengarang__places')->insert($listpengarang);
        }

        if ($request->{'pembimbing_'.$jenisbuku} != null){
            for ($x=0; $x<$targetpembimbing; $x++){
                $listpembimbing[] = array(
                    'id_donasi' => $donasi->id,
                    'no_identitas' => $request->{'no_pembimbing_'.$jenisbuku}[$x],
                    'nama' => $request->{'pembimbing_'.$jenisbuku}[$x],
                );
            }
            DB::table('r__pembimbing__places')->insert($listpembimbing);
        }

        $idfile = [
            'id_jenisbuku' => $jenisbuku,
            'tipe' => 'pdf',
        ];

        $fullfile = [
            'id_jenisbuku' => $jenisbuku,
            'nama' => 'File',
            'tipe' => 'fullfile',
        ];

        $results = R_File_Place::where($idfile)->get();
        $file = R_File_Place::where($fullfile)->get();
        $listfile = [];

        foreach ($file as $filebook) {
            $filestore = $request->file('fullfile_'.$filebook->id.'_'.$jenisbuku);
            $filejudul = Str::of($judul)->slug('-');
            $filestore->store('public/buku/'.$filejudul);
            $listfile[] = array(
                'id_donasi' => $donasi->id,
                'id_file_place' => $filebook->id,
                'original_name' => $filestore->getClientOriginalName(),
                'encrypt_name' => $filestore->hashName(),
                'location_path' => 'buku/'.$filejudul.'/',
            );
        }
        foreach ($results as $files) {
            $filestore = $request->file('filepdf_'.$files->id.'_'.$jenisbuku);
            $filejudul = Str::of($judul)->slug('-');
            $filestore->store('public/buku/'.$filejudul);
            $listfile[] = array(
                'id_donasi' => $donasi->id,
                'id_file_place' => $files->id,
                'original_name' => $filestore->getClientOriginalName(),
                'encrypt_name' => $filestore->hashName(),
                'location_path' => 'buku/'.$filejudul.'/',
            );
        }

        if($listfile != null){
            DB::table('r__files')->insert($listfile);
        }

        Alert::success('Anda Berhasil Mendonasikan Buku');

        return redirect()->route('donasibuku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donasi = T_Donasi_Buku::find($id);
        $pageTitle = 'Detail Donasi | ELIT ITTelkom Surabaya';
        $file = R_File::where('id_donasi', $donasi->id)->get();

        return view('anggota/donasi/view', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi,
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
        $donasi = T_Donasi_Buku::find($id);
        $jenisbuku = R_Jenis_Buku::all();
        $fakultas = M_Fakultas::all();
        $prodi = M_Prodi::all();
        $fileplace = R_File_Place::all();

        $pageTitle = 'Edit Donasi Buku | ELIT ITTelkom Surabaya';

        return view('anggota/donasi/edit', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi,
            'jenisbuku' => $jenisbuku,
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
    public function update(Request $request, $donasibuku)
    {
        $jenisbuku = $request->jenis_buku;

        $messages = [
            'required' => ':Attribute is require',
            'numeric' => 'Fill :Attribute with number',
        ];

        $request->validate([
            'jenis_buku' => 'required',
            'judul_buku_'.$jenisbuku => 'required',
            'kota_terbit_'.$jenisbuku => 'required',
            'tahun_terbit_'.$jenisbuku => 'required|numeric',
        ], $messages);

        $donasi = T_Donasi_Buku::find($donasibuku);
        $donasi->id_jenis_buku = $jenisbuku;
        $cover = $request->file('filecover_'.$jenisbuku);

        if($cover != null){
            // Delete Existing Image
            Storage::disk('public')->delete('buku/cover/'.$donasi->cover);

            $cover->store('public/buku/cover');
            $donasi->cover= $cover->hashName();
        }

        $data = Auth::user() -> anggota ->id;

        $donasi->id_anggota = $data;
        $donasi->isbn = $request->{'isbn_'.$jenisbuku};

        if ($request->{'edisi_buku_'.$jenisbuku} != null) {
            $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower()->append(' '.$request->{'edisi_buku_'.$jenisbuku});
        } else {
            $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower();
        }
        $donasi->judul = $judul;

        $donasi->judul_inggris = Str::lower($request->{'judul_buku_inggris_'.$jenisbuku});
        $donasi->anak_judul = Str::lower($request->{'anak_judul_'.$jenisbuku});
        $donasi->edisi = $request->{'edisi_buku_'.$jenisbuku};
        $donasi->ilustrasi = $request->{'ilustrasi_'.$jenisbuku};
        $donasi->dimensi = $request->{'dimensi_'.$jenisbuku};
        $donasi->id_prodi = $request->{'prodi_'.$jenisbuku};
        $donasi->kota_terbit = $request->{'kota_terbit_'.$jenisbuku};
        $donasi->tahun_terbit = $request->{'tahun_terbit_'.$jenisbuku};
        $donasi->penyunting = $request->{'penyunting_'.$jenisbuku};
        $donasi->penerjemah = $request->{'penerjemah_'.$jenisbuku};
        $donasi->penerbit = $request->{'penerbit_'.$jenisbuku};
        $donasi->ringkasan = $request->{'abstrak_'.$jenisbuku};
        $donasi->jml_eksemplar = $request->{'jumlah_eksemplar_'.$jenisbuku};
        $donasi->status_donasi = 'diajukan';
        $donasi->save();

        $subjek = R_Subjek_Place::where('id_donasi', $donasibuku);
        $pengarang = R_Pengarang_Place::where('id_donasi', $donasibuku);
        $pembimbing = R_Pembimbing_Place::where('id_donasi', $donasibuku);

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
                        'id_donasi' => $donasi->id,
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
                        'id_donasi' => $donasi->id,
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
                        'id_donasi' => $donasi->id,
                        'no_identitas' => $request->{'no_pembimbing_'.$jenisbuku}[$x],
                        'nama' => $request->{'pembimbing_'.$jenisbuku}[$x],
                    );
                }
            }
            DB::table('r__pembimbing__places')->insert($listpembimbing);
        }

        $idfile = [
            'id_jenisbuku' => $jenisbuku,
            'tipe' => 'pdf',
        ];

        $fullfile = [
            'id_jenisbuku' => $jenisbuku,
            'nama' => 'File',
            'tipe' => 'fullfile',
        ];

        $results = R_File_Place::where($idfile)->get();
        $file = R_File_Place::where($fullfile)->get();
        $listfile = [];

        foreach ($file as $filebook) {
            if ($request->file('fullfile_edit_'.$filebook->id.'_'.$jenisbuku) != null) {
                $file_exist = R_File::where([
                    'id_donasi' => $donasibuku,
                    'id_file_place' => $filebook->id,
                ])->get()->first();

                // Delete Existing Image
                Storage::disk('public')->delete($file_exist->location_path.$file_exist->encrypt_name);

                $filestore = $request->file('fullfile_edit_'.$filebook->id.'_'.$jenisbuku);

                $filestore->store('public/'.$file_exist->location_path);

                $listfile[] = array(
                    'id_donasi' => $donasi->id,
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
                $filepdf_exist = R_File::where([
                    'id_donasi' => $donasibuku,
                    'id_file_place' => $files->id,
                ])->get()->first();

                // Delete Existing Image
                Storage::disk('public')->delete($filepdf_exist->location_path.$file_exist->encrypt_name);

                $filestore = $request->file('filepdf_'.$files->id.'_'.$jenisbuku);

                $filestore->store('public/'.$filepdf_exist->location_path);

                $listfile[] = array(
                    'id_donasi' => $donasi->id,
                    'id_file_place' => $files->id,
                    'original_name' => $filestore->getClientOriginalName(),
                    'encrypt_name' => $filestore->hashName(),
                    'location_path' => $filepdf_exist->location_path,
                );

                $filepdf_exist->delete();
            }
        }

        if($listfile != null){
            DB::table('r__files')->insert($listfile);
        }

        Alert::success('Anda Berhasil Merubah Data Donasi Buku');

        return redirect()->route('donasibuku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = T_Donasi_Buku::find($id);
        $file = R_File::where([
            'id_donasi' => $donasi->id,
        ])->get()->first();

        if($file->id_buku == null){
            // Delete File Image
            Storage::disk('public')->delete('buku/cover/'.$donasi->cover);
            Storage::disk('public')->deleteDirectory($file->location_path);
            $donasi->delete();
        }

        Alert::success('Anda Berhasil Menghapus Data Donasi Buku');

        return redirect()->route('donasibuku.index');
    }

    public function cancel($id){
        $donasi = T_Donasi_Buku::find($id);

        $donasi -> status_donasi = 'dibatalkan';

        $donasi->save();

        Alert::success('Anda Berhasil Membatalkan Donasi Buku');

        return redirect()->route('donasibuku.index');
    }
}
