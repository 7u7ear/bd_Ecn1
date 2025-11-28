<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistribucionHora extends Model
{
    protected $fillable = [
        'cargo_id',
        'curso_id',
        'cantidad_horas',
        'tipo',
        'dia',
        'hora_ingreso',
        'hora_egreso'
    ];

    // Relación con cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    // Relación con curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
