<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodigoTramite extends Model
{
    use SoftDeletes;

    protected $table = 'codigo_tramites';

    protected $fillable = [
        'codigo',
        'descripcion_tramite',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // 🔗 Relaciones
    public function tramitaciones()
    {
        return $this->hasMany(Tramitacion::class);
    }
}
