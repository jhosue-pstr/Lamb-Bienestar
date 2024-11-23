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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('descripcion');
            $table->unsignedBigInteger('estudiantes_id');
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->integer('numero_atenciones')->default(0);
            $table->unsignedBigInteger('idCita')->nullable();
            $table->foreign('idCita')->references('id')->on('citas')->onDelete('cascade');

            $table->unsignedBigInteger('solicitudes_id')->nullable();
            $table->foreign('solicitudes_id')->references('id')->on('solicitudes')->onDelete('cascade');

            $table->unsignedBigInteger('becas_id')->nullable();
            $table->foreign('becas_id')->references('id')->on('becas')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};