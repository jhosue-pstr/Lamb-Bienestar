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
        Schema::create('tipo_becas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50); // Nombre
            $table->text('detalle'); // Detalle
            $table->unsignedBigInteger('idTipoRequisito'); // Clave foránea a 'tipo_requisitos'
            $table->foreign('idTipoRequisito')
                  ->references('id')->on('tipo_requisitos')
                  ->onDelete('cascade'); // Relación con 'tipo_requisitos'
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_beca');
    }
};
