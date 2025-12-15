<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        Docente::create([
    'rrhh_id'      => 'RRHH-001',
    'nombre'       => 'Juan',
    'apellido'     => 'Pérez',
    'fechaNac'     => '1985-06-15',
    'dni'          => '30111222',
    'cuil'         => '20-30111222-3',
    'fichaCensal'  => 'FC-001',
    'email'        => 'juan.perez@example.com',
    'telefono'     => '1122334455',
]);

Docente::create([
    'rrhh_id'      => 'RRHH-002',
    'nombre'       => 'María',
    'apellido'     => 'Gómez',
    'fechaNac'     => '1990-09-22',
    'dni'          => '31222333',
    'cuil'         => '27-31222333-4',
    'fichaCensal'  => 'FC-002',
    'email'        => 'maria.gomez@example.com',
    'telefono'     => '1133445566',
]);

    }
}
