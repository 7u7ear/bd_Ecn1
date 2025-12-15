<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DocenteSeeder::class,
            CargoSeeder::class,
            CargoDocenteSeeder::class,
            CodigoTramiteSeeder::class,
            CausalSeeder::class,
            TramitacionSeeder::class,
        ]);
    }
}
