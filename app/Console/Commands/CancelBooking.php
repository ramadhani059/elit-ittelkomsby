<?php

namespace App\Console\Commands;

use App\Models\M_Eksemplar;
use App\Models\T_Peminjaman_Buku;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CancelBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $idpeminjaman = [
            'tgl_kembali' => null,
            'status' => 'proses',
        ];

        $peminjaman = T_Peminjaman_Buku::where($idpeminjaman)->get();

        foreach ($peminjaman as $cancelbooking) {
            $checkeksemplar = M_Eksemplar::find($cancelbooking->id_eksemplar);
            $checkeksemplar->status = 'dapat dipinjam';
            $cancelbooking->tgl_kembali = Carbon::now();
            $cancelbooking->status = 'dibatalkan';
            $cancelbooking->save();
            $checkeksemplar->save();
        }
    }
}
