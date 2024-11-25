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
        Schema::create('economia_familiar', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('dependeEconomicamente', 50); // Columna dependeEconomicamente
            $table->string('cuantosAportan', 50); // Columna cuantosAportan
            $table->string('quienesAportan', 50); // Columna quienesAportan
            $table->unsignedBigInteger('idGasto'); // Columna idGasto
            $table->foreign('idGasto')->references('id')->on('gastos')->onDelete('cascade'); // Relación con la tabla 'gastos'
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('economia_familiar');
    }
};
