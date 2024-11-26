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
        Schema::create('familiares', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('estadoCivil', 50);
            $table->string('gradoInstruccion', 50);
            $table->string('ocupacion', 50);
            $table->integer('edad');
            $table->string('correo', 50);
            $table->string('direccion', 100);
            $table->string('telefono', 20);
            $table->string('parentesco', 50);
            $table->string('enfermedad', 50)->nullable(); // enfermedad opcional
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
