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
    Schema::create('atenciones', function (Blueprint $table) {
        $table->id();
        $table->string('motivo_atencion');
        $table->string('tipo');
        $table->string('resposable');
        $table->date('fecha_atencion')->default(now());
        $table->string('numero_derivaciones')->default('0');
        $table->string('descripcion_motivo')->default('N/A');
        $table->string('observaciones')->default('N/A');
        $table->string('seguimiento_de_caso')->default('N/A');  // Cambiado a snake_case
        $table->string('estado')->default('pendiente');
        $table->boolean('ingreso')->default(true);
        $table->string('otros_datos')->default('N/A');  // Cambiado a snake_case
        $table->unsignedBigInteger('estudiante_id');
        $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones');
    }
};
