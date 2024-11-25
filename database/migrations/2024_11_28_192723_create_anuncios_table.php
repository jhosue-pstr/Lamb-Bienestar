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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('nombre', 50); // Nombre del anuncio
            $table->string('ubicacion', 100); // Ubicación del anuncio
            $table->date('fecha'); // Fecha del anuncio
            $table->time('hora'); // Hora del anuncio
            $table->text('descripcion'); // Descripción del anuncio
            $table->string('afiche', 255)->nullable()->comment('URL del afiche'); // Afiche del anuncio (URL)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
