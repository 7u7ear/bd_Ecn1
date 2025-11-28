<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tramitaciones', function (Blueprint $table) {
            $table->id();

            // Número de expediente oficial
            $table->string('expediente')->unique();

            // Fecha del movimiento
            $table->date('fecha');

            // Tipo de movimiento: Alta, Baja, Modificación
            $table->enum('abm', ['alta', 'baja', 'modificacion']);

            // Relación con cargo
            $table->foreignId('cargo_id')->constrained('cargos');

            // Relación con docente
            $table->foreignId('docente_id')->constrained('docentes');

            // Detalle del trámite
            $table->string('tramite');
            $table->string('anio');
            $table->string('division');
            $table->string('turno');

            // Observaciones
            $table->text('observaciones')->nullable();

            // Estado del trámite
            $table->enum('estado', [
                'urgente',
                'realizado',
                'en_tramitacion',
                'listo',
                'espera_documentacion',
                'caratulado',
                'a_la_guarda'
            ])->default('en_tramitacion');

            $table->timestamps();
            $table->softDeletes(); // opcional, si querés mantener historial de trámites eliminados

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tramitaciones');
    }
};
