<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('codigo_tramites', function (Blueprint $table) {
            $table->id();

            // Código oficial del trámite (ej: 212P)
            $table->string('codigo')->unique();

            // Descripción del trámite (ej: Alta Titular)
            $table->string('descripcion_tramite');

            // Permite desactivar códigos viejos
            $table->boolean('activo')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('codigo_tramites');
    }
};
