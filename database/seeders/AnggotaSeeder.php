<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m__anggotas')->insert([
            [
                'id_user' => 1,
                'id_jenis_keanggotaan' => 2,
                'id_institusi' => 7,
                'nama_lengkap' => 'Pratama Ramadhani Wijaya',
                'no_hp' => '085815554360',
                'alamat' => 'Jl Manyar Tegal 1-A Surabaya',
                'prodi' => 'S1 Sistem Informasi',
                'fakultas' => 'Fakultas Teknologi Informasi dan Bisnis',
                'status' => 'Active',
                'verifikasi' => 'Belum Terverifikasi',
            ],
        ]);
    }
}
