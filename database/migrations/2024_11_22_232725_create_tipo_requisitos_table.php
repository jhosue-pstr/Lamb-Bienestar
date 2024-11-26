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
        Schema::create('tipo_requisitos', function (Blueprint $table) {
            $table->id(); // La columna id como clave primaria
            $table->string('nombre', 200); // Nombre
            $table->text('descripcion'); // Descripción
            $table->unsignedBigInteger('idFichaSocioEconomica'); // Clave foránea a 'ficha_socio_economica'
            $table->foreign('idFichaSocioEconomica')
                  ->references('id')->on('ficha_socio_economica')
                  ->onDelete('cascade'); // Relación con 'ficha_socio_economica'
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_requisitos');
    }
};
