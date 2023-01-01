<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m__prodis')->insert([
            [
                'id_fakultas' => 1,
                'kode_prodi' => 'SI',
                'nama' => 'S1 Sistem Informasi',
            ], [
                'id_fakultas' => 1,
                'kode_prodi' => 'TI',
                'nama' => 'S1 Teknologi Informasi',
            ], [
                'id_fakultas' => 1,
                'kode_prodi' => 'IF',
                'nama' => 'S1 Informatika',
            ], [
                'id_fakultas' => 1,
                'kode_prodi' => 'SD',
                'nama' => 'S1 Sains Data',
            ], [
                'id_fakultas' => 1,
                'kode_prodi' => 'RPL',
                'nama' => 'S1 Rekayasa Perangkat Lunak',
            ], [
                'id_fakultas' => 1,
                'kode_prodi' => 'BD',
                'nama' => 'S1 Bisnis Digital',
            ], [
                'id_fakultas' => 2,
                'kode_prodi' => 'TT',
                'nama' => 'S1 Tenik Telekomunikasi',
            ], [
                'id_fakultas' => 2,
                'kode_prodi' => 'TK',
                'nama' => 'S1 Tenik Komputer',
            ], [
                'id_fakultas' => 2,
                'kode_prodi' => 'TE',
                'nama' => 'S1 Tenik Elektro',
            ], [
                'id_fakultas' => 2,
                'kode_prodi' => 'TI',
                'nama' => 'S1 Tenik Industri',
            ], [
                'id_fakultas' => 2,
                'kode_prodi' => 'TL',
                'nama' => 'S1 Tenik Logistik',
            ],
        ]);
    }
}
