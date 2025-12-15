<?php

namespace Database\Seeders;

use App\Models\Tramitacion;
use App\Models\TramitacionPeriodo;
use App\Models\CargoDocente;
use App\Models\CodigoTramite;
use Illuminate\Database\Seeder;

class TramitacionSeeder extends Seeder
{
    public function run(): void
    {
        $tramitacion = Tramitacion::create([
            'fecha' => now()->subMonth(),
            'estado' => 'en_tramitacion',
            'cargo_docente_id' => CargoDocente::first()->id,
            'codigo_tramite_id' => CodigoTramite::where('codigo', '212P')->first()->id,
            'abm' => 'alta',
            'expediente' => 'EX-2025-0001',
            'observaciones' => 'Tramitación de prueba',
        ]);

        TramitacionPeriodo::create([
            'tramitacion_id' => $tramitacion->id,
            'estado' => 'activo',
            'fecha_inicio' => $tramitacion->fecha,
            'observaciones' => 'Inicio',
        ]);
    }
}
