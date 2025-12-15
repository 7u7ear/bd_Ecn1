<?php

namespace Database\Seeders;

use App\Models\Causal;
use Illuminate\Database\Seeder;

class CausalSeeder extends Seeder
{
    public function run(): void
    {
        Causal::create(['nombre' => 'Licencia médica']);
        Causal::create(['nombre' => 'Renuncia']);
    }
}

