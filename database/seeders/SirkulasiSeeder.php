<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SirkulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__sirkulasis')->insert([
            [
                'nama' => 'Non Sirkulasi',
                'biaya_sewa' => 0,
                'denda_harian' => 0,
            ],
        ]);
    }
}
