<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'numero_puesto',
        'total_horas',
        'estado'
    ];

    public function cargosDocentes()
    {
        return $this->hasMany(CargoDocente::class);
    }
}
