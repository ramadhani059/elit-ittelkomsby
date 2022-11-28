<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $pageTitle = 'Home | ELIT ITTelkom Surabaya';

        // ELOQUENT
        $buku = M_Buku::all();

        return view('anggota.home', compact('pageTitle', 'buku'));
    }
}
