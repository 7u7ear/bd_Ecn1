<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Cargo;
use App\Models\Tramitacion;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Crear curso
        $curso = Curso::create([
            'nombre' => '1º Año',
            'nivel' => 'Secundario',
            'anio' => 2025
        ]);

        // Crear materia
        $materia = Materia::create([
            'nombre' => 'Matemática',
            'curso_id' => $curso->id
        ]);

        // Crear docente
        $docente = Docente::create([
            'rrhh_id' => 'RRHH-001',
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'dni' => '30111222',
            'email' => 'juan.perez@example.com'
        ]);

        // Crear cargo
        $cargo = Cargo::create([
            'docente_id' => $docente->id,
            'numero_puesto' => 'PU-001',
            'rol' => 1,
            'materia_id' => $materia->id,
            'total_horas' => 20
        ]);

        // Crear tramitación
        Tramitacion::create([
            'expediente' => 'EXP-2025-001',
            'fecha' => now(),
            'abm' => 'alta',
            'cargo_id' => $cargo->id,
            'docente_id' => $docente->id,
            'tramite' => 'Alta de cargo',
            'anio' => '2025',
            'division' => 'A',
            'turno' => 'Mañana',
            'estado' => 'en_tramitacion'
        ]);
    }
}
