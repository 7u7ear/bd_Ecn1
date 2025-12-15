<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Causal extends Model
{
    use SoftDeletes;

    protected $table = 'causales'; // 👈 CLAVE

    protected $fillable = [
        'nombre',
    ];

    // Relaciones
    public function tramitaciones()
    {
        return $this->hasMany(Tramitacion::class);
    }
}

