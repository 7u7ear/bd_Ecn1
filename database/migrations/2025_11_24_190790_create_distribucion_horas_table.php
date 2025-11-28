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
        Schema::create('distribucion_horas', function (Blueprint $table) {
            $table->id();

            // Relación con el cargo (desde aquí se obtiene numero_puesto y rol)
            $table->foreignId('cargo_id')->constrained('cargos');

            // Relación con el curso
            $table->foreignId('curso_id')->constrained('cursos');

            // Cantidad de horas asignadas
            $table->integer('cantidad_horas');

            // Tipo de actividad (frente a curso, extra clase, etc.)
            $table->string('tipo');

            // Día de la semana (ej: lunes, martes...)
            $table->string('dia');

            // Horarios de ingreso y egreso
            $table->time('hora_ingreso');
            $table->time('hora_egreso');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribucion_horas');
    }
};
