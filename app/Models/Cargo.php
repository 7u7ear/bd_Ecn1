<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cargo extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = [
        'docente_id',
        'numero_puesto',
        'rol',
        'materia_id',
        'total_horas',
        'estado' // opcional, si lo agregás para marcar activo/inactivo
    ];

    // Relación con docente
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    // Relación con materia
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    // Relación con distribuciones de horas
    public function distribuciones()
    {
        return $this->hasMany(DistribucionHora::class);
    }

    // Relación con tramitaciones
    public function tramitaciones()
    {
        return $this->hasMany(Tramitacion::class);
    }

    // Relación con situaciones de revista
    public function situacionesRevista()
    {
        return $this->hasMany(SituacionRevista::class);
    }
}
