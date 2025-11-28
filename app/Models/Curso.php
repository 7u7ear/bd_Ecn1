<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nombre','nivel','anio'];

    // Relación muchos a muchos con materias
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'curso_materia');
    }

    // Relación con distribuciones de horas
    public function distribuciones()
    {
        return $this->hasMany(DistribucionHora::class);
    }
}
