<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        Cargo::create([
            'numero_puesto' => 'TP3',
            'descripcion'   => 'Taller Producción 3',
        ]);
    }
}
