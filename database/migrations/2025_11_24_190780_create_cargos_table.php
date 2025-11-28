<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();

            // Relación con docentes
            $table->foreignId('docente_id')->constrained('docentes');

            // Número de puesto oficial
            $table->string('numero_puesto')->unique();

            // Rol oficial asignado por GCBA (ej: 1, 2, 3...)
            $table->unsignedBigInteger('rol');

            // Relación con materias
            $table->foreignId('materia_id')->constrained('materias');

            // Total de horas asignadas al cargo
            $table->integer('total_horas');

            $table->timestamps();

            $table->softDeletes(); // <-- agrega columna deleted_at


            // Evita que un mismo docente tenga dos cargos con el mismo rol
            $table->unique(['docente_id', 'rol']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
