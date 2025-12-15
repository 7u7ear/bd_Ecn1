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
        Schema::create('tramitacion_periodos', function (Blueprint $table) {
    $table->id();

    $table->foreignId('tramitacion_id')
          ->constrained()
          ->onDelete('cascade');

    $table->date('fecha_inicio');
    $table->date('fecha_fin')->nullable();

    $table->enum('estado', [
        'activo',
        'licencia',
        'finalizado'
    ]);

    $table->text('observaciones')->nullable();

    $table->timestamps();
    $table->softDeletes();
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramitacion_periodos');
    }
};
