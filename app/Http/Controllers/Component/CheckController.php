<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\T_Peminjaman_Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckController extends Controller
{
    public function pinjam($id){
        $peminjaman = new T_Peminjaman_Buku;

        $huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $kodeBooking = strtoupper(substr(str_shuffle($huruf), 0, 7));

        $data = Auth::user() -> anggota ->id;

        $peminjaman->id_buku = $id;
        $peminjaman->id_anggota = $data;
        $dataPeminjam = M_Anggota::find($data);
        $peminjaman->kode_booking = $kodeBooking;
        $peminjaman->nama_peminjam = $dataPeminjam->nama_lengkap;
        $peminjaman->email_peminjam = $dataPeminjam->user->email;
        $peminjaman->no_hp = $dataPeminjam->no_hp;
        $peminjaman->alamat_peminjam = $dataPeminjam->alamat;
        $peminjaman->tgl_pinjam = Carbon::now();
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'proses';
        $peminjaman->save();

        Alert::success('Booking Successfully', 'Book Booked Successfully');

        return redirect()->route('history.index');
    }

    public function disetujui($id){
        $peminjaman = T_Peminjaman_Buku::find($id);

        $peminjaman->batas_pinjam = Carbon::now()->addDay(7);
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'dipinjam';
        $peminjaman->save();

        return back();
    }

    public function selesai($id){
        $peminjaman = T_Peminjaman_Buku::find($id);

        $peminjaman->tgl_kembali = Carbon::now();
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'selesai';
        $peminjaman->save();

        return redirect()->route('booking-admin.index');
    }

    public function cancel($id){
        $peminjaman = T_Peminjaman_Buku::find($id);

        $peminjaman->tgl_kembali = Carbon::now();
        $peminjaman->status = 'dibatalkan';
        $peminjaman->save();

        Alert::success('Booking Cancelled', 'The Book Has Been Cancelled');

        return redirect()->route('history.index');
    }
}
