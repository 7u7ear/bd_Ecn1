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
        Schema::create('situaciones_revista', function (Blueprint $table) {
    $table->id();
    $table->foreignId('cargo_id')->constrained('cargos');
    $table->foreignId('docente_id')->constrained('docentes');
    $table->enum('tipo', ['titular', 'interino', 'suplente']);
    $table->foreignId('causal_id')->constrained('causales');
    $table->date('fecha_inicio');
    $table->date('fecha_fin')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('situaciones_revista');
    }
};
