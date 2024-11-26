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
    Schema::create('solicitudes', function (Blueprint $table) {
        $table->id();
        $table->string('tipo', 50);
        $table->foreignId('idEstudiante')->constrained('estudiantes')->onDelete('cascade');
        $table->foreignId('idBeca')->constrained('becas')->onDelete('cascade');
        $table->foreignId('idAlimentoBeca')->constrained('alimento_becas')->onDelete('cascade');
        $table->string('semestre', 20); // Agregar campo semestre
        $table->string('Plan', 100); // Agregar campo programa
        $table->string('plan_programa', 100); // Agregar campo programa
        $table->string('estado', 50); // Agregar campo estado
        $table->timestamps(); // created_at, updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
