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
                'name' => 'Lokasi Buku',
                'note' => null,
                'type' => 'text',
            ], [
                'id_jenisbuku' => 1,
                'name' => 'Judul Buku Inggris',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'name' => 'Program Studi',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'name' => 'Pembimbing',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 1,
                'name' => 'File',
                'note' => null,
                'type' => 'fullfile',
            ],

            // Novel
            [
                'id_jenisbuku' => 2,
                'name' => 'ISBN',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Lokasi Buku',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Anak Judul',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Edisi',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Program Studi',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Ilustrasi',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Dimensi Buku',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Penyunting',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Penerjemah',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'Penerbit',
                'note' => null,
                'type' => 'text',
            ],[
                'id_jenisbuku' => 2,
                'name' => 'File',
                'note' => null,
                'type' => 'fullfile',
            ],
        ]);
    }
}
