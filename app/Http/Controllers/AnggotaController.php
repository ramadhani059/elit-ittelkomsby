<?php

namespace App\Http\Controllers;

use App\Models\M_Buku;
use App\Models\M_Eksemplar;
use App\Models\R_File;
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
        $buku = M_Buku::all() ->take(10);

        return view('anggota.home', compact('pageTitle', 'buku'));
    }

    public function catalog()
    {
        $pageTitle = 'Katalog | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::paginate(20);

        return view('anggota.katalog', compact('pageTitle', 'buku'));
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
}
