<?php

namespace Database\Seeders;

use App\Models\CargoDocente;
use App\Models\Docente;
use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoDocenteSeeder extends Seeder
{
    public function run(): void
    {
        CargoDocente::create([
            'cargo_id' => Cargo::first()->id,
            'docente_id' => Docente::first()->id,
            'rol' => 1,
            'situacion_revista' => 'titular',
            'fecha_inicio' => now()->subMonths(2),
            'estado' => 'activo',
        ]);
    }
}

