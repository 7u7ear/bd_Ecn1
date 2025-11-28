<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'direccion',
        'email'
    ];

    public function familiares()
    {
        return $this->hasMany(Familiar::class);
    }

    public function autorizados()
    {
        return $this->hasMany(Autorizado::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function materiasAdeudadas()
    {
        return $this->hasMany(MateriaAdeudada::class);
    }
}
