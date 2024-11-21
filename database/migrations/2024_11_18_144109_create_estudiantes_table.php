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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');
            $table->string('direccion');
            $table->integer('codigo');
            $table->boolean('sexo');
            $table->string('facultad');
            $table->string('escuela');
            $table->string('telefono');
            $table->integer('DNI');
            $table->string('ciclo');
            $table->string('correo');
            $table->string('estado civil');
            $table->date('fecha de nacimiento');
            $table->boolean('domicilio');
            $table->unsignedBigInteger('familiares_estudiantes_id');
            $table->foreign('familiares_estudiantes_id')->references('id')->on('familiares_estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
