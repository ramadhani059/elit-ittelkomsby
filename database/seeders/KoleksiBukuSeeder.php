<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KoleksiBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__koleksi__bukus')->insert([
            [
                'nama' => 'Karya Referensi',
            ], [
                'nama' => 'Koleksi Umum',
            ],
        ]);
    }
}
