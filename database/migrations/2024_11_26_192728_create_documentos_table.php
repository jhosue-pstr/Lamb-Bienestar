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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEstudiante')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('idFichaSocioEconomica')->constrained('ficha_socio_economica')->onDelete('cascade');
            $table->foreignId('idSolicitud')->constrained('solicitudes')->onDelete('cascade');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
