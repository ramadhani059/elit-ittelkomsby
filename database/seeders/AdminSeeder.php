<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m__admins')->insert([
            [
                'id_user' => 2,
                'nama_lengkap' => 'Admin Utama',
                'no_hp' => '085815554360',
                'alamat' => 'Jl Wagir Baru II no F4',
                'status' => 'Active',
            ],
        ]);
    }
}
