<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'curso_id'
    ];

    // Relación con cargos (una materia puede tener varios cargos asignados)
    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }

    // Relación directa con curso (cada materia pertenece a un curso)
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relación muchos a muchos con cursos (tabla intermedia curso_materia)
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_materia');
    }
}
