<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('area');
            $table->string('motivo')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
