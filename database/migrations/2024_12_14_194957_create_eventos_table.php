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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); // La columna id es la primaria
            $table->string('nombre', 50);
            $table->string('ubicacion', 100);
            $table->date('fecha');
            $table->time('hora');
            $table->text('descripcion');
            $table->string('afiche', 255)->nullable(); // URL del afiche, puede ser nulo
            $table->string('tipo', 50);
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
