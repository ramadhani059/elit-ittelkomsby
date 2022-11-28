<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKeanggotaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r__jenis__keanggotaans')->insert([
            [
                'nama' => 'Umum',
                'role_ktp' => true,
                'role_karpeg_ktm' => true,
                'role_ijazah' => false,
                'role_download' => false,
                'role_baca' => true,
                'role_booking' => false,
                'role_institusi' => true,
                'role_add_institusi' => true,
                'role_user' => false,
                'batas_booking' => 0,
                'jumlah_pinjam' => 0,
            ], [
                'nama' => 'Mahasiswa',
                'role_ktp' => false,
                'role_karpeg_ktm' => true,
                'role_ijazah' => false,
                'role_download' => true,
                'role_baca' => true,
                'role_booking' => true,
                'role_institusi' => false,
                'role_add_institusi' => false,
                'role_user' => true,
                'batas_booking' => 7,
                'jumlah_pinjam' => 3,
            ], [
                'nama' => 'Alumni ITTelkom Surabaya',
                'role_ktp' => true,
                'role_karpeg_ktm' => false,
                'role_ijazah' => true,
                'role_download' => true,
                'role_baca' => true,
                'role_booking' => true,
                'role_institusi' => false,
                'role_add_institusi' => false,
                'role_user' => true,
                'batas_booking' => 7,
                'jumlah_pinjam' => 3,
            ], [
                'nama' => 'Dosen',
                'role_ktp' => false,
                'role_karpeg_ktm' => true,
                'role_ijazah' => false,
                'role_download' => true,
                'role_baca' => true,
                'role_booking' => true,
                'role_institusi' => false,
                'role_add_institusi' => false,
                'role_user' => false,
                'batas_booking' => 14,
                'jumlah_pinjam' => 5,
            ], [
                'nama' => 'Tenaga Pendukung Akademik',
                'role_ktp' => true,
                'role_karpeg_ktm' => true,
                'role_ijazah' => false,
                'role_download' => true,
                'role_baca' => true,
                'role_booking' => true,
                'role_institusi' => false,
                'role_add_institusi' => false,
                'role_user' => false,
                'batas_booking' => 7,
                'jumlah_pinjam' => 3,
            ]
        ]);
    }
}
