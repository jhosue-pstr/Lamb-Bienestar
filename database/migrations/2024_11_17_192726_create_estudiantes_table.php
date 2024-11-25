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
            $table->id(); // La columna id es la primaria
            $table->integer('codigo')->unique(); // Código único del estudiante
            $table->string('nombre', 50); // Nombre del estudiante
            $table->string('apellidoPaterno', 50); // Apellido paterno
            $table->string('apellidoMaterno', 50); // Apellido materno
            $table->integer('edad'); // Edad del estudiante
            $table->string('direccion', 100); // Dirección del estudiante
            $table->boolean('sexo'); // Sexo del estudiante (0 = Femenino, 1 = Masculino)
            $table->string('facultad', 50); // Facultad a la que pertenece
            $table->string('escuela', 50); // Escuela a la que pertenece
            $table->string('telefono', 200); // Teléfono del estudiante
            $table->string('dni', 8)->unique(); // DNI único del estudiante
            $table->string('ciclo', 50); // Ciclo del estudiante
            $table->string('correo', 50); // Correo electrónico del estudiante
            $table->string('estadoCivil', 50); // Estado civil
            $table->date('fechaNacimiento'); // Fecha de nacimiento
            $table->boolean('domicilio'); // Si el estudiante tiene domicilio propio
            $table->unsignedBigInteger('idLugarNacimiento'); // Relación con la tabla LugarNacimiento
            $table->foreign('idLugarNacimiento')->references('id')->on('lugar_nacimientos')->onDelete('cascade'); // Clave foránea
            $table->timestamps(); // created_at y updated_at
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
