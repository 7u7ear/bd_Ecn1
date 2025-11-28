<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rrhh_id',
        'nombre',
        'apellido',
        'dni',
        'email'
    ];

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }

    public function tramitaciones()
    {
        return $this->hasMany(Tramitacion::class);
    }

    public function situacionesRevista()
    {
        return $this->hasMany(SituacionRevista::class);
    }
}
