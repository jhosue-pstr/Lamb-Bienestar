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
        Schema::create('requisito_tipo_solicituds', function (Blueprint $table) {
            $table->boolean('es_obligatorio')->default(true);
            $table->string('notas', 255)->nullable();
            $table->primary(['requisito_id', 'tipo_solicitud_id']);//PARA EVITAR LA REPETICION
            $table->unsignedBigInteger('requisito_id');
            $table->foreign('requisito_id')->references('id')->on('tipo_requisitos')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_solicitud_id');
            $table->foreign('tipo_solicitud_id')->references('id')->on('tipo_solicituds')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisito_tipo_solicituds');
    }
};
