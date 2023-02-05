<?php

namespace App\Http\Controllers;

use App\Models\M_Akses_Jurnal;
use App\Models\M_Buku;
use App\Models\M_Eksemplar;
use App\Models\M_Information;
use App\Models\M_Notification;
use App\Models\R_File;
use App\Models\R_Jenis_Buku;
use App\Models\T_Peminjaman_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'catalog', 'detail_buku']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Home | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::latest()->paginate(10);
        $akses = M_Akses_Jurnal::all();
        $info = M_Information::latest()->paginate(8);

        return view('anggota.home', compact('pageTitle', 'buku', 'akses', 'info'));
    }

    public function catalog()
    {
        $pageTitle = 'Katalog | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::latest()->paginate(15);
        $jenisbuku = R_Jenis_Buku::all();

        return view('anggota.katalog', compact('pageTitle', 'buku', 'jenisbuku'));
    }

    public function detail_buku($slug)
    {
        $pageTitle = 'Detail Buku | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::where('slug', '=', $slug )->first();
        $status = [
            'id_buku' => $buku->id,
            'status' => 'dapat dipinjam',
        ];

        $file = R_File::where('id_buku', $buku->id)->get();

        $eksemplar = M_Eksemplar::where($status)->get();

        $bookable = count($eksemplar);

        $bataspinjam = 0;

        if (Auth::user() != null) {
            if (Auth::user()->level == 'anggota') {
                $pinjam = [
                    'id_anggota' => Auth::user() -> anggota ->id,
                    'status' => 'dipinjam',
                ];

                $book = [
                    'id_anggota' => Auth::user() -> anggota ->id,
                    'status' => 'proses',
                ];

                $peminjaman = T_Peminjaman_Buku::where($pinjam)->get();
                $pemesanan = T_Peminjaman_Buku::where($book)->get();

                $jmlpinjam = count($peminjaman);
                $jmlpesan = count($pemesanan);

                $bataspinjam = $jmlpinjam + $jmlpesan;
            }
        }

        return view('anggota.detailbuku', compact('pageTitle', 'buku', 'bookable', 'bataspinjam', 'file'));
    }

    public function detailinformasi($slug)
    {
        $info = M_Information::where('slug', $slug)->first();
        $pageTitle = $info->judul.' | ELIT ITTelkom Surabaya';

        $fullinfo = M_Information::latest()->paginate(20);

        return view('anggota.detailinformasi', compact('pageTitle', 'info', 'fullinfo'));
    }

    public function detailnotifikasi($id)
    {
        $notifikasi = M_Notification::find($id);
        $pageTitle = $notifikasi->judul.' | ELIT ITTelkom Surabaya';

        return view('anggota.detailinformasi', compact('pageTitle', 'notifikasi'));
    }

    public function notifikasi($id)
    {
        $notifikasi = M_Notification::latest()->paginate(50);
        $pageTitle = $notifikasi->judul.' | ELIT ITTelkom Surabaya';

        return view('anggota.detailinformasi', compact('pageTitle', 'notifikasi'));
    }
}
