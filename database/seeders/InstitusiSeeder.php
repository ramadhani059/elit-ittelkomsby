<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__institusis')->insert([
            [
                'nama' => 'PT Telekomunikasi Indonesia',
                'tipe_institusi' => 1,
            ], [
                'nama' => 'Institut Telknologi Sepuluh November',
                'tipe_institusi' => 4,
            ], [
                'nama' => 'Universitas Terbuka',
                'tipe_institusi' => 1,
            ], [
                'nama' => 'Institut Teknologi Bandung',
                'tipe_institusi' => 4,
            ], [
                'nama' => 'Telkom University',
                'tipe_institusi' => 2,
            ], [
                'nama' => 'ITTelkom Purwokerto',
                'tipe_institusi' => 2,
            ], [
                'nama' => 'ITTelkom Jakarta',
                'tipe_institusi' => 2,
            ],
        ]);
    }
}
