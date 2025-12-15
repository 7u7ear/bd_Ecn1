<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TramitacionPeriodo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tramitacion_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'observaciones',
    ];

    public function tramitacion()
    {
        return $this->belongsTo(Tramitacion::class);
    }
}
