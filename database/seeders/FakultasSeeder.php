<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m__fakultas')->insert([
            [
                'kode_fakultas' => 'FTIB',
                'nama' => 'Fakultas Teknologi Informasi dan Bisnis',
            ], [
                'kode_fakultas' => 'FTEIC',
                'nama' => 'Fakultas Teknologi Elektro dan Industri Cerdas',
            ]
        ]);
    }
}
