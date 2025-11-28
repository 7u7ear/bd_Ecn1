<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $fillable = ['nombre','apellido','dni','telefono','email','alumno_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
