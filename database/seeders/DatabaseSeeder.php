<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            JenisKeanggotaanSeeder::class,
            InstitusiSeeder::class,
            AdminSeeder::class,
            AnggotaSeeder::class,
            FakultasSeeder::class,
            JurusanSeeder::class,
            SirkulasiSeeder::class,
            KoleksiBukuSeeder::class,
            JenisBukuSeeder::class,
            FilePlaceSeeder::class,
        ]);
    }
}
