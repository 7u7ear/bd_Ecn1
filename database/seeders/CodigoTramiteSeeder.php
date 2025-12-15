<?php

namespace Database\Seeders;

use App\Models\CodigoTramite;
use Illuminate\Database\Seeder;

class CodigoTramiteSeeder extends Seeder
{
    public function run(): void
    {
        CodigoTramite::create([
            'codigo' => '212P',
            'descripcion_tramite' => 'Alta Titular',
            'activo' => true,
        ]);

        CodigoTramite::create([
            'codigo' => '215L',
            'descripcion_tramite' => 'Licencia Médica',
            'activo' => true,
        ]);
    }
}
