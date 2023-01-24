<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File;
use App\Models\T_Donasi_Buku;
use App\Models\T_Peminjaman_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class FilePdfController extends Controller
{
    public function getPdfViews($id, $originalname){
        $encrypt = R_File::where([
            'id_buku' => $id,
            'original_name' => $originalname,
        ])->first();
        $buku = M_Buku::where('id', $encrypt->id_buku)->first();

        foreach ($buku->file as $filebuku) {
            if ($filebuku->file_place->type == 'fullfile') {
                $file = public_path('storage/'.$encrypt->location_path.$encrypt->encrypt_name);
                $filename = $encrypt->file_place->name;
            }
        }

        return Response::stream(function () use ($file){
            readfile($file);
        }, 200, [
            'content-Type' => 'application/pdf',
            'content-Disposition' => 'inline; filename='.$filename,
        ]);
    }

    public function getPdfViewsDonasi($id, $originalname){
        $encrypt = R_File::where([
            'id_donasi' => $id,
            'original_name' => $originalname,
        ])->first();
        $donasi = T_Donasi_Buku::where('id', $encrypt->id_donasi)->first();

        $filename = $encrypt->file_place->name;
        $file = public_path('storage/'.$encrypt->location_path.$encrypt->encrypt_name);

        return Response::stream(function () use ($file){
            readfile($file);
        }, 200, [
            'content-Type' => 'application/pdf',
            'content-Disposition' => 'inline; filename='.$filename.' | '.$donasi->judul,
        ]);
    }

    public function downloadFile($filename){
        $file = R_File::where('original_name', $filename)->get();

        foreach($file as $data){
            // Check if file exists in app/storage/file folder
            $file_path = public_path('storage/'.$data->location_path.$data->encrypt_name);
            if (file_exists($file_path))
            {
                // Send Download
                return Response::download($file_path, $data->file_place->name.'.pdf', [
                    'Content-Length: '. filesize($file_path)
                ]);

            }
            else
            {
                // Error
                Alert::error('Requested File Does Not Exist On Our Server!');
            }
        }
    }

    public function fileSerahTerima($id){
        $donasi = T_Donasi_Buku::find($id);
        $statuspeminjaman = T_Peminjaman_Buku::where([
            'id_anggota' => $donasi->id_anggota,
            'status' => 'dipinjam',
        ])->get();
        $hari = Carbon::today()->format('l');
        $tanggal = Carbon::now()->format('d F');
        $tahun = Carbon::now()->format('Y');
        $tanggallengkap = Carbon::now()->format('d F Y');
        $logo = public_path('assets/img/icons/logo/logo-ITTS.png');
        $footer = public_path('assets/img/icons/logo/footer-pdf.png');
        $pdf = PDF::loadView('file.filepdf.serahterima', compact('donasi', 'hari', 'tanggal', 'tahun', 'tanggallengkap', 'logo', 'footer', 'statuspeminjaman'));

        return $pdf->stream();
    }
}
