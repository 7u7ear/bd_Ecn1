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
    Schema::create('autorizados', function (Blueprint $table) {
        $table->id();
        $table->string('apellido');
        $table->string('nombre');
        $table->string('dni')->unique();
        $table->string('telefono')->nullable();
        $table->string('vinculo'); // Ej: Tío, Amigo de la familia
        $table->unsignedBigInteger('alumno_id');
        $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizados');
    }
};
