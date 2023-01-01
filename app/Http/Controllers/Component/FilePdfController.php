<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\M_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FilePdfController extends Controller
{
    public function getPdfViews($id){
        $catalog = M_Buku::find($id);

        foreach ($catalog->file as $filebuku) {
            if ($filebuku->file_place->name == 'File' && $filebuku->file_place->type == 'fullfile') {
                $file = public_path('storage/buku/'.$catalog->judul.'/'.$filebuku->encrypt_name);
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
}
