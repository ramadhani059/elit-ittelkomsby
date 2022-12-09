<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\M_Pengarang;
use App\Models\M_Penyunting;
use App\Models\R_File;
use App\Models\R_Jenis_Buku;
use App\Models\R_Penerbit;
use App\Models\R_Sirkulasi;
use App\Models\R_Subjek;
use App\Models\R_Pengarang_Place;
use App\Models\M_Eksemplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        $catalog = M_Buku::all();

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
        $catalog = M_Buku::find($id);
        $id_file = $catalog->id_file;
        $file = R_File::find($id_file);
        $pengarang = R_Pengarang_Place::where('id_buku',$id);
        $eksemplar = M_Eksemplar::where('id_buku',$id);
        $ImgPdfEncrypted = $file->file_pdf;
        $ImgCoverEncrypted = $file->cover_encrypt;
        $ImgCoverPdfEncrypted = $file->cover_laporan;
        $ImgDisclimerEncrypted = $file->disclimer;
        $ImgLembarPengesahanEncrypted = $file->lembar_pengesahan;
        $ImgFileAbstrakEncrypted = $file->file_abstrak;
        $ImgLembarPersembahanEncrypted = $file->lembar_persembahan;
        $ImgKataPengantarEncrypted = $file->kata_pengantar;
        $ImgDaftarIsiEncrypted = $file->daftar_isi;
        $ImgDaftarGambarEncrypted = $file->daftar_gambar;
        $ImgDaftarTabelEncrypted = $file->daftar_tabel;
        $ImgBab1Encrypted = $file->bab_1;
        $ImgBab2Encrypted = $file->bab_2;
        $ImgBab3Encrypted = $file->bab_3;
        $ImgBab4Encrypted = $file->bab_4;
        $ImgBab5Encrypted = $file->bab_5;
        $ImgBab6Encrypted = $file->bab_6;
        $ImgBab7Encrypted = $file->bab_7;
        $ImgDaftarPustakaEncrypted = $file->daftar_pustaka;
        $ImgLampiranEncrypted = $file->lampiran;
        $ImgMateriEncrypted = $file->materi_presentasi;
        $ImgProposalEncrypted = $file->proposal;

        // Delete Table
        $eksemplar->delete();
        $pengarang->delete();
        $catalog->delete();
        $file->delete();

        // Delete File Image
        Storage::disk('public')->delete('buku/filepdf/'.$ImgPdfEncrypted);
        Storage::disk('public')->delete('buku/cover/'.$ImgCoverEncrypted);
        Storage::disk('public')->delete('buku/coverpdf/'.$ImgCoverPdfEncrypted);
        Storage::disk('public')->delete('buku/disclimer/'.$ImgDisclimerEncrypted);
        Storage::disk('public')->delete('buku/lembarpengesahan/'.$ImgLembarPengesahanEncrypted);
        Storage::disk('public')->delete('buku/fileabstrak/'.$ImgFileAbstrakEncrypted);
        Storage::disk('public')->delete('buku/lembarpersembahan/'.$ImgLembarPersembahanEncrypted);
        Storage::disk('public')->delete('buku/katapengantar/'.$ImgKataPengantarEncrypted);
        Storage::disk('public')->delete('buku/daftarisi/'.$ImgDaftarIsiEncrypted);
        Storage::disk('public')->delete('buku/daftargambar/'.$ImgDaftarGambarEncrypted);
        Storage::disk('public')->delete('buku/daftartabel/'.$ImgDaftarTabelEncrypted);
        Storage::disk('public')->delete('buku/bab1/'.$ImgBab1Encrypted);
        Storage::disk('public')->delete('buku/bab2/'.$ImgBab2Encrypted);
        Storage::disk('public')->delete('buku/bab3/'.$ImgBab3Encrypted);
        Storage::disk('public')->delete('buku/bab4/'.$ImgBab4Encrypted);
        Storage::disk('public')->delete('buku/bab5/'.$ImgBab5Encrypted);
        Storage::disk('public')->delete('buku/bab6/'.$ImgBab6Encrypted);
        Storage::disk('public')->delete('buku/bab7/'.$ImgBab7Encrypted);
        Storage::disk('public')->delete('buku/daftarpustaka/'.$ImgDaftarPustakaEncrypted);
        Storage::disk('public')->delete('buku/lampiran/'.$ImgLampiranEncrypted);
        Storage::disk('public')->delete('buku/materipresentasi/'.$ImgMateriEncrypted);
        Storage::disk('public')->delete('buku/proposal/'.$ImgProposalEncrypted);

        Alert::success('Deleted Successfully', 'Book Data Deleted Successfully');

        return redirect()->route('catalog-admin.index');
    }
}
