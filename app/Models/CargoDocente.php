<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoDocente extends Model
{
    use SoftDeletes;

    protected $table = 'cargo_docente';

    protected $fillable = [
        'cargo_id',
        'docente_id',
        'rol',
        'situacion_revista',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    // 🔗 Relaciones

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function tramitaciones()
    {
        return $this->hasMany(Tramitacion::class);
    }
}
