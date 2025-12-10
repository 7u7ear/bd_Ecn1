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
    Schema::create('docentes', function (Blueprint $table) {
        $table->id();
        $table->string('rrhh_id')->unique();
        $table->string('nombre');
        $table->string('apellido');
        $table->date('fechaNac'); // ahora es tipo date
        $table->string('dni')->unique();
        $table->string('cuil')->unique();
        $table->string('fichaCensal')->unique();
        $table->string('email')->nullable()->unique();
        $table->timestamps();
        $table->softDeletes(); // agrega columna deleted_at
    });
}

public function down(): void
{
    Schema::dropIfExists('docentes');
}
};
