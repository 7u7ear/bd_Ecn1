<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionRevista extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'cargo_id',
        'docente_id',
        'causal_id',
        'tipo',          // Ejemplo: titular, suplente, interino
        'fecha_inicio',
        'fecha_fin',
        'observaciones'
    ];

    // Relación con cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    // Relación con docente
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    // Relación con causal
    public function causal()
    {
        return $this->belongsTo(Causal::class);
    }
}
