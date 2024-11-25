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
        Schema::create('situacion_salud', function (Blueprint $table) {
            $table->id();
            $table->string('salud', 50);
            $table->text('observaciones')->nullable();
            $table->string('atencionEnfermedad', 50)->nullable();
            $table->string('seguro', 50)->nullable();
            $table->boolean('enfermedadPermanente')->default(false);
            $table->string('nombreEnfermedad', 50)->nullable();
            $table->boolean('familiarEnfermo')->default(false);
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('situacion_salud');
    }
};
