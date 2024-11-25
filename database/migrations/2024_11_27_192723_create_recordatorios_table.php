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
        Schema::create('recordatorios', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('tipo', 50); // Tipo del recordatorio
            $table->string('nombre', 50); // Nombre del recordatorio
            $table->string('ubicacion', 100); // Ubicación del recordatorio
            $table->date('fecha'); // Fecha del recordatorio
            $table->time('hora'); // Hora del recordatorio
            $table->text('descripcion'); // Descripción del recordatorio
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordatorios');
    }
};
