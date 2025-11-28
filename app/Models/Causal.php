<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causal extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',        // Ejemplo: "Licencia", "Enfermedad", "Reemplazo"
        'descripcion'    // Texto más detallado del motivo
    ];

    // Relación con situaciones de revista
    public function situacionesRevista()
    {
        return $this->hasMany(SituacionRevista::class);
    }
}
