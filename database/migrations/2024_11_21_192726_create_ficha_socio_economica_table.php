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
        Schema::create('ficha_socio_economica', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria

            // Relación con economia_familiar
            $table->unsignedBigInteger('idEconomiaFamiliar');
            $table->foreign('idEconomiaFamiliar')->references('id')->on('economia_familiar')->onDelete('cascade');

            // Relación con situacion_vivienda (Especificando el nombre de la tabla manualmente)
            $table->unsignedBigInteger('idSituacionVivienda');
            $table->foreign('idSituacionVivienda')->references('id')->on('situacion_vivienda')->onDelete('cascade');

            // Relación con situacion_salud (Asegúrate que la tabla 'situacion_salud' exista)
            $table->unsignedBigInteger('idSituacionSalud');
            $table->foreign('idSituacionSalud')->references('id')->on('situacion_salud')->onDelete('cascade');

            // Relación con estudiantes
            $table->unsignedBigInteger('idEstudiante');
            $table->foreign('idEstudiante')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_socio_economica');
    }
};
