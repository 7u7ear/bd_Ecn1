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
        Schema::create('materias_adeudadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('materia_id');
            $table->string('estado'); // adeudada, regularizada, etc.
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->cascadeOnDelete();
            $table->foreign('materia_id')->references('id')->on('materias')->cascadeOnDelete();
            $table->unique(['alumno_id','materia_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias_adeudadas');
    }
};
