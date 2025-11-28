<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('curso_id');
            $table->integer('anio_lectivo'); // Ej: 2025
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->cascadeOnDelete();
            $table->foreign('curso_id')->references('id')->on('cursos')->cascadeOnDelete();

            // Evita duplicados: un alumno no puede inscribirse dos veces al mismo curso en el mismo año
            $table->unique(['alumno_id','curso_id','anio_lectivo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
