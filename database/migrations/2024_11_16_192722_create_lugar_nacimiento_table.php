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
        Schema::create('lugar_nacimientos', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('departamento', 50); // Departamento del lugar de nacimiento
            $table->string('provincia', 50); // Provincia del lugar de nacimiento
            $table->string('distrito', 50); // Distrito del lugar de nacimiento
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugar_nacimiento');
    }
};
