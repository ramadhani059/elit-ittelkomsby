<?php

namespace App\Http\Controllers;

use App\Models\M_Buku;
use Illuminate\Http\Request;

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
        $buku = M_Buku::all();

        return view('anggota.katalog', compact('pageTitle', 'buku'));
    }

    public function detail_buku($kodebuku)
    {
        $pageTitle = 'Detail Buku | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::where('kode_buku', '=', $kodebuku )->first();

        return view('anggota.detailbuku', compact('pageTitle', 'buku'));
    }
}
