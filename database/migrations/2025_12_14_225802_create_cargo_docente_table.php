<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cargo_docente', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('docente_id')->constrained('docentes');

            // Rol del docente (histórico GCBA)
            $table->unsignedBigInteger('rol');

            // Situación de revista
            $table->enum('situacion_revista', ['titular', 'interino', 'suplente']);

            // Fechas
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();

            // Estado actual del cargo
            $table->enum('estado', ['activo', 'licencia', 'finalizado'])
                  ->default('activo');

            $table->timestamps();
            $table->softDeletes();

            // Un docente no puede repetir el mismo rol
            $table->unique(['docente_id', 'rol']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargo_docente');
    }
};
