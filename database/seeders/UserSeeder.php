<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'pratamaramadhani059@gmail.com',
                'nama_lengkap' => 'Pratama Ramadhani Wijaya',
                'password' => Hash::make('12345678'),
                'level' => 'anggota',
            ], [
                'email' => 'admin@gmail.com',
                'nama_lengkap' => 'Admin Utama',
                'password' => Hash::make('12345678'),
                'level' => 'admin',
            ]
        ]);
    }
}
