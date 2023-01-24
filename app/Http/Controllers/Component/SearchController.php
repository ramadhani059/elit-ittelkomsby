<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File_Place;
use App\Models\R_Jenis_Buku;
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
}
