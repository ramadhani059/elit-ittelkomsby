<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__jenis__bukus')->insert([
            [
                'id_koleksi' => 1,
                'Kode_jenis_buku' => 'TA',
                'nama' => 'Tugas Akhir (Skripsi)'
            ], [
                'id_koleksi' => 2,
                'Kode_jenis_buku' => 'NV',
                'nama' => 'Novel'
            ],
        ]);
    }
}
