<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tramitacion extends Model
{
    use SoftDeletes;

    // 🔹 Tabla real (español)
    protected $table = 'tramitaciones';

    // 🔹 Campos editables
    protected $fillable = [
        'fecha',
        'estado',
        'cargo_docente_id',
        'codigo_tramite_id',
        'abm',
        'expediente',
        'causal_id',
        'observaciones',
    ];

    // 🔹 Casts
    protected $casts = [
        'fecha' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    /**
     * Movimiento de cargo (docente + cargo + rol)
     */
    public function cargoDocente()
{
    return $this->belongsTo(CargoDocente::class);
}

    /**
     * Código oficial de trámite (212P, etc.)
     */
    public function codigoTramite()
    {
        return $this->belongsTo(CodigoTramite::class);
    }

    /**
     * Causal (licencia, renuncia, etc.)
     */
    public function causal()
{
    return $this->belongsTo(Causal::class);
}
    /**
     * Historial de estados (activo, licencia, finalizado)
     */
    public function periodos()
    {
        return $this->hasMany(TramitacionPeriodo::class);
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS (opcional, pero útil)
    |--------------------------------------------------------------------------
    */

    /**
     * Estado actual según el último período
     */
    public function estadoActual()
    {
        return $this->periodos()
            ->orderByDesc('fecha_inicio')
            ->first();
    }

    /**
     * Saber si está cerrada
     */
    public function estaCerrada(): bool
    {
        return in_array($this->estado, ['realizado', 'a_la_guarda']);
    }
}
