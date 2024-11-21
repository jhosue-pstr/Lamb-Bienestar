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
        Schema::create('analisis_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id'); // Relación con la tabla documentos
            $table->unsignedBigInteger('usuario_id'); // Relación con la tabla usuarios
            $table->unsignedBigInteger('estado_id');
            $table->text('comentarios')->nullable(); // Comentarios del análisis
            $table->timestamp('fecha_analisis')->nullable(); // Fecha del análisis
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_documentos');
    }
};
