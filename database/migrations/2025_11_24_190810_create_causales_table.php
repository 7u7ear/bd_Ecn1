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
    Schema::create('causales', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');                // licencia, enfermedad, reemplazo...
        $table->text('descripcion')->nullable(); // opcional
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('causales');
}
};
