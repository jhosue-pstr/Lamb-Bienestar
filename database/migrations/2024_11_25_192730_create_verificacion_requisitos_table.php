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
        Schema::create('verificacion_requisitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idSolicitud');
            $table->foreign('idSolicitud')->references('id')->on('solicitudes')->onDelete('cascade'); // Asegúrate de que el nombre de la tabla y columna sea correcto
            $table->unsignedBigInteger('idRequisito');
            $table->foreign('idRequisito')->references('id')->on('tipo_requisitos')->onDelete('cascade'); // Asegúrate de que el nombre de la tabla y columna sea correcto
            $table->boolean('cumplido');
            $table->text('observaciones')->nullable();
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_requisitos');
    }
};
