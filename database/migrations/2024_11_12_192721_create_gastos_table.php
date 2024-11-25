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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->decimal('vivienda', 10, 2)->default(0.00);
            $table->decimal('alimentacion', 10, 2)->default(0.00);
            $table->decimal('educacion', 10, 2)->default(0.00);
            $table->decimal('movilidad', 10, 2)->default(0.00);
            $table->decimal('salud', 10, 2)->default(0.00);
            $table->decimal('otrosGastos', 10, 2)->default(0.00);
            $table->decimal('pagoServicio', 10, 2)->default(0.00);
            $table->decimal('otros', 10, 2)->default(0.00);
            $table->string('datoAdicional', 100)->nullable()->comment('Texto adicional sobre el gasto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
