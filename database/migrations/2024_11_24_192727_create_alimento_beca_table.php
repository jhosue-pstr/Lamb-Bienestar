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
        Schema::create('alimento_becas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50);
            $table->string('estado', 50);
            $table->foreignId('idTipoBeca')->constrained('tipo_becas')->onDelete('cascade');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimento_becas');
    }
};
