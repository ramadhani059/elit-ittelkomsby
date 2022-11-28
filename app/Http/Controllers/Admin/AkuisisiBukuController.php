<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\M_Pengarang;
use App\Models\M_Penyunting;
use App\Models\R_Jenis_Buku;
use App\Models\R_Penerbit;
use App\Models\R_Sirkulasi;
use App\Models\R_Subjek;
use App\Models\R_File;
use App\Models\R_Pengarang_Place;
use Illuminate\Http\Request;

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
        $subjek = R_Subjek::all();
        $pengarang = M_Pengarang::all();
        $penyunting = M_Penyunting::all();
        $penerbit = R_Penerbit::all();
        $sirkulasi = R_Sirkulasi::all();

        return view('admin.akuisisi.index', compact('pageTitle', 'jenisbuku', 'subjek', 'pengarang', 'penyunting', 'penerbit', 'sirkulasi'));
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
        $subjek = new R_Subjek;
        $pengarang = new M_Pengarang;
        $penyunting = new M_Penyunting;
        $penerbit = new R_Penerbit;
        $file = new R_File;
        $buku = new M_Buku;

        $tambahpenerbit = $request->penerbit;
        if($tambahpenerbit == 'add'){
            $penerbit->nama = $request->tambah_penerbit;
            $penerbit->save();
            $buku->id_penerbit = $penerbit->id;
        } else {
            $buku->id_penerbit = $tambahpenerbit;
        }

        $tambahpengarang = $request->pengarang;
        if($tambahpengarang == 'add'){
            $pengarang->nama = $request->tambah_pengarang;
            $pengarang->save();
        }

        $tambahpenyunting = $request->penyunting;
        if($tambahpenyunting == 'add'){
            $penyunting->nama = $request->tambah_penyunting;
            $penyunting->save();
            $buku->id_penyunting = $penyunting->id;
        } else {
            $buku->id_penyunting = $tambahpenyunting;
        }

        $tambahsubjek = $request->subjek;
        if($tambahsubjek == 'add'){
            $subjek->nama = $request->tambah_subjek;
            $subjek->save();
            $buku->id_subjek = $subjek->id;
        } else {
            $buku->id_subjek = $tambahsubjek;
        }

        $buku->id_jenis_buku = $request->jenis_buku;
        $buku->id_sirkulasi = $request->sirkulasi;

        $tambahfile = $request->file('filecover');
        if($tambahfile == null){
            $file->cover_original = null;
            $file->cover_encrypt = null;
        } else {
            $tambahfile->store('public/buku/cover');
            $file->cover_original = $tambahfile->getClientOriginalName();
            $file->cover_encrypt = $tambahfile->hashName();
        }

        $buku->kode_buku = $request->kode_buku;
        $buku->lokasi_buku = $request->lokasi_buku;
        $buku->judul = $request->judul_buku;
        $buku->anak_judul = $request->anak_judul;
        $buku->edisi = $request->edisi_buku;
        $buku->kota_terbit = $request->kota_terbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->ilustrasi = $request->ilustrasi;
        $buku->dimensi = $request->dimensi;
        $buku->isbn = $request->isbn;
        $buku->ringkasan = $request->abstrak;
        $buku->jumlah = $request->jumlah_eksemplar;
        $buku->dipinjam = 0;
        $buku->status_active = $request->status;
        $buku->role_download = $request->role_download;

        $filepdf = $request->file('filepdf');
        $coverlaporan = $request->file('filecoverpdf');
        $disclimer = $request->file('filedisclimerpdf');
        $lembarpengesahan = $request->file('filepengesahanpdf');
        $fileabstrak = $request->file('fileabstrakpdf');
        $lembarpersembahan = $request->file('filepersembahanpdf');
        $katapengantar = $request->file('filepengantarpdf');
        $daftarisi = $request->file('filedaftarisipdf');
        $daftargambar = $request->file('filedaftargambarpdf');
        $daftartabel = $request->file('filedaftartabelpdf');
        $bab1 = $request->file('filebab1pdf');
        $bab2 = $request->file('filebab2pdf');
        $bab3 = $request->file('filebab3pdf');
        $bab4 = $request->file('filebab4pdf');
        $bab5 = $request->file('filebab5pdf');
        $bab6 = $request->file('filebab6pdf');
        $bab7 = $request->file('filebab7pdf');
        $daftarpustaka = $request->file('filedaftarpustakapdf');
        $lampiran = $request->file('filelampiranpdf');
        $materipresentasi = $request->file('filemateripresenstasipdf');
        $proposal = $request->file('fileproposalpdf');

        if ($filepdf != null){
            $filepdf->store('public/buku/filepdf');
            $file->file_pdf = $filepdf->hashName();
        }

        if ($coverlaporan != null){
            $coverlaporan->store('public/buku/coverpdf');
            $file->cover_laporan = $coverlaporan->hashName();
        }

        if ($disclimer != null){
            $disclimer->store('public/buku/disclimer');
            $file->disclimer = $disclimer->hashName();
        }

        if ($lembarpengesahan != null){
            $lembarpengesahan->store('public/buku/lembarpengesahan');
            $file->lembar_pengesahan = $lembarpengesahan->hashName();
        }

        if ($fileabstrak != null){
            $fileabstrak->store('public/buku/fileabstrak');
            $file->file_abstrak = $fileabstrak->hashName();
        }

        if ($lembarpersembahan != null){
            $lembarpersembahan->store('public/buku/lembarpersembahan');
            $file->lembar_persembahan = $lembarpersembahan->hashName();
        }

        if ($katapengantar != null){
            $katapengantar->store('public/buku/katapengantar');
            $file->kata_pengantar = $katapengantar->hashName();
        }

        if ($daftarisi != null){
            $daftarisi->store('public/buku/daftarisi');
            $file->daftar_isi = $daftarisi->hashName();
        }

        if ($daftargambar != null){
            $daftargambar->store('public/buku/daftargambar');
            $file->daftar_gambar = $daftargambar->hashName();
        }

        if ($daftartabel != null){
            $daftartabel->store('public/buku/daftartabel');
            $file->daftar_tabel = $daftartabel->hashName();
        }

        if ($bab1 != null){
            $bab1->store('public/buku/bab1');
            $file->bab_1 = $bab1->hashName();
        }

        if ($bab2 != null){
            $bab2->store('public/buku/bab2');
            $file->bab_2 = $bab2->hashName();
        }

        if ($bab3 != null){
            $bab3->store('public/buku/bab3');
            $file->bab_3 = $bab3->hashName();
        }

        if ($bab4 != null){
            $bab4->store('public/buku/bab4');
            $file->bab_4 = $bab4->hashName();
        }

        if ($bab5 != null){
            $bab5->store('public/buku/bab5');
            $file->bab_5 = $bab5->hashName();
        }

        if ($bab6 != null){
            $bab6->store('public/buku/bab6');
            $file->bab_6 = $bab6->hashName();
        }

        if ($bab7 != null){
            $bab7->store('public/buku/bab7');
            $file->bab_7 = $bab7->hashName();
        }

        if ($daftarpustaka != null){
            $daftarpustaka->store('public/buku/daftarpustaka');
            $file->daftar_pustaka = $daftarpustaka->hashName();
        }

        if ($lampiran != null){
            $lampiran->store('public/buku/lampiran');
            $file->lampiran = $lampiran->hashName();
        }

        if ($materipresentasi != null){
            $materipresentasi->store('public/buku/materipresentasi');
            $file->materi_presentasi = $materipresentasi->hashName();
        }

        if ($proposal != null){
            $proposal->store('public/buku/proposal');
            $file->proposal = $proposal->hashName();
        }

        $file->save();
        $buku->id_file = $file->id;
        $buku->save();

        $pengarangplace = new R_Pengarang_Place;
        if($tambahpengarang == 'add'){
            $pengarangplace->id_pengarang = $pengarang->id;
        } else {
            $pengarangplace->id_pengarang = $tambahpengarang;
        }

        $pengarangplace->id_buku = $buku->id;
        $pengarangplace->save();

        return redirect()->route('catalog-admin.index');
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
