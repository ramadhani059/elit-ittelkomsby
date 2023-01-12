<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use App\Models\R_File;
use App\Models\T_Donasi_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class FilePdfController extends Controller
{
    public function getPdfViews($id){
        $catalog = M_Buku::find($id);

        foreach ($catalog->file as $filebuku) {
            if ($filebuku->file_place->name == 'File' && $filebuku->file_place->type == 'fullfile') {
                $folder = Str::of($catalog->judul)->slug();
                $file = public_path('storage/buku/'.$folder.'/'.$filebuku->encrypt_name);
                $filename = $catalog->judul;
            }
        }

        return Response::stream(function () use ($file){
            readfile($file);
        }, 200, [
            'content-Type' => 'application/pdf',
            'content-Disposition' => 'inline; filename='.$filename,
        ]);
    }

    public function getPdfViewsDonasi($id){
        $encrypt = R_File::where('original_name', $id)->first();
        $donasi = T_Donasi_Buku::where('id', $encrypt->id_donasi)->first();

        $filename = $encrypt->file_place->name;
        $folder = Str::of($donasi->judul)->slug();
        $file = public_path('storage/buku/'.$folder.'/'.$encrypt->encrypt_name);

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
            $folder = Str::of($data->buku->judul)->slug();
            $file_path = public_path('storage/buku/'.$folder.'/'.$data->encrypt_name);
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
}
