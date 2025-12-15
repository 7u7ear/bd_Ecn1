<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('tramitaciones', function (Blueprint $table) {
    $table->id();

    // Fecha del trámite
    $table->date('fecha');

    // Estado administrativo general
    $table->enum('estado', [
        'urgente',
        'realizado',
        'en_tramitacion',
        'espera_documentacion',
        'caratulado',
        'a_la_guarda'
    ])->default('en_tramitacion');

    // 👉 Movimiento real del cargo
    $table->foreignId('cargo_docente_id')
          ->constrained('cargo_docente');

    // Tipo de trámite
    $table->enum('abm', ['alta', 'baja', 'modificacion']);

    // Datos administrativos
    $table->string('expediente')->unique();
    $table->foreignId('codigo_tramite_id')->constrained('codigo_tramites');


    $table->foreignId('causal_id')->nullable()->constrained('causales');

    $table->text('observaciones')->nullable();

    $table->timestamps();
    $table->softDeletes();
});


}
    public function down(): void
    {
        Schema::dropIfExists('tramitaciones');
    }
};
