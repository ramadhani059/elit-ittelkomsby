<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\M_Fakultas;
use App\Models\M_Prodi;
use App\Models\R_File;
use App\Models\R_File_Place;
use App\Models\R_Jenis_Buku;
use App\Models\R_Pembimbing_Place;
use App\Models\R_Pengarang_Place;
use App\Models\R_Sirkulasi;
use App\Models\R_Subjek_Place;
use App\Models\T_Donasi_Buku;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Donasi Buku | ELIT ITTelkom Surabaya';

        $donasi = T_Donasi_Buku::latest()->paginate(50);

        return view('admin/donasi/index', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi
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
        $donasi = T_Donasi_Buku::find($id);
        $pageTitle = 'Detail Donasi | ELIT ITTelkom Surabaya';
        $file = R_File::where('id_donasi', $donasi->id)->get();

        return view('admin/donasi/view', [
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
    public function check($id)
    {
        $donasi = T_Donasi_Buku::find($id);
        $pageTitle = 'Check Donasi | ELIT ITTelkom Surabaya';
        $file = R_File::where('id_donasi', $donasi->id)->get();

        return view('admin/donasi/check', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi,
            'file' => $file,
        ]);
    }

    public function checkberhasil($id)
    {
        $donasi = T_Donasi_Buku::find($id);

        $donasi->status_donasi = 'diterima';
        $donasi->keterangan = '<p><strong>Terima kasih atas donasi buku</strong> yang anda berikan kepada Perpustakaan ITTelkom Surabaya</p> <p>Anda dapat menyerahkan buku fisik pada hari <strong>Senin - Jumat</strong> jam <strong>08.00 - 16.00</strong></p>';
        $donasi->save();

        Alert::success('Anda Berhasil Menerima Data Donasi Buku');

        return redirect()->route('donasi-admin.index');
    }

    public function checkditolak(Request $request, $id)
    {
        $donasi = T_Donasi_Buku::find($id);

        $donasi->status_donasi = 'ditolak';
        $donasi->keterangan = $request->pesan;
        $donasi->save();

        Alert::success('Anda Berhasil Menolak Data Donasi Buku');

        return redirect()->route('donasi-admin.index');
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
        $pageTitle = 'Transfer Donasi ke Katalog | ELIT ITTelkom Surabaya';
        $file = R_File::where('id_donasi', $donasi->id)->get();
        $jenisbuku = R_Jenis_Buku::all();
        $sirkulasi = R_Sirkulasi::all();
        $fakultas = M_Fakultas::all();
        $prodi = M_Prodi::all();
        $fileplace = R_File_Place::all();

        return view('admin/donasi/edit', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi,
            'file' => $file,
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
    public function update(Request $request, $id)
    {
        $donasi = T_Donasi_Buku::find($id);

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

        $check = M_Buku::where('kode_buku', $request->{'kode_buku_'.$jenisbuku})->exists();

        if ($check){
            $checkbuku = M_Buku::where('kode_buku', $request->{'kode_buku_'.$jenisbuku})->get()->first();

            Alert::error('Buku Anda Tidak Tersimpan!', 'Buku Anda Sudah Terdaftar !!');

            return redirect()->route('akuisisi-buku.index');
        } else {
            $buku = new M_Buku;

            $buku->id_jenis_buku = $jenisbuku;

            $cover = $request->file('filecover_'.$jenisbuku);
            if($cover == null){
                $buku->cover= $donasi->cover;
            } else {
                // Delete Existing Image
                Storage::disk('public')->delete('buku/cover/'.$donasi->cover);

                $cover->store('public/buku/cover');
                $donasi->cover = $cover->hashName();
                $buku->cover= $cover->hashName();
            }

            $buku->kode_buku = $request->{'kode_buku_'.$jenisbuku};
            $buku->isbn = $request->{'isbn_'.$jenisbuku};
            $buku->lokasi_buku = $request->{'lokasi_buku_'.$jenisbuku};
            if ($request->{'edisi_buku_'.$jenisbuku} != null) {
                $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower()->append(' '.$request->{'edisi_buku_'.$jenisbuku});
            } else {
                $judul = Str::of($request->{'judul_buku_'.$jenisbuku})->lower();
            }
            $buku->judul = $judul;
            $slug = Str::of($judul)->slug('-');
            $buku->slug = Str::of($request->{'kode_buku_'.$jenisbuku})->slug('-')->append('-'.$slug);
            $buku->judul_inggris = Str::lower($request->{'judul_buku_inggris_'.$jenisbuku});
            $buku->anak_judul = Str::lower($request->{'anak_judul_'.$jenisbuku});
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

            $subjek = R_Subjek_Place::where('id_donasi', $id);
            $pengarang = R_Pengarang_Place::where('id_donasi', $id);
            $pembimbing = R_Pembimbing_Place::where('id_donasi', $id);

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
                            'id_buku' => $buku->id,
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
                            'id_buku' => $buku->id,
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
                            'id_buku' => $buku->id,
                            'id_donasi' => $donasi->id,
                            'no_identitas' => $request->{'no_pembimbing_'.$jenisbuku}[$x],
                            'nama' => $request->{'pembimbing_'.$jenisbuku}[$x],
                        );
                    }
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
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $filebook->id,
                    ])->get()->first();

                    // Delete Existing Image
                    Storage::disk('public')->delete($file_exist->location_path.$file_exist->encrypt_name);

                    $filestore = $request->file('fullfile_edit_'.$filebook->id.'_'.$jenisbuku);

                    $filestore->store('public/'.$file_exist->location_path);

                    $listfile[] = array(
                        'id_buku' => $buku->id,
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $filebook->id,
                        'original_name' => $filestore->getClientOriginalName(),
                        'encrypt_name' => $filestore->hashName(),
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                } else {
                    $file_exist = R_File::where([
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $filebook->id,
                    ])->get()->first();

                    $listfile[] = array(
                        'id_buku' => $buku->id,
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $filebook->id,
                        'original_name' => $file_exist->original_name,
                        'encrypt_name' => $file_exist->encrypt_name,
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                }
            }

            foreach ($results as $files) {
                if ($request->file('filepdf_'.$files->id.'_'.$jenisbuku) != null) {
                    $file_exist = R_File::where([
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $files->id,
                    ])->get()->first();

                    // Delete Existing Image
                    Storage::disk('public')->delete($file_exist->location_path.$file_exist->encrypt_name);

                    $filestore = $request->file('filepdf_'.$files->id.'_'.$jenisbuku);

                    $filestore->store('public/'.$file_exist->location_path);

                    $listfile[] = array(
                        'id_buku' => $buku->id,
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $files->id,
                        'original_name' => $filestore->getClientOriginalName(),
                        'encrypt_name' => $filestore->hashName(),
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                } else {
                    $file_exist = R_File::where([
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $filebook->id,
                    ])->get()->first();

                    $listfile[] = array(
                        'id_buku' => $buku->id,
                        'id_donasi' => $donasi->id,
                        'id_file_place' => $files->id,
                        'original_name' => $file_exist->original_name,
                        'encrypt_name' => $file_exist->encrypt_name,
                        'location_path' => $file_exist->location_path,
                    );

                    $file_exist->delete();
                }
            }

            if($listfile != null){
                DB::table('r__files')->insert($listfile);
            }

            $donasi->status_donasi = 'selesai';
            $donasi->save();
        }

        Alert::success('Anda Berhasil Memindahkan Data Donasi Kedalam Katalog');

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
        $donasi = T_Donasi_Buku::find($id);
        $file = R_File::where([
            'id_donasi' => $donasi->id,
        ])->get()->first();

        foreach ($donasi->subjek_place as $subjek) {
            if($subjek->id_buku == null){
                $subjek->delete();
            }
        }

        foreach ($donasi->pengarang_place as $pengarang) {
            if($pengarang->id_buku == null){
                $pengarang->delete();
            }
        }

        foreach ($donasi->pembimbing_place as $pembimbing) {
            if($pembimbing->id_buku == null){
                $pembimbing->delete();
            }
        }

        if($file->id_buku == null){
            // Delete File Image
            Storage::disk('public')->delete('buku/cover/'.$donasi->cover);
            Storage::disk('public')->deleteDirectory($file->location_path);

            // Delete Column
            foreach ($donasi->file as $filebuku){
                if($filebuku->id_buku == null){
                    $filebuku->delete();
                }
            }
        }
        $donasi->delete();

        Alert::success('Anda Berhasil Menghapus Data Donasi Buku');

        return redirect()->route('donasi-admin.index');
    }
}
