<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tramitacion extends Model
{
    use HasFactory, SoftDeletes; // opcional, si querés poder restaurar trámites eliminados

    // Forzar el nombre correcto de la tabla (evita "tramitacions")
    protected $table = 'tramitaciones';

    protected $fillable = [
        'expediente',
        'fecha',
        'abm',
        'cargo_id',
        'docente_id',
        'tramite',
        'anio',
        'division',
        'turno',
        'observaciones',
        'estado'
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
}
