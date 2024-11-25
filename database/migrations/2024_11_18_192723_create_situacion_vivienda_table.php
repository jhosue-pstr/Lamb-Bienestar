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
        Schema::create('situacion_vivienda', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('departamento', 50);
            $table->string('provincia', 50);
            $table->string('distrito', 50);
            $table->string('direccion', 100);
            $table->string('referencia', 100);
            $table->string('tenenciaDomicilio', 50);
            $table->string('servicioComplementarioBienes', 50);
            $table->string('tipoVivienda', 50);
            $table->string('materialConstruccion', 50);
            $table->string('servicioBasico', 50);
            $table->string('servicioComplementario', 50);
            $table->integer('numeroPisos');
            $table->integer('numeroHabitaciones');
            $table->string('areaResidencia', 50);
            $table->string('bienes', 50);
            $table->string('vehiculo', 255)->nullable()->comment('URL o referencia al archivo del vehículo');
            $table->string('modelo', 50)->nullable();
            $table->integer('año')->nullable();
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('situacion_vivienda');
    }
};
