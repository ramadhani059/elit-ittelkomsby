<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilePlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__file__places')->insert([
            // TA
            [
                'id_jenisbuku' => 1,
                'nama' => 'Lokasi Buku',
                'catatan' => null,
                'tipe' => 'text',
            ], [
                'id_jenisbuku' => 1,
                'nama' => 'Judul Buku Inggris',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'nama' => 'Program Studi',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'nama' => 'Pembimbing',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'nama' => 'File',
                'catatan' => null,
                'tipe' => 'fullfile',
            ],

            // Novel
            [
                'id_jenisbuku' => 2,
                'nama' => 'ISBN',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Lokasi Buku',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Anak Judul',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Edisi',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Program Studi',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Ilustrasi',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Dimensi Buku',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Penyunting',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Penerjemah',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'Penerbit',
                'catatan' => null,
                'tipe' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'nama' => 'File',
                'catatan' => null,
                'tipe' => 'fullfile',
            ],
        ]);
    }
}
