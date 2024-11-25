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
            $table->id(); // La columna id es la primaria
            $table->string('motivoAtencion', 100);
            $table->string('tipo', 50);
            $table->string('responsable', 50);
            $table->date('fechaAtencion');
            $table->string('derivacion', 50)->nullable();
            $table->text('descripcionMotivo');
            $table->text('lesionObservaciones')->nullable();
            $table->text('seguimientoCaso')->nullable();
            $table->text('otrosDatos')->nullable();
            $table->unsignedBigInteger('idEstudiante');
            $table->foreign('idEstudiante')->references('id')->on('estudiantes')->onDelete('cascade'); // Asegúrate de que el nombre de la tabla y columna sea correcto
            $table->timestamps(); // created_at y updated_at
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
