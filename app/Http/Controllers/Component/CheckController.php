<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\M_Buku;
use App\Models\M_Eksemplar;
use App\Models\T_Peminjaman_Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckController extends Controller
{
    public function pinjam($id){
        $peminjaman = new T_Peminjaman_Buku;

        $dataeksemplar = [
            'id_buku' => $id,
            'status' => 'dapat dipinjam',
        ];

        $checkeksemplar = M_Eksemplar::where($dataeksemplar)->take(1)->get();

        $huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $kodeBooking = strtoupper(substr(str_shuffle($huruf), 0, 7));

        $data = Auth::user() -> anggota ->id;

        $ideksemplar = 0;

        foreach ($checkeksemplar as $eksemplar ) {
            $ideksemplar = $eksemplar->id;
        }

        $updatestatus = M_Eksemplar::find($ideksemplar);
        $updatestatus->status = 'dipesan';
        $updatestatus->save();

        $peminjaman->id_eksemplar = $ideksemplar;
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

        $checkeksemplar = M_Eksemplar::find($peminjaman->id_eksemplar);

        $checkeksemplar->status = 'dipinjam';

        $peminjaman->batas_pinjam = Carbon::now()->addDay(7);
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'dipinjam';
        $peminjaman->save();
        $checkeksemplar->save();

        return back();
    }

    public function selesai($id){
        $peminjaman = T_Peminjaman_Buku::find($id);

        $checkeksemplar = M_Eksemplar::find($peminjaman->id_eksemplar);

        $checkeksemplar->status = 'dapat dipinjam';

        $peminjaman->tgl_kembali = Carbon::now();
        $peminjaman->total_denda = 0;
        $peminjaman->status = 'selesai';
        $peminjaman->save();
        $checkeksemplar->save();

        return redirect()->route('booking-admin.index');
    }

    public function cancel($id){
        $peminjaman = T_Peminjaman_Buku::find($id);

        $checkeksemplar = M_Eksemplar::find($peminjaman->id_eksemplar);

        $checkeksemplar->status = 'dapat dipinjam';

        $peminjaman->tgl_kembali = Carbon::now();
        $peminjaman->status = 'dibatalkan';
        $peminjaman->save();
        $checkeksemplar->save();


        Alert::success('Booking Cancelled', 'The Book Has Been Cancelled');

        return redirect()->route('history.index');
    }
}
