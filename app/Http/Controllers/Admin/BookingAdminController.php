<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\M_Buku;
use App\Models\T_Peminjaman;
use App\Models\T_Peminjaman_Buku;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Peminjaman | ELIT ITTelkom Surabaya';

        $booking = T_Peminjaman_Buku::all();

        return view('admin/booking/index', [
            'pageTitle' => $pageTitle,
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah Peminjam | Dashboard';

        // ELOQUENT
        $buku = M_Buku::all();
        $anggota = M_Anggota::all();

        return view('admin.booking.add', compact('pageTitle', 'buku', 'anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjaman = new T_Peminjaman_Buku;

        $huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $kodeBooking = strtoupper(substr(str_shuffle($huruf), 0, 7));

        $data = $request->nama_lengkap;

        $peminjaman->id_buku = $request->judul_buku;
        $peminjaman->id_anggota = $data;
        $dataPeminjam = M_Anggota::find($data);
        $peminjaman->kode_booking = $kodeBooking;
        $peminjaman->jenis_identitas = $request->jenis_identitas;
        $peminjaman->nomor_identitas = $request->nomor_identitas;
        $peminjaman->nama_peminjam = $dataPeminjam->nama_lengkap;
        $peminjaman->email_peminjam = $request->email;
        $peminjaman->no_hp = $request->no_hp;
        $peminjaman->alamat_peminjam = $request->address;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'dipinjam';
        $peminjaman->save();

        return redirect()->route('booking-admin.index');
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
