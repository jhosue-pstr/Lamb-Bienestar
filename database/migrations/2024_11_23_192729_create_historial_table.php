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
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idAtencion')->constrained('atenciones')->onDelete('cascade');
            $table->foreignId('idCita')->nullable()->constrained('citas')->onDelete('cascade');
            $table->foreignId('idEstudiante')->constrained('estudiantes')->onDelete('cascade');
            $table->timestamps(); // created_at, updated_at

            //$table->foreignId('idEstudiante')->references('id')->on('estudiantes')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
