<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tipo_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200); // Nombre
            $table->text('descripcion'); // Descripción
            $table->unsignedBigInteger('idFichaSocioEconomica');
            $table->foreign('idFichaSocioEconomica')->references('id')->on('ficha_socio_economica')->onDelete('cascade');

            // Nuevas columnas
            $table->string('plantilla_pdf')->nullable(); // Columna para el PDF de plantilla
            $table->string('pdf_requisito')->nullable(); // Columna para el PDF del alumno

            $table->timestamps();
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
