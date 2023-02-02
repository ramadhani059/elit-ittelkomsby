<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File_Place;
use App\Models\R_Jenis_Buku;
use App\Models\T_Donasi_Buku;
use App\Models\T_Peminjaman_Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getKodeBuku($kode){
        $kodebuku = M_Buku::where('kode_buku',$kode)->get();
        return response()->json($kodebuku);
    }

    public function getFilePlace($id){
        $fileplace = R_File_Place::where('id_jenisbuku',$id)->get();
        return response()->json($fileplace);
    }

    // Anggota
    public function searchCatalog(Request $request){
        $pageTitle = 'Katalog | ELIT ITTelkom Surabaya';
        $jenisbuku = R_Jenis_Buku::all();

        $find = $request->search_catalog;

        // ELOQUENT
        // $buku = M_Buku::where('judul', 'LIKE', "%{$find}%")->paginate(20);

        $buku = M_Buku::with('subjek_place', 'pembimbing_place', 'pengarang_place', 'jenis_buku')
            ->where('judul', 'LIKE', '%'.$find.'%')
            ->orWhere('kode_buku', 'LIKE', '%'.$find.'%')
            ->orWhere('penerbit', 'LIKE', '%'.$find.'%')
            ->orWhereHas('subjek_place', function ($findsubjek) use ($find){
                $findsubjek->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pembimbing_place', function ($findpembimbing) use ($find){
                $findpembimbing->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pengarang_place', function ($findpengarang) use ($find){
                $findpengarang->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('jenis_buku', function ($findjenisbuku) use ($find){
                $findjenisbuku->where('nama', 'like', '%'.$find.'%');
            })
            ->paginate(20);

        return view('anggota.katalog', compact('pageTitle', 'buku', 'jenisbuku'));
    }

    public function filterCatalog(Request $request){
        $pageTitle = 'Katalog | ELIT ITTelkom Surabaya';
        $jenisbuku = R_Jenis_Buku::all();

        $buku = M_Buku::with('subjek_place', 'pembimbing_place', 'pengarang_place', 'jenis_buku');

        if($request->jenis_buku != null){
            $buku = $buku->where('id_jenis_buku', '=', $request->jenis_buku);
        }
        if($request->judul != null){
            $buku = $buku->where('judul', 'like', '%'.$request->judul.'%');
        }
        if($request->kode != null){
            $buku = $buku->where('kode_buku', 'like', '%'.$request->kode.'%');
        }
        if($request->pengarang != null){
            $pengarang = $request->pengarang;
            $buku = $buku->whereHas('pengarang_place', function ($findpengarang) use ($pengarang){
                $findpengarang->where('nama', 'like', '%'.$pengarang.'%');
            });
        }
        if($request->penyunting != null){
            $penyunting = $request->penyunting;
            $buku = $buku
                ->where('penyunting', '=', $penyunting)
                ->whereHas('pembimbing_place', function ($findpembimbing) use ($penyunting){
                    $findpembimbing->where('nama', 'like', '%'.$penyunting.'%');
                });

        }
        if($request->penerbit != null){
            $buku = $buku->where('penerbit', '=', $request->penerbit);
        }
        if($request->subjek != null){
            $subjek = $request->subjek;
            $buku = $buku
                ->whereHas('subjek_place', function ($findsubjek) use ($subjek){
                    $findsubjek->where('nama', 'like', '%'.$subjek.'%');
                });
        }

        $buku = $buku->paginate(20);

        return view('anggota.katalog', compact('pageTitle', 'buku', 'jenisbuku'));
    }

    // Admin
    public function searchCatalogAdmin(Request $request){
        $pageTitle = 'Catalog Buku | ELIT ITTelkom Surabaya';

        $find = $request->searchbuku;

        $catalog = M_Buku::with('subjek_place', 'pembimbing_place', 'pengarang_place', 'jenis_buku')
            ->where('judul', 'LIKE', '%'.$find.'%')
            ->orWhere('tahun_terbit', 'LIKE', '%'.$find.'%')
            ->orWhere('isbn', 'LIKE', '%'.$find.'%')
            ->orWhere('lokasi_buku', 'LIKE', '%'.$find.'%')
            ->orWhere('kode_buku', 'LIKE', '%'.$find.'%')
            ->orWhere('penerbit', 'LIKE', '%'.$find.'%')
            ->orWhereHas('subjek_place', function ($findsubjek) use ($find){
                $findsubjek->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pembimbing_place', function ($findpembimbing) use ($find){
                $findpembimbing->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pengarang_place', function ($findpengarang) use ($find){
                $findpengarang->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('jenis_buku', function ($findjenisbuku) use ($find){
                $findjenisbuku->where('nama', 'like', '%'.$find.'%');
            })
            ->paginate(15);

        return view('admin/catalog/index', [
            'pageTitle' => $pageTitle,
            'catalog' => $catalog
        ]);
    }

    public function searchJenisBukuAdmin(Request $request){
        $pageTitle = 'Jenis Buku | ELIT ITTelkom Surabaya';

        $find = $request->keyword;

        $jenisbuku = R_Jenis_Buku::where('nama', 'like', '%'.$find.'%')
            ->orWhere('kode_jenis_buku', 'like', '%'.$find.'%')
            ->paginate(15);

        return view('admin/jenisbuku/index', [
            'pageTitle' => $pageTitle,
            'jenisbuku' => $jenisbuku
        ]);
    }

    public function searchPenggunaAdmin(Request $request){
        $pageTitle = 'List User | ELIT ITTelkom Surabaya';

        $find = $request->keyword;

        $user = User::with('admin', 'anggota', 'anggota.jenis_keanggotaan')
            ->where('email', 'like', '%'.$find.'%')
            ->orWhereHas('anggota', function ($findanggota) use ($find){
                $findanggota->where('nama_lengkap', 'like', '%'.$find.'%');
                $findanggota->orWhere('prodi', 'like', '%'.$find.'%');
                $findanggota->orWhere('status', 'like', '%'.$find.'%');
                $findanggota->orWhere('fakultas', 'like', '%'.$find.'%');
                $findanggota->orWhere('verifikasi', 'like', '%'.$find.'%');
            })
            ->orWhereHas('admin', function ($findadmin) use ($find){
                $findadmin->where('nama_lengkap', 'like', '%'.$find.'%');
                $findadmin->orWhere('status', 'like', '%'.$find.'%');
            })
            ->orWhereHas('anggota.jenis_keanggotaan', function ($findadmin) use ($find){
                $findadmin->where('nama', '=', $find);
            })
            ->paginate(15);

        return view('admin/user/index', [
            'pageTitle' => $pageTitle,
            'user' => $user
        ]);
    }

    public function searchPeminjamanAdmin(Request $request){
        $pageTitle = 'Peminjaman | ELIT ITTelkom Surabaya';

        $find = $request->keyword;

        $booking = T_Peminjaman_Buku::with('eksemplar.buku', 'anggota.user')
            ->where('kode_booking', 'like', '%'.$find.'%')
            ->orWhere('nama_peminjam', 'like', '%'.$find.'%')
            ->orWhere('status', 'like', '%'.$find.'%')
            ->orWhereHas('eksemplar.buku', function ($findbuku) use ($find){
                $findbuku->where('judul', 'like', '%'.$find.'%');
            })
            ->orWhereHas('anggota.user', function ($findanggota) use ($find){
                $findanggota->where('email', 'like', '%'.$find.'%');
            })
            ->paginate(15);

        return view('admin/booking/index', [
            'pageTitle' => $pageTitle,
            'booking' => $booking
        ]);
    }

    public function searchDonasiAdmin(Request $request){
        $pageTitle = 'Donasi Buku | ELIT ITTelkom Surabaya';

        $find = $request->keyword;

        $donasi = T_Donasi_Buku::with('subjek_place', 'pembimbing_place', 'pengarang_place', 'jenis_buku', 'anggota')
            ->where('judul', 'LIKE', '%'.$find.'%')
            ->orWhere('penerbit', 'LIKE', '%'.$find.'%')
            ->orWhereHas('subjek_place', function ($findsubjek) use ($find){
                $findsubjek->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pembimbing_place', function ($findpembimbing) use ($find){
                $findpembimbing->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('pengarang_place', function ($findpengarang) use ($find){
                $findpengarang->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('jenis_buku', function ($findjenisbuku) use ($find){
                $findjenisbuku->where('nama', 'like', '%'.$find.'%');
            })
            ->orWhereHas('anggota', function ($findanggota) use ($find){
                $findanggota->where('nama_lengkap', 'like', '%'.$find.'%');
            })
            ->paginate(20);

        return view('admin/donasi/index', [
            'pageTitle' => $pageTitle,
            'donasi' => $donasi
        ]);
    }

}
