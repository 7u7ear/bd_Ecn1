<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autorizado extends Model
{
    protected $fillable = ['nombre','apellido','dni','telefono','alumno_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
